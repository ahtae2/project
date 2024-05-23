<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $guarded = [];

    public function pelanggans()
    {
        return $this->hasMany(Pelanggan::class, 'id_odp', 'id');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }
}
