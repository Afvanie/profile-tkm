<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\FacilityPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::withCount('photos')
            ->orderBy('sort_order')
            ->get();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function edit(Facility $facility)
    {
        $facility->load([
            'photos' => function ($query) {
                $query->orderBy('sort_order')
                    ->orderByDesc('created_at');
            },
        ]);

        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $facility->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $facility->sort_order,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.facilities.edit', $facility)
            ->with('success', 'Data fasilitas berhasil diperbarui.');
    }

    public function storePhoto(Request $request, Facility $facility)
    {
        $validated = $this->validatePhotoStore($request);

        $photoPath = $request
            ->file('photo')
            ->store('facilities', 'public');

        $facility->photos()->create([
            'title' => $validated['title'] ?? null,
            'photo' => $photoPath,
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $this->getNextPhotoSortOrder($facility),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.facilities.edit', $facility)
            ->with('success', 'Foto fasilitas berhasil ditambahkan.');
    }

    public function storePhotoGeneral(Request $request)
    {
        $validated = $this->validatePhotoStore($request, true);

        $facility = Facility::findOrFail($validated['facility_id']);

        $photoPath = $request
            ->file('photo')
            ->store('facilities', 'public');

        $facility->photos()->create([
            'title' => $validated['title'] ?? null,
            'photo' => $photoPath,
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $this->getNextPhotoSortOrder($facility),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Foto dokumentasi berhasil ditambahkan.');
    }

    public function updatePhoto(Request $request, FacilityPhoto $facilityPhoto)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $photoPath = $facilityPhoto->photo;

        if ($request->hasFile('photo')) {
            if (
                $facilityPhoto->photo &&
                Storage::disk('public')->exists($facilityPhoto->photo)
            ) {
                Storage::disk('public')->delete($facilityPhoto->photo);
            }

            $photoPath = $request
                ->file('photo')
                ->store('facilities', 'public');
        }

        $facilityPhoto->update([
            'title' => $validated['title'] ?? null,
            'photo' => $photoPath,
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $facilityPhoto->sort_order,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.facilities.edit', $facilityPhoto->facility)
            ->with('success', 'Foto fasilitas berhasil diperbarui.');
    }

    public function destroyPhoto(FacilityPhoto $facilityPhoto)
    {
        $facility = $facilityPhoto->facility;

        if (
            $facilityPhoto->photo &&
            Storage::disk('public')->exists($facilityPhoto->photo)
        ) {
            Storage::disk('public')->delete($facilityPhoto->photo);
        }

        $facilityPhoto->delete();

        return redirect()
            ->route('admin.facilities.edit', $facility)
            ->with('success', 'Foto fasilitas berhasil dihapus.');
    }

    private function validatePhotoStore(Request $request, bool $includeFacilityId = false): array
    {
        $rules = [
            'title' => 'nullable|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:20480',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ];

        if ($includeFacilityId) {
            $rules['facility_id'] = 'required|exists:facilities,id';
        }

        return $request->validate($rules);
    }

    private function getNextPhotoSortOrder(Facility $facility): int
    {
        return ((int) $facility->photos()->max('sort_order')) + 1;
    }
}