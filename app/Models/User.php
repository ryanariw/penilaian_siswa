<?php

namespace App\Models;




use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable

{

    protected $table = 'users';
   protected $fillable = ['name', 'nip', 'email', 'password', 'role'];


    use HasFactory;
    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    
}
