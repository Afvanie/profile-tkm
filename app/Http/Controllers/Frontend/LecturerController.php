<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LecturerStaff;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));
        $type = $request->get('type', 'all');

        $query = LecturerStaff::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%');
            });
        }

        if (in_array($type, ['dosen', 'staff'], true)) {
            $query->where('type', $type);
        }

        $lecturerStaff = $query
            ->orderByRaw("FIELD(type, 'dosen', 'staff')")
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        $totalAll = LecturerStaff::count();
        $totalDosen = LecturerStaff::where('type', 'dosen')->count();
        $totalStaff = LecturerStaff::where('type', 'staff')->count();

        return view('frontend.lecturers', compact(
            'lecturerStaff',
            'search',
            'type',
            'totalAll',
            'totalDosen',
            'totalStaff'
        ));
    }
}