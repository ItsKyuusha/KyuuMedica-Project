<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $fillable = ['nama', 'alamat', 'no_hp', 'email', 'role', 'password'];

    public function periksaSebagaiAdmin(): HasMany
    {
        return $this->hasMany(Periksa::class, 'id_admin');
    }

    public function periksaSebagaiPasien(): HasMany
    {
        return $this->hasMany(Periksa::class, 'id_pasien');
    }

    public function periksaSebagaiDokter(): HasMany
    {
        return $this->hasMany(Periksa::class, 'id_dokter');
    }
}
