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
        $data = $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'tahun_ajaran' => 'required|string',
            'nilai_tugas' => 'required|integer',
            'uts' => 'required|integer',
            'uas' => 'required|integer',
        ]);

        $uts = $request->uts;
        $tugas = $request->nilai_tugas;
        $uas = $request->uas;
        
        $akhir = round(($uts * 0.3) +($tugas * 0.3)+($uas * 0.4));
        
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
