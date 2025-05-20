<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Cache;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;

class AuthController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        if ($user->role === 'siswa') {
            // Data khusus siswa
            $siswa = $user->siswa;

            // Ambil nilai siswa tersebut
            $nilaiSiswa = Nilai::with('mapel')
                ->where('siswa_id', $siswa->id)
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get();

            return view('dashboard.home', [
                'isSiswa' => true,
                'nilaiSiswa' => $nilaiSiswa,
                'siswa' => $siswa,
            ]);
        } else {
            // Data umum untuk guru, admin, dll
            $jumlahSiswa = Cache::remember('jumlahSiswa', 300, function () {
                return Siswa::count();
            });
            $jumlahGuru = Cache::remember('jumlahGuru', 300, function () {
                return Guru::count();
            });
            $jumlahKelas = Cache::remember('jumlahKelas', 300, function () {
                return Kelas::count();
            });
            $jumlahMapel = Cache::remember('jumlahMapel', 300, function () {
                return Mapel::count();
            });

            // Ambil 5 nilai terbaru
            $nilaiTerbaru = Nilai::with(['siswa', 'mapel'])->orderBy('id', 'desc')->limit(5)->get();

            // Optimasi query distribusi nilai akhir dengan single query
            $distribusiNilaiRaw = Cache::remember('distribusiNilai', 300, function () {
                return Nilai::selectRaw('FLOOR(nilai_akhir / 10) as range_group, COUNT(*) as count')
                    ->groupBy('range_group')
                    ->pluck('count', 'range_group')
                    ->toArray();
            });

            $distribusiNilai = [];
            for ($i = 0; $i < 10; $i++) {
                $distribusiNilai[] = $distribusiNilaiRaw[$i] ?? 0;
            }

            return view('dashboard.home', compact(
                'jumlahSiswa',
                'jumlahGuru',
                'jumlahKelas',
                'jumlahMapel',
                'nilaiTerbaru',
                'distribusiNilai'
            ));
        }
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Redirect based on role
            return redirect('/home');
        }

        return redirect()->back()->withErrors([
            'nip' => 'The provided credentials do not match our records.',
        ])->onlyInput('nip');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
