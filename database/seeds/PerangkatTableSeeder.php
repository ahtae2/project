<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PerangkatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $model = array(
            'PAZ',
            'Sunsea',
        );

        for($i = 1; $i <= 30; $i++){
            \App\Perangkat::create([
                'nama'  => 'ODP-' . $i,
                'core'  => 8,
                'model' => $model[array_rand($model)]
            ]);
        }
    }
}
