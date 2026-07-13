<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProfileSection;

class ProfileController extends Controller
{
    public function index()
    {
        $profileSections = ProfileSection::with([
                'items' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order');
                }
            ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->keyBy('slug');

        return view('frontend.profile', compact('profileSections'));
    }
}