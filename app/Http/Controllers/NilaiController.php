<?php

namespace App\Http\Controllers;


use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NilaiExport;

class NilaiController extends Controller
{
  
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'guru') {
            $guru = $user->guru;

            // Hanya siswa dengan kelas yang diasuh guru itu
            $siswa = Siswa::whereHas('kelas', function ($query) use ($guru) {
                $query->where('guru_id', $guru->id);
            })->with('nilai.mapel', 'kelas')->get();
        } elseif ($user->role === 'guru_pai') {
             $siswa = Siswa::with('kelas')->get();
            // Untuk guru_pai, hanya tampilkan siswa yang memiliki nilai mapel PAI atau PAI 2
            $siswa = Siswa::whereHas('nilai.mapel', function ($query) {
                $query->whereIn('kode', ['PAI001', 'PAI002']);
            })->with(['nilai' => function ($query) {
                $query->whereHas('mapel', function ($q) {
                    $q->whereIn('kode', ['PAI001', 'PAI002']);
                });
            }, 'kelas'])->get();
        } elseif ($user->role === 'siswa') {
            // Jika siswa, hanya tampilkan nilai siswa itu sendiri
            $siswa = Siswa::where('id', $user->siswa->id)->with('nilai.mapel', 'kelas')->get();
        } else {
            // Untuk role lain (admin, dll), tampilkan semua siswa dan nilai
            $siswa = Siswa::with('nilai.mapel', 'kelas')->get();
        }

        $mapel = Mapel::all();

        return view('penilaian.nilai', compact('siswa', 'mapel'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'tahun_ajaran' => 'required|string',
            'nilai_tugas' => 'required|integer',
            'uts' => 'required|integer',
            'uas' => 'required|integer',
        ]);

        // Restrict guru_pai role to only input PAI and PAI 2 subjects
        if ($user->role === 'guru_pai') {
            $mapel = Mapel::find($request->mapel_id);
            if (!$mapel || !in_array($mapel->kode, ['PAI001', 'PAI002'])) {
                return redirect()->back()->withErrors(['mapel_id' => 'Anda hanya dapat menginput nilai untuk mata pelajaran PAI dan PAI 2.'])->withInput();
            }
        }

        $uts = $request->uts;
        $tugas = $request->nilai_tugas;
        $uas = $request->uas;
        
        $akhir = round(($uts * 0.3) + ($tugas * 0.3) + ($uas * 0.4));
        
        $data['nilai_akhir'] = $akhir;   


        Nilai::create($data);

        return redirect()->route('penilaian.nilai')->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('penilaian.nilaiedit', compact('nilai'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);
    
        $nilai = Nilai::findOrFail($id);
       $nilai_akhir = round(($request->tugas * 0.3) + ($request->uts * 0.3) + ($request->uas * 0.4));
    
        $nilai->update([
            'nilai_tugas' => $request->nilai_tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai_akhir' => $nilai_akhir,
        ]);
    
        return redirect()->route('penilaian.nilai')->with('success', 'Nilai berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id); // lempar 404 kalau tidak ketemu
        $nilai->delete();
    
        return redirect()->route('penilaian.nilai')->with('success', 'Nilai berhasil dihapus.');
    }

    
    public function exportExcel()
    {
        return Excel::download(new NilaiExport, 'nilai_siswa.xlsx');
    }


}
