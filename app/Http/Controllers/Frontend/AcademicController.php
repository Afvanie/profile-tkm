<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class AcademicController extends Controller
{
    public function index()
    {
        return view('frontend.academic');
    }
}