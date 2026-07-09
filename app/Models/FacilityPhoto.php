<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FacilityPhoto extends Model
{
    protected $fillable = [
        'facility_id',
        'title',
        'photo',
        'sort_order',
        'is_active',
    ];

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class);
    }
}