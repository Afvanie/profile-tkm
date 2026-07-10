<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LecturerStaffImport implements ToCollection, WithHeadingRow
{
    public function __construct(
        protected string $type
    ) {}

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $name = trim((string) ($row['nama'] ?? $row['name'] ?? ''));
            $nip = trim((string) ($row['nip'] ?? ''));

            if ($name === '') {
                continue;
            }

            $data = [
                'name' => $name,
                'nip' => $nip !== '' ? $nip : null,
                'type' => $this->type,
                'updated_at' => now(),
            ];

            // Kalau NIP ada, update berdasarkan NIP + type
            if ($nip !== '') {
                DB::table('lecturer_staff')->updateOrInsert(
                    [
                        'nip' => $nip,
                        'type' => $this->type,
                    ],
                    array_merge($data, [
                        'created_at' => now(),
                    ])
                );

                continue;
            }

            // Kalau NIP kosong, update berdasarkan nama + type
            DB::table('lecturer_staff')->updateOrInsert(
                [
                    'name' => $name,
                    'type' => $this->type,
                ],
                array_merge($data, [
                    'created_at' => now(),
                ])
            );
        }
    }
}