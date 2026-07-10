<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AcademicDocument;

class AcademicController extends Controller
{
    private array $pages = [
        'pedoman-akademik' => [
            'category' => 'pedoman_akademik',
            'title' => 'Pedoman Akademik',
            'subtitle' => 'Dokumen pedoman akademik Program Studi D-III Teknik Mesin.',
        ],

        'kalender-akademik' => [
            'category' => 'kalender_akademik',
            'title' => 'Kalender Akademik',
            'subtitle' => 'Informasi kalender kegiatan akademik Program Studi D-III Teknik Mesin.',
        ],

        'kurikulum' => [
            'category' => 'kurikulum',
            'title' => 'Kurikulum',
            'subtitle' => 'Struktur kurikulum dan informasi mata kuliah Program Studi D-III Teknik Mesin.',
        ],

        'jadwal-kuliah' => [
            'category' => 'jadwal_kuliah',
            'title' => 'Jadwal Kuliah',
            'subtitle' => 'Informasi jadwal perkuliahan Program Studi D-III Teknik Mesin.',
        ],

        'laporan-ketercapaian' => [
            'category' => 'laporan_ketercapaian',
            'title' => 'Laporan Ketercapaian',
            'subtitle' => 'Dokumen laporan ketercapaian pembelajaran Program Studi D-III Teknik Mesin.',
        ],

        'panduan-laporan-tugas-akhir' => [
            'category' => 'panduan_laporan_tugas_akhir',
            'title' => 'Panduan Laporan Tugas Akhir',
            'subtitle' => 'Dokumen panduan penyusunan laporan tugas akhir mahasiswa Program Studi D-III Teknik Mesin.',
        ],

        'panduan-laporan-pkl' => [
            'category' => 'panduan_laporan_pkl',
            'title' => 'Panduan Laporan PKL',
            'subtitle' => 'Dokumen panduan penyusunan laporan Praktik Kerja Lapangan mahasiswa Program Studi D-III Teknik Mesin.',
        ],
    ];

    public function index()
    {
        return redirect()->route('academic.page', 'pedoman-akademik');
    }

    public function page(string $slug)
    {
        abort_if(!array_key_exists($slug, $this->pages), 404);

        $page = $this->pages[$slug];

        $documents = AcademicDocument::where('is_active', true)
            ->where('category', $page['category'])
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        return view('frontend.academic', [
            'page' => $page,
            'slug' => $slug,
            'pages' => $this->pages,
            'documents' => $documents,
        ]);
    }
}