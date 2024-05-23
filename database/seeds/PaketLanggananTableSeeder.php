<?php

use App\PaketLangganan;
use Illuminate\Database\Seeder;

class PaketLanggananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namaPaket = ['paket lite', 'paket gold', 'paket platinum'];

        foreach ($namaPaket as $nama) {
            PaketLangganan::create([
                'nama_paket' => $nama,
            ]);
        }
    }
}
