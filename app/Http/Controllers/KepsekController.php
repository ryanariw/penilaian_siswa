<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KepsekController extends Controller
{
    // Tampilkan halaman dan data user
    public function index()
    {
        $users = User::all();
        return view('penilaian.kepsek', compact('users'));
    }

    // Simpan user baru (Tambah)
   public function store(Request $request)
{
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'nip' => 'required|string|max:100',
        'password' => 'required|string|min:6',
        'role' => 'required|in:admin,siswa,kepsek,guru',
    ]);
 

    // Hash password sebelum disimpan
    $validated['password'] = bcrypt($validated['password']);

    // Simpan data ke database
      User::create([
        'name' => $request->name,
        'nip' => $request->nip,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect()->route('kepsek.index')->with('success', 'User berhasil ditambah');
}


    // Update user (Edit)
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'role' => 'required|in:admin,guru,siswa,kepsek',
            'password' => 'nullable|string|min:6',
        ]);

        // Update data user
        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->role = $request->role;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('kepsek.index')->with('success', 'User berhasil diupdate');
    
}

    // Hapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('kepsek.index')->with('success', 'User berhasil dihapus.');
    }
}
