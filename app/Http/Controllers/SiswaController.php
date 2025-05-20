<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        $kelas = Kelas::all();
        return view('siswa.index', compact('siswa', 'kelas'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nis' => 'required|string|unique:siswa,nis|max:20',
        'jenis_kelamin' => 'nullable|in:L,P',
        'alamat' => 'nullable|string',
    ]); 

    $guru = Auth::user()->guru;


    if (!$guru) {
        abort(403, 'Akses hanya untuk guru.');
    }

    // Ambil satu kelas pertama yang diajar guru ini
    $kelas = Kelas::where('guru_id', $guru->id)->first();

    if (!$kelas) {
        return back()->withErrors(['kelas_id' => 'Anda belum memiliki kelas.']);
    }
     $user =  User::create([
                'name' => $request->nama,
                'password' => hash::make('test123'),
                'nip' => $request->nis, 
                'email' => $request->nama.'@gmail.com',
                'role' => 'siswa',        
            ]);
            
            // Tambahkan kelas_id ke data validasi
            $validated['user_id'] = $user->id;
            $validated['kelas_id'] = $kelas->id;

    // Simpan siswa
    $siswa = Siswa::create($validated);  

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
}

        

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis,'.$siswa->id,
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable'
        ]);

        
        $siswa->update($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }


    /**
     * Import data siswa dari file CSV
     */
    public function importCSV(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|file|mimes:csv,txt',
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);
        
        if (!$request->hasFile('file')) {
            return redirect()->route('siswa.index')->with('error', 'File CSV tidak ditemukan');
        }
        
        // Baca file CSV
        $file = $request->file('file');
        $path = $file->getRealPath();
        
        // Buka file
        if (($handle = fopen($path, "r")) === FALSE) {
            return redirect()->route('siswa.index')->with('error', 'Gagal membuka file CSV');
        }
        
        // Hitung berapa data yang berhasil/gagal diimport
        $imported = 0;
        $failed = 0;
        $errors = [];
        $lineNumber = 0;
        
        try {
            // Baca baris header
            $header = fgetcsv($handle, 1000, ",");
            $lineNumber++;

            // Ubah header menjadi lowercase
            $header = array_map('strtolower', $header);
            
            // Periksa keberadaan kolom wajib
            $requiredColumns = ['nama', 'nis'];
            foreach ($requiredColumns as $column) {
                if (!in_array($column, $header)) {
                    fclose($handle);
                    return redirect()->route('siswa.index')
                        ->with('error', "Format CSV tidak sesuai. Kolom '$column' tidak ditemukan");
                }
            }
            
            // Mapping index kolom
            $columnIndexes = [];
            foreach ($header as $index => $columnName) {
                $columnIndexes[$columnName] = $index;
            }
            
            // Default kelas jika tidak ada di CSV atau tidak dipilih
            $defaultKelas = null;
            if ($request->filled('kelas_id')) {
                $defaultKelas = Kelas::find($request->kelas_id);
            }
            
            if (!$defaultKelas) {
                $guru = Guru::first();
                $defaultKelas = Kelas::firstOrCreate(
                    ['kode_kelas' => 'DEFAULT'],
                    [
                        'nama_kelas' => 'Kelas Default',
                        'guru_id' => $guru ? $guru->id : 1 // fallback jika tidak ada guru
                    ]
                );
            }
            
            // Baca data baris per baris
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $lineNumber++;
                
                // Skip jika baris kosong atau tidak lengkap
                if (count($data) < 2 || empty($data[$columnIndexes['nama']]) || empty($data[$columnIndexes['nis']])) {
                    continue;
                }
                
                try {
                    // Siapkan data untuk dibuat
                    $siswaData = [
                        'nama' => $data[$columnIndexes['nama']],
                        'nis' => $data[$columnIndexes['nis']],
                        'kelas_id' => $defaultKelas->id,
                    ];
                    
                    // Tambahkan jenis kelamin jika ada
                    if (isset($columnIndexes['jenis_kelamin']) && isset($data[$columnIndexes['jenis_kelamin']])) {
                        $jenisKelamin = trim(strtoupper($data[$columnIndexes['jenis_kelamin']]));
                        if (in_array($jenisKelamin, ['L', 'P'])) {
                            $siswaData['jenis_kelamin'] = $jenisKelamin;
                        }
                    }
                    
                    // Tambahkan alamat jika ada
                    if (isset($columnIndexes['alamat']) && isset($data[$columnIndexes['alamat']])) {
                        $siswaData['alamat'] = $data[$columnIndexes['alamat']];
                    }
                    
                    // Cek kelas jika ada di CSV
                    if (isset($columnIndexes['kelas']) && isset($data[$columnIndexes['kelas']]) && !empty($data[$columnIndexes['kelas']])) {
                        $kelasNama = $data[$columnIndexes['kelas']];
                        $guru = Guru::first();
                        
                        // Buat kode kelas yang unik berdasarkan nama kelas
                        // Gunakan format yang lebih unik untuk mencegah duplikasi
                        $kodeKelas = 'K' . substr(md5($kelasNama), 0, 8);
                        
                        // Cari kelas berdasarkan nama terlebih dahulu
                        $kelas = Kelas::where('nama_kelas', $kelasNama)->first();
                        
                        // Jika tidak ditemukan, buat baru
                        if (!$kelas) {
                            $kelas = Kelas::create([
                                'nama_kelas' => $kelasNama,
                                'kode_kelas' => $kodeKelas,
                                'guru_id' => $guru ? $guru->id : 1
                            ]);
                        }
                        
                        $siswaData['kelas_id'] = $kelas->id;
                    }
                    
                    // Cek apakah NIS sudah ada
                    $existingSiswa = Siswa::where('nis', $siswaData['nis'])->first();
                    if ($existingSiswa) {
                        // Update data yang sudah ada
                        $existingSiswa->update($siswaData);
                    } else {
                        // Buat data baru
                        Siswa::create($siswaData);
                    }
                    
                    $imported++;
                    
                } catch (\Exception $e) {
                    $failed++;
                    $errors[] = "Baris $lineNumber: " . $e->getMessage();
                }
            }
            
            fclose($handle);
            
            $message = "Berhasil import $imported data siswa. ";
            if ($failed > 0) {
                $message .= "Gagal import $failed data.";
                return redirect()->route('siswa.index')
                    ->with('warning', $message)
                    ->with('importErrors', $errors);
            }
            
            return redirect()->route('siswa.index')->with('success', $message);
            
        } catch (\Exception $e) {
            if (isset($handle) && $handle !== FALSE) {
                fclose($handle);
            }
            return redirect()->route('siswa.index')
                ->with('error', 'Gagal import data: ' . $e->getMessage());
        }
    }
    
    /**
     * Download template CSV untuk import data
     */
    public function exportCSVTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_siswa.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];
        
        $callback = function() {
            $file = fopen('php://output', 'w');
            
            // Header kolom
            fputcsv($file, ['nama', 'nis', 'jenis_kelamin', 'alamat', 'kelas']);
            
            // Contoh data
            fputcsv($file, ['Masukan Nama', 'Masukan Nis', 'masukan jenis kelamin', 'masukan alamat', 'masukan kelas']);
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
    public function profile($id){
        
    $siswa = Siswa::with(['nilai.mapel', 'kelas'])->where('user_id', $id)->firstOrFail();
    return view('siswa.profile', compact('siswa'));
}


}