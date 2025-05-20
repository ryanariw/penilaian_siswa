<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['user_id','kelas_id', 'nama', 'nis',  'alamat', 'jenis kelamin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}

