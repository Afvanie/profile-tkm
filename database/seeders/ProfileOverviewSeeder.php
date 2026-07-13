<?php

namespace Database\Seeders;

use App\Models\ProfileItem;
use App\Models\ProfileSection;
use Illuminate\Database\Seeder;

class ProfileOverviewSeeder extends Seeder
{
    public function run(): void
    {
        $section = ProfileSection::updateOrCreate(
            [
                'slug' => 'overview',
            ],
            [
                'subtitle' => 'TENTANG KAMI',
                'title' => 'Mengenal Program Studi D-III Teknik Mesin',
                'description' => 'Pendidikan Vokasi Teknik Mesin yang Berorientasi pada Kebutuhan Industri',
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        $items = [
            [
                'item_group' => 'label',
                'title' => 'Label Konten',
                'content' => 'PROFIL SINGKAT',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'item_group' => 'paragraph',
                'title' => null,
                'content' => 'Program Studi D-III Teknik Mesin Politeknik Negeri Malang merupakan program pendidikan vokasi di bawah Jurusan Teknik Mesin yang berfokus pada penguasaan kompetensi teknis, keterampilan praktik, dan pemahaman teoritis di bidang teknik mesin.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'item_group' => 'paragraph',
                'title' => null,
                'content' => 'Program studi ini dirancang untuk menghasilkan lulusan Ahli Madya Teknik yang memiliki kemampuan dalam bidang manufaktur, perawatan dan perbaikan mesin, perancangan komponen mekanik, proses produksi, serta penerapan teknologi pendukung seperti CAD/CAM dalam kegiatan industri.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'item_group' => 'paragraph',
                'title' => null,
                'content' => 'Melalui proses pembelajaran berbasis praktik, mahasiswa dibekali dengan kemampuan analitis, keterampilan kerja, kedisiplinan, tanggung jawab, etika profesi, serta kemampuan beradaptasi terhadap perkembangan teknologi dan kebutuhan dunia kerja.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'item_group' => 'paragraph',
                'title' => null,
                'content' => 'Dengan capaian akreditasi Unggul dari LAM Teknik, Program Studi D-III Teknik Mesin terus berkomitmen menyelenggarakan pendidikan vokasi yang berkualitas, relevan dengan industri, dan mampu menghasilkan lulusan yang kompeten, profesional, serta siap bersaing.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'item_group' => 'info_card',
                'title' => 'Jenjang Pendidikan',
                'content' => 'D-III|Program Diploma Tiga bidang Teknik Mesin.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'item_group' => 'info_card',
                'title' => 'Akreditasi',
                'content' => 'UNGGUL|Terakreditasi Unggul oleh LAM Teknik.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'item_group' => 'info_card',
                'title' => 'Gelar Lulusan',
                'content' => 'A.Md.T.|Ahli Madya Teknik setelah menyelesaikan studi.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'item_group' => 'info_card',
                'title' => 'Masa Studi',
                'content' => '3 Tahun|Waktu tempuh pendidikan selama 6 semester.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            ProfileItem::updateOrCreate(
                [
                    'profile_section_id' => $section->id,
                    'item_group' => $item['item_group'],
                    'sort_order' => $item['sort_order'],
                ],
                [
                    'title' => $item['title'],
                    'content' => $item['content'],
                    'is_active' => $item['is_active'],
                ]
            );
        }
    }
}