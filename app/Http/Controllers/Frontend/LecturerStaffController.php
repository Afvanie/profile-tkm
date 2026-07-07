<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LecturerStaff;

class LecturerStaffController extends Controller
{
    public function index()
    {
        $lecturers = LecturerStaff::where('type', 'dosen')
            ->orderBy('name')
            ->get();

        $staff = LecturerStaff::where('type', 'staff')
            ->orderBy('name')
            ->get();

        return view('frontend.lecturers', compact('lecturers', 'staff'));
    }
}