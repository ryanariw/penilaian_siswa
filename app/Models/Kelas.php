<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['guru_id', 'kode_kelas','nama_kelas'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
