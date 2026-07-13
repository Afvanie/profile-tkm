<?php

namespace Database\Seeders;

use App\Models\ProfileItem;
use App\Models\ProfileSection;
use Illuminate\Database\Seeder;

class ProfileHistorySeeder extends Seeder
{
    public function run(): void
    {
        $section = ProfileSection::updateOrCreate(
            [
                'slug' => 'history',
            ],
            [
                'subtitle' => 'Perjalanan Program Studi',
                'title' => 'Tumbuh Bersama Kebutuhan Industri',
                'description' => 'Program Studi D-III Teknik Mesin terus berkembang sebagai penyelenggara pendidikan vokasi yang berorientasi pada kompetensi, praktik, dan kebutuhan dunia industri.',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        $items = [
            [
                'item_group' => 'paragraph',
                'title' => null,
                'content' => 'Program Studi D-III Teknik Mesin merupakan bagian dari Jurusan Teknik Mesin Politeknik Negeri Malang yang berperan dalam menyelenggarakan pendidikan vokasi di bidang teknik mesin. Program studi ini dikembangkan untuk menjawab kebutuhan dunia industri terhadap tenaga ahli madya yang memiliki kemampuan teknis, keterampilan praktik, serta pemahaman teoritis dalam bidang manufaktur, perawatan, perbaikan, dan proses produksi.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'item_group' => 'paragraph',
                'title' => null,
                'content' => 'Seiring perkembangan teknologi industri, Program Studi D-III Teknik Mesin terus menyesuaikan proses pembelajaran dengan kebutuhan dunia kerja melalui penguatan praktik laboratorium, bengkel, pembelajaran berbasis kompetensi, serta penerapan teknologi pendukung seperti CAD/CAM dan sistem manufaktur.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'item_group' => 'paragraph',
                'title' => null,
                'content' => 'Komitmen program studi dalam menjaga mutu pendidikan diwujudkan melalui pencapaian akreditasi Unggul dari LAM Teknik. Capaian ini menjadi bukti bahwa Program Studi D-III Teknik Mesin terus berupaya meningkatkan kualitas pembelajaran, relevansi kurikulum, sumber daya manusia, serta sarana prasarana untuk menghasilkan lulusan yang kompeten dan siap bersaing di dunia industri.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'item_group' => 'timeline',
                'title' => 'Bagian dari Jurusan Teknik Mesin',
                'content' => 'Program Studi D-III Teknik Mesin berada di lingkungan Jurusan Teknik Mesin Politeknik Negeri Malang.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'item_group' => 'timeline',
                'title' => 'Penguatan Kompetensi Vokasi',
                'content' => 'Pembelajaran diarahkan pada keterampilan praktik, penguasaan teknologi manufaktur, perawatan mesin, dan proses produksi.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'item_group' => 'timeline',
                'title' => 'Terakreditasi Unggul',
                'content' => 'Program Studi D-III Teknik Mesin memperoleh akreditasi Unggul dari LAM Teknik sebagai bentuk pengakuan terhadap mutu pendidikan.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'item_group' => 'timeline',
                'title' => 'Berorientasi pada Industri',
                'content' => 'Program studi terus menyesuaikan kurikulum dan pembelajaran dengan kebutuhan industri serta perkembangan teknologi teknik mesin.',
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