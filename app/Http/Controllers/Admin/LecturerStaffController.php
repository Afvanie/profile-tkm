<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LecturerStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LecturerStaffController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('search', ''));
        $type = $request->get('type', 'all');

        $query = LecturerStaff::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%');
            });
        }

        if (in_array($type, ['dosen', 'staff'], true)) {
            $query->where('type', $type);
        }

        $lecturerStaff = $query
            ->orderByRaw("CASE WHEN type = 'dosen' THEN 0 ELSE 1 END")
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        $totalAll = LecturerStaff::count();
        $totalDosen = LecturerStaff::where('type', 'dosen')->count();
        $totalStaff = LecturerStaff::where('type', 'staff')->count();

        return view('admin.lecturer-staff.index', compact(
            'lecturerStaff',
            'search',
            'type',
            'totalAll',
            'totalDosen',
            'totalStaff'
        ));
    }

    public function create()
    {
        return view('admin.lecturer-staff.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateLecturerStaff($request);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request
                ->file('photo')
                ->store('lecturer-staff', 'public');
        }

        LecturerStaff::create([
            'name' => $validated['name'],
            'nip' => $validated['nip'] ?? null,
            'type' => $validated['type'],
            'photo' => $photoPath,
        ]);

        return redirect()
            ->route('admin.lecturer-staff.index')
            ->with('success', 'Data dosen/staff berhasil ditambahkan.');
    }

    public function edit(LecturerStaff $lecturerStaff)
    {
        return view('admin.lecturer-staff.edit', compact('lecturerStaff'));
    }

    public function update(Request $request, LecturerStaff $lecturerStaff)
    {
        $validated = $this->validateLecturerStaff($request);

        $photoPath = $lecturerStaff->photo;

        if ($request->hasFile('photo')) {
            if (
                $lecturerStaff->photo &&
                Storage::disk('public')->exists($lecturerStaff->photo)
            ) {
                Storage::disk('public')->delete($lecturerStaff->photo);
            }

            $photoPath = $request
                ->file('photo')
                ->store('lecturer-staff', 'public');
        }

        $lecturerStaff->update([
            'name' => $validated['name'],
            'nip' => $validated['nip'] ?? null,
            'type' => $validated['type'],
            'photo' => $photoPath,
        ]);

        return redirect()
            ->route('admin.lecturer-staff.index')
            ->with('success', 'Data dosen/staff berhasil diperbarui.');
    }

    public function destroy(LecturerStaff $lecturerStaff)
    {
        if (
            $lecturerStaff->photo &&
            Storage::disk('public')->exists($lecturerStaff->photo)
        ) {
            Storage::disk('public')->delete($lecturerStaff->photo);
        }

        $lecturerStaff->delete();

        return redirect()
            ->route('admin.lecturer-staff.index')
            ->with('success', 'Data dosen/staff berhasil dihapus.');
    }

    private function validateLecturerStaff(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:100',
            'type' => 'required|in:dosen,staff',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);
    }
}