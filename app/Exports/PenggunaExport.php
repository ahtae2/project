<?php

namespace App\Exports;

use App\Pengguna;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenggunaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $tgl_awal;
    protected $tgl_akhir;

    function __construct($tgl_awal, $tgl_akhir) {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }

    public function collection()
    {
        return Pengguna::whereBetween('created_at', [$this->tgl_awal, $this->tgl_akhir])->get();  
    }
}
