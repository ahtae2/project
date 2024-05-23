<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PemetaanOpticalDistributionCabinet extends Model
{
    //
    protected $guarded = [];

    public function opticaldistributioncabinets()
    {
        return $this->hasMany('App\OpticalDistributionCabinet', 'id');
    }
}
