<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileItem;
use App\Models\ProfileSection;
use Illuminate\Http\Request;

class ProfileContentController extends Controller
{
    public function index()
    {
        $sections = ProfileSection::withCount('items')
            ->orderBy('sort_order')
            ->get();

        return view('admin.profile-contents.index', compact('sections'));
    }

    public function edit(ProfileSection $profileSection)
    {
        $profileSection->load([
            'items' => function ($query) {
                $query->orderBy('sort_order');
            },
        ]);

        return view('admin.profile-contents.edit', compact('profileSection'));
    }

    public function update(Request $request, ProfileSection $profileSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $profileSection->update([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $profileSection->sort_order,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Informasi utama berhasil diperbarui.');
    }

    public function updateParagraphs(Request $request, ProfileSection $profileSection)
    {
        $validated = $request->validate([
            'content' => 'nullable|string',
            'title_prefix' => 'nullable|string|max:255',
        ]);

        $content = trim((string) ($validated['content'] ?? ''));
        $titlePrefix = $validated['title_prefix'] ?? 'Paragraf';

        $paragraphs = collect(preg_split('/\R{2,}/u', $content))
            ->map(fn ($paragraph) => trim($paragraph))
            ->filter()
            ->values();

        $existingItems = $profileSection->items()
            ->where('item_group', 'paragraph')
            ->orderBy('sort_order')
            ->get();

        if ($paragraphs->isEmpty()) {
            $existingItems->each->delete();

            return redirect()
                ->back()
                ->with('success', 'Paragraf berhasil dikosongkan.');
        }

        foreach ($paragraphs as $index => $paragraph) {
            $item = $existingItems->get($index);

            $data = [
                'item_group' => 'paragraph',
                'title' => $titlePrefix . ' ' . ($index + 1),
                'content' => $paragraph,
                'sort_order' => $index + 1,
                'is_active' => true,
            ];

            if ($item) {
                $item->update($data);
            } else {
                $profileSection->items()->create($data);
            }
        }

        $existingItems
            ->slice($paragraphs->count())
            ->each
            ->delete();

        return redirect()
            ->back()
            ->with('success', 'Paragraf berhasil diperbarui.');
    }

    public function batchUpdateItems(Request $request, ProfileSection $profileSection)
    {
        $validated = $request->validate([
            'items' => 'nullable|array',
            'items.*.id' => 'required|integer|exists:profile_items,id',
            'items.*.item_group' => 'nullable|string|max:255',
            'items.*.title' => 'nullable|string|max:255',
            'items.*.content' => 'required|string',
            'items.*.sort_order' => 'nullable|integer|min:0',
            'items.*.is_active' => 'nullable|boolean',
        ]);

        foreach (($validated['items'] ?? []) as $itemData) {
            $profileItem = $profileSection->items()
                ->where('id', $itemData['id'])
                ->first();

            if (! $profileItem) {
                continue;
            }

            $profileItem->update([
                'item_group' => $itemData['item_group'] ?? $profileItem->item_group,
                'title' => $itemData['title'] ?? null,
                'content' => $itemData['content'],
                'sort_order' => isset($itemData['sort_order']) && $itemData['sort_order'] !== ''
                    ? (int) $itemData['sort_order']
                    : $profileItem->sort_order,
                'is_active' => (bool) ($itemData['is_active'] ?? false),
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Semua konten berhasil diperbarui.');
    }

    public function storeItem(Request $request, ProfileSection $profileSection)
    {
        $validated = $request->validate([
            'item_group' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $profileSection->items()->create([
            'item_group' => $validated['item_group'] ?? 'content',
            'title' => $validated['title'] ?? null,
            'content' => $validated['content'],
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $this->getNextSortOrder($profileSection),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Konten baru berhasil ditambahkan.');
    }

    public function updateItem(Request $request, ProfileItem $profileItem)
    {
        $validated = $request->validate([
            'item_group' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $profileItem->update([
            'item_group' => $validated['item_group'] ?? $profileItem->item_group,
            'title' => $validated['title'] ?? null,
            'content' => $validated['content'],
            'sort_order' => $request->filled('sort_order')
                ? (int) $validated['sort_order']
                : $profileItem->sort_order,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroyItem(ProfileItem $profileItem)
    {
        $profileItem->delete();

        return redirect()
            ->back()
            ->with('success', 'Konten berhasil dihapus.');
    }

    private function getNextSortOrder(ProfileSection $profileSection): int
    {
        return ((int) $profileSection->items()->max('sort_order')) + 1;
    }
}