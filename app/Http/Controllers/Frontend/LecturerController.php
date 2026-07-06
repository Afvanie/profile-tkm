<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    public function index()
    {
        return view('frontend.lecturers');
    }
}