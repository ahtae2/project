<?php

use Illuminate\Database\Seeder;

class OpticalDistributionCabinetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 31; $i++){
            \App\OpticalDistributionCabinet::create([
                'nama'  => 'ODC-' . $i,
                'core'  => 144,
                'model' => 'PAZ',
            ]);
        }
    }
}
