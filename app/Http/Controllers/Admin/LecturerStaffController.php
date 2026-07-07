<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LecturerStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LecturerStaffController extends Controller
{
    public function index()
    {
        $lecturerStaff = LecturerStaff::latest()->get();

        return view('admin.lecturer-staff.index', compact('lecturerStaff'));
    }

    public function create()
    {
        return view('admin.lecturer-staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:100',
            'type' => 'required|in:dosen,staff',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('lecturer-staff', 'public');
        }

        LecturerStaff::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'type' => $request->type,
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
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:100',
            'type' => 'required|in:dosen,staff',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photoPath = $lecturerStaff->photo;

        if ($request->hasFile('photo')) {
            if ($lecturerStaff->photo && Storage::disk('public')->exists($lecturerStaff->photo)) {
                Storage::disk('public')->delete($lecturerStaff->photo);
            }

            $photoPath = $request->file('photo')->store('lecturer-staff', 'public');
        }

        $lecturerStaff->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'type' => $request->type,
            'photo' => $photoPath,
        ]);

        return redirect()
            ->route('admin.lecturer-staff.index')
            ->with('success', 'Data dosen/staff berhasil diperbarui.');
    }

    public function destroy(LecturerStaff $lecturerStaff)
    {
        if ($lecturerStaff->photo && Storage::disk('public')->exists($lecturerStaff->photo)) {
            Storage::disk('public')->delete($lecturerStaff->photo);
        }

        $lecturerStaff->delete();

        return redirect()
            ->route('admin.lecturer-staff.index')
            ->with('success', 'Data dosen/staff berhasil dihapus.');
    }
}