<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::with([
            'photos' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sort_order');
            }
        ])
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

        return view('frontend.facilities', compact('facilities'));
    }
}