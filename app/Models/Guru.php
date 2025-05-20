<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['user_id', 'nama', 'nip'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }

    public function mapel()
{
    return $this->belongsToMany(Mapel::class, 'guru_mapel');
}



}

