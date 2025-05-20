<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    public function collection()
    { return Guru::all()->map(function ($guru) {
        return [
            'ID'   => $guru->id,
            'Nama' => $guru->nama,
            'NIP'  => (string) $guru->nip, // ubah jadi string
        ];
    });
    }

    public function headings(): array
    {
        return ['ID', 'Nama', 'NIP'];
    }
}
