<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LecturerStaffTemplateExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'nama',
            'nip',
        ];
    }

    public function array(): array
    {
        return [
            [
                'nama' => 'Contoh Nama Dosen, S.T., M.T.',
                'nip' => '198701012015041001',
            ],
            [
                'nama' => 'Contoh Nama Tanpa NIP',
                'nip' => '',
            ],
        ];
    }
}