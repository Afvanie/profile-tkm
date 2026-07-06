<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    public function index()
    {
        return view('frontend.facilities');
    }
}