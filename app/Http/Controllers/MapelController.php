<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
     // Menampilkan semua mapel
     public function index()
     {
         $mapel = Mapel::all();
         return view('penilaian.mapel', compact('mapel'));
     }

     public function store(Request $request)
     {
         $request->validate([
             'nama_mapel' => 'required|string|max:255',
         ]);
 
         Mapel::create([
             'nama_mapel' => $request->nama_mapel,
         ]);
 
         return redirect()->back()->with('success', 'Mapel berhasil ditambahkan.');
     }

     
     public function edit($id)
     {
         $mapel = Mapel::findOrFail($id);
         return view('mapel-edit', compact('mapel')); // kamu bisa ganti nama view jika perlu
     }

     public function update(Request $request, $id)
     {
         $request->validate([
             'nama_mapel' => 'required|string|max:255',
         ]);
 
         $mapel = Mapel::findOrFail($id);
         $mapel->update([
             'nama_mapel' => $request->nama_mapel,
         ]);
 
         return redirect()->route('mapel.index')->with('success', 'Mapel berhasil diperbarui.');
     }

        // Menghapus mapel
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->back()->with('success', 'Mapel berhasil dihapus.');
    }
 

}
