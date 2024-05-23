<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $guarded = [];

    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'id_odp', 'id');
    }

    public function paketLangganan()
    {
        return $this->belongsTo(PaketLangganan::class, 'paket_id', 'id');
    }
}
