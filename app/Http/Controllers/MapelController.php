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
                'kode' => 'required|string|max:100',
            ]);

            Mapel::create([
                'nama_mapel' => $request->nama_mapel,
                'kode' => $request->kode,
            ]);
        return redirect()->route('penilaian.mapel')->with('success', 'Mapel berhasil ditambahkan.');

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
 
         return redirect()->route('penilaian.mapel')->with('success', 'Mapel berhasil diperbarui.');


     }

        // Menghapus mapel
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

      return redirect()->route('penilaian.mapel')->with('success', 'Mapel berhasil dihapus.');


    }
 

}
