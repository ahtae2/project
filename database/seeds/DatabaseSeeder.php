<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call(PenggunaTableSeeder::class);
        $this->call(OpticalDistributionCabinetTableSeeder::class);
        $this->call(PerangkatTableSeeder::class);
        $this->call(PelangganTableSeeder::class);
        // $this->call(PemetaanOpticalDistributionCabinetTableSeeder::class);
        // $this->call(PemetaanPerangkatTableSeeder::class);
        // $this->call(PemetaanPelangganTableSeeder::class);
    }
}
