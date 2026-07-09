<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LecturerStaff;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = LecturerStaff::where('type', 'dosen')
            ->latest()
            ->get();

        $staff = LecturerStaff::where('type', 'staff')
            ->latest()
            ->get();

        return view('frontend.lecturers', compact('lecturers', 'staff'));
    }
}