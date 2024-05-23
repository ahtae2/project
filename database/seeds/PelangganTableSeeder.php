<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaketLanggananTableSeeder::class);
        $faker = Faker::create('id_ID');

        $fakerJob = Faker::create('en_US');

        
        for ($i = 1; $i <= 50; $i++) {
            $gender = $faker->randomElement(['pria', 'wanita'])[0];
            $paket_id = $faker->randomElement(['1', '2', '3'])[0];

            \App\Pelanggan::create([
                'nama'  => $faker->name($gender),
                'alamat' => 'Bandung',
                'kontak' => $faker->phoneNumber,
                'tanggal_lahir' => $faker->dateTimeBetween('1960-01-01', '2000-12-31')->format('Y-m-d'),
                'email' => $faker->email(),
                'identitas' => $faker->nik(),
                'jenis_kelamin' => $gender,
                'paket_id' => $paket_id,
                'pekerjaan' => $fakerJob->jobTitle,
            ]);
        }
    }
}
