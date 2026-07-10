<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    protected $fillable = [
        'title',
        'type',
        'institution',
        'rank',
        'certificate_number',
        'valid_from',
        'valid_until',
        'file_path',
        'description',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'valid_from' => 'date',
        'valid_until' => 'date',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public static function types(): array
    {
        return [
            'nasional' => 'Akreditasi Nasional',
            'internasional' => 'Akreditasi Internasional',
        ];
    }

    public function getTypeLabelAttribute(): string
    {
        return self::types()[$this->type] ?? $this->type;
    }
}