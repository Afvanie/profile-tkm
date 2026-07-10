<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LecturerStaffTemplateExport;
use App\Http\Controllers\Controller;
use App\Imports\LecturerStaffImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class LecturerStaffImportController extends Controller
{
    public function template()
    {
        return Excel::download(
            new LecturerStaffTemplateExport,
            'template-import-dosen-staff.xlsx'
        );
    }

    public function import(Request $request, string $type)
    {
        abort_unless(in_array($type, ['dosen', 'staff']), 404);

        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv',
                'max:5120',
            ],
        ]);

        Excel::import(
            new LecturerStaffImport($type),
            $request->file('file')
        );

        $label = $type === 'dosen' ? 'Dosen' : 'Staff';

        return redirect()
            ->back()
            ->with('success', "Data {$label} berhasil diimport.");
    }
}