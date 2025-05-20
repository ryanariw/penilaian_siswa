<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;

class AuthController extends Controller
{
    public function home()
    {
        // Hitung jumlah data
        $jumlahSiswa = Siswa::count();
        $jumlahGuru = Guru::count();
        $jumlahKelas = Kelas::count();
        $jumlahMapel = Mapel::count();

        // Ambil 5 nilai terbaru
        $nilaiTerbaru = Nilai::with(['siswa', 'mapel'])->orderBy('id', 'desc')->limit(5)->get();

        // Siapkan data distribusi nilai akhir dalam rentang 0-100 dengan interval 10
        $distribusiNilai = [];
        for ($i = 0; $i < 10; $i++) {
            $min = $i * 10;
            $max = $min + 9;
            $count = Nilai::whereBetween('nilai_akhir', [$min, $max])->count();
            $distribusiNilai[] = $count;
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
