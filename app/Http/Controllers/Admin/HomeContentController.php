<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use App\Models\HomeStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function index()
    {
        $homeContent = HomeContent::firstOrCreate(
            ['section_key' => 'program_description'],
            [
                'badge' => 'Program Studi',
                'title' => 'Deskripsi Program Studi',
                'description' => 'Program Studi D-III Teknik Mesin merupakan program pendidikan vokasi yang berfokus pada penguasaan kompetensi teknis, keterampilan praktik, dan pemahaman teoritis di bidang teknik mesin.',
                'button_text' => 'Selengkapnya',
                'button_url' => '/profile',
                'is_active' => true,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Alias Variable
        |--------------------------------------------------------------------------
        | Beberapa view lama masih memakai $content.
        | Jadi $content tetap dikirim agar tidak error undefined variable.
        */

        $content = $homeContent;

        $statistics = HomeStatistic::orderBy('sort_order')->get();

        return view('admin.home-content.index', compact(
            'homeContent',
            'content',
            'statistics'
        ));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',

            /*
            |--------------------------------------------------------------------------
            | Upload Gambar Deskripsi
            |--------------------------------------------------------------------------
            */
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            /*
            |--------------------------------------------------------------------------
            | Upload Video Hero
            |--------------------------------------------------------------------------
            | Maksimal 50MB.
            | Jika hosting membatasi upload, nanti bisa dinaikkan lewat konfigurasi hosting/PHP.
            */
            'hero_video' => 'nullable|file|mimes:mp4,webm,mov|max:100200',

            /*
            |--------------------------------------------------------------------------
            | Statistik
            |--------------------------------------------------------------------------
            */
            'statistics' => 'nullable|array',
            'statistics.*.label' => 'required|string|max:255',
            'statistics.*.value' => 'required|string|max:255',
            'statistics.*.sort_order' => 'nullable|integer|min:0',
        ]);

        $homeContent = HomeContent::firstOrCreate(
            ['section_key' => 'program_description']
        );

        $data = [
            'badge' => $validated['badge'] ?? null,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'button_text' => $validated['button_text'] ?? null,
            'button_url' => $validated['button_url'] ?? null,
            'is_active' => true,
        ];

        /*
        |--------------------------------------------------------------------------
        | Upload / Replace Gambar Deskripsi
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {
            if ($homeContent->image && Storage::disk('public')->exists($homeContent->image)) {
                Storage::disk('public')->delete($homeContent->image);
            }

            $data['image'] = $request->file('image')->store('home-content', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Upload / Replace Video Hero
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('hero_video')) {
            if (
                $homeContent->hero_video_path &&
                Storage::disk('public')->exists($homeContent->hero_video_path)
            ) {
                Storage::disk('public')->delete($homeContent->hero_video_path);
            }

            $data['hero_video_path'] = $request
                ->file('hero_video')
                ->store('home-content/videos', 'public');
        }

        $homeContent->update($data);

        /*
        |--------------------------------------------------------------------------
        | Update Statistik
        |--------------------------------------------------------------------------
        */

        if ($request->has('statistics')) {
            foreach ($request->statistics as $id => $statistic) {
                HomeStatistic::where('id', $id)->update([
                    'label' => $statistic['label'],
                    'value' => $statistic['value'],
                    'sort_order' => $statistic['sort_order'] ?? 0,
                ]);
            }
        }

        return redirect()
            ->route('admin.home-content.index')
            ->with('success', 'Konten beranda berhasil diperbarui.');
    }
}