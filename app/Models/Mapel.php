<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode', 'nama_mapel'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function gurus()
{
    return $this->belongsToMany(Guru::class, 'guru_mapel');
}

    public function siswa()
{
    return $this->belongsTo(Siswa::class);
}
}
