<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Guru;

class kelasController extends Controller
{
    
   
    public function index()
    {
        $kelasList = Kelas::with('guru')->get();
        $guruList = Guru::all();

        return view('penilaian.kelas', compact('kelasList', 'guruList'));
    }

    public function create()
    {
        $guruList = Guru::all();
        return view('penilaian.kelas.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'kode_kelas' => 'required|unique:kelas,kode_kelas',
            'nama_kelas' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()->route('penilaian.kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        $guruList = Guru::all();
        return view('penilaian.kelasedit', compact('kelas', 'guruList'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'kode_kelas' => 'required|unique:kelas,kode_kelas,' . $kelas->id,
            'nama_kelas' => 'required',
        ]);

        $kelas->update($request->all());

        return redirect()->route('penilaian.kelas')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('penilaian.kelas')->with('success', 'Kelas berhasil dihapus.');
    }


}
