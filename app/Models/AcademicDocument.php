<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicDocument extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'file_path',
        'external_link',
        'academic_year',
        'is_active',
        'sort_order',
    ];

    public static function categories(): array
    {
        return [
            'pedoman_akademik' => 'Pedoman Akademik',
            'kalender_akademik' => 'Kalender Akademik',
            'kurikulum' => 'Kurikulum',
            'jadwal_kuliah' => 'Jadwal Kuliah',
            'laporan_ketercapaian' => 'Laporan Ketercapaian',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categories()[$this->category] ?? $this->category;
    }
}