<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NilaiExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Nilai::with('siswa', 'mapel')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Kelas',
            'Mata Pelajaran',
            'Tahun Ajaran',
            'Nilai Tugas',
            'UTS',
            'UAS',
            'Nilai Akhir',
        ];
    }

    public function map($nilai): array
    {
        return [
            $nilai->id,
            $nilai->siswa->nama ?? '-',
            $nilai->siswa->kelas->nama_kelas ?? '-',
            $nilai->mapel->nama_mapel ?? '-',
            $nilai->tahun_ajaran,
            $nilai->nilai_tugas,
            $nilai->uts,
            $nilai->uas,
            $nilai->nilai_akhir,
        ];
    }
}
