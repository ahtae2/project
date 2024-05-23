<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifikasiPelanggan extends Model
{
    protected $guarded = [];
    
    public function paketLangganan()
    {
        return $this->belongsTo(PaketLangganan::class, 'paket_id', 'id');
    }
}
