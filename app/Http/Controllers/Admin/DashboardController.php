<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicDocument;
use App\Models\Admin;
use App\Models\FacilityPhoto;
use App\Models\LecturerStaff;
use App\Models\ProfileSection;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'lecturers' => LecturerStaff::where('type', 'dosen')->count(),
            'staff' => LecturerStaff::where('type', 'staff')->count(),
            'academic_documents' => AcademicDocument::count(),
            'facility_photos' => FacilityPhoto::count(),
            'admins' => Admin::count(),
            'profile_sections' => ProfileSection::count(),
        ];

        $latestDocuments = AcademicDocument::latest()
            ->take(5)
            ->get();

        $latestPhotos = FacilityPhoto::with('facility')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'stats',
            'latestDocuments',
            'latestPhotos'
        ));
    }
}