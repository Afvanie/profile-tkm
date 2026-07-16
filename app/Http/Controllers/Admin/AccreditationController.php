<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AccreditationController extends Controller
{
    public function index()
    {
        $accreditations = Accreditation::orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.accreditations.index', compact('accreditations'));
    }

    public function create()
    {
        $types = Accreditation::types();

        return view('admin.accreditations.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateAccreditation($request);

        $filePath = null;

        if ($request->hasFile('file_path')) {
            $filePath = $request
                ->file('file_path')
                ->store('accreditations', 'public');
        }

        Accreditation::create([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'institution' => $validated['institution'] ?? null,
            'rank' => $validated['rank'] ?? null,
            'certificate_number' => $validated['certificate_number'] ?? null,
            'valid_from' => $validated['valid_from'] ?? null,
            'valid_until' => $validated['valid_until'] ?? null,
            'file_path' => $filePath,
            'description' => $validated['description'] ?? null,
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $this->getNextSortOrder(),
        ]);

        return redirect()
            ->route('admin.accreditations.index')
            ->with('success', 'Data akreditasi berhasil ditambahkan.');
    }

    public function edit(Accreditation $accreditation)
    {
        $types = Accreditation::types();

        return view('admin.accreditations.edit', compact('accreditation', 'types'));
    }

    public function update(Request $request, Accreditation $accreditation)
    {
        $validated = $this->validateAccreditation($request);

        $filePath = $accreditation->file_path;

        if ($request->hasFile('file_path')) {
            if (
                $accreditation->file_path &&
                Storage::disk('public')->exists($accreditation->file_path)
            ) {
                Storage::disk('public')->delete($accreditation->file_path);
            }

            $filePath = $request
                ->file('file_path')
                ->store('accreditations', 'public');
        }

        $accreditation->update([
            'title' => $validated['title'],
            'type' => $validated['type'],
            'institution' => $validated['institution'] ?? null,
            'rank' => $validated['rank'] ?? null,
            'certificate_number' => $validated['certificate_number'] ?? null,
            'valid_from' => $validated['valid_from'] ?? null,
            'valid_until' => $validated['valid_until'] ?? null,
            'file_path' => $filePath,
            'description' => $validated['description'] ?? null,
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $accreditation->sort_order,
        ]);

        return redirect()
            ->route('admin.accreditations.index')
            ->with('success', 'Data akreditasi berhasil diperbarui.');
    }

    public function destroy(Accreditation $accreditation)
    {
        if (
            $accreditation->file_path &&
            Storage::disk('public')->exists($accreditation->file_path)
        ) {
            Storage::disk('public')->delete($accreditation->file_path);
        }

        $accreditation->delete();

        return redirect()
            ->route('admin.accreditations.index')
            ->with('success', 'Data akreditasi berhasil dihapus.');
    }

    private function validateAccreditation(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',

            'type' => [
                'required',
                Rule::in(array_keys(Accreditation::types())),
            ],

            'institution' => 'nullable|string|max:255',
            'rank' => 'nullable|string|max:255',
            'certificate_number' => 'nullable|string|max:255',

            'valid_from' => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',

            'file_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:20480',
            'description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);
    }

    private function getNextSortOrder(): int
    {
        return ((int) Accreditation::max('sort_order')) + 1;
    }
}