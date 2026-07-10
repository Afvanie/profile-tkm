<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AcademicDocumentController extends Controller
{
    public function index()
    {
        $documents = AcademicDocument::orderBy('category')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.academic-documents.index', compact('documents'));
    }

    public function create()
    {
        $categories = AcademicDocument::categories();

        return view('admin.academic-documents.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'category' => [
                'required',
                Rule::in(array_keys(AcademicDocument::categories())),
            ],

            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:20480',
            'external_link' => 'nullable|url',
            'academic_year' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
        ]);

        $filePath = null;

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('academic-documents', 'public');
        }

        AcademicDocument::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'file_path' => $filePath,
            'external_link' => $validated['external_link'] ?? null,
            'academic_year' => $validated['academic_year'] ?? null,
            'is_active' => $request->has('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.academic-documents.index')
            ->with('success', 'Dokumen akademik berhasil ditambahkan.');
    }

    public function edit(AcademicDocument $academicDocument)
    {
        $categories = AcademicDocument::categories();

        return view('admin.academic-documents.edit', compact('academicDocument', 'categories'));
    }

    public function update(Request $request, AcademicDocument $academicDocument)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'category' => [
                'required',
                Rule::in(array_keys(AcademicDocument::categories())),
            ],

            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:20480',
            'external_link' => 'nullable|url',
            'academic_year' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
        ]);

        $filePath = $academicDocument->file_path;

        if ($request->hasFile('file_path')) {

            if ($academicDocument->file_path && Storage::disk('public')->exists($academicDocument->file_path)) {
                Storage::disk('public')->delete($academicDocument->file_path);
            }

            $filePath = $request->file('file_path')->store('academic-documents', 'public');
        }

        $academicDocument->update([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'file_path' => $filePath,
            'external_link' => $validated['external_link'] ?? null,
            'academic_year' => $validated['academic_year'] ?? null,
            'is_active' => $request->has('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.academic-documents.index')
            ->with('success', 'Dokumen akademik berhasil diperbarui.');
    }

    public function destroy(AcademicDocument $academicDocument)
    {
        if ($academicDocument->file_path && Storage::disk('public')->exists($academicDocument->file_path)) {
            Storage::disk('public')->delete($academicDocument->file_path);
        }

        $academicDocument->delete();

        return redirect()
            ->route('admin.academic-documents.index')
            ->with('success', 'Dokumen akademik berhasil dihapus.');
    }
}