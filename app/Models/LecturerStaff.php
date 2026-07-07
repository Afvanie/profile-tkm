<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LecturerStaff extends Model
{
    protected $table = 'lecturer_staff';

    protected $fillable = [
        'name',
        'nip',
        'photo',
        'type',
    ];
}