<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Pengguna;

class PenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Auto Generate
        $faker = Faker::create('id_ID');

        $gender = $faker->randomElement(['pria', 'wanita']);

        Pengguna::create([
            'nama'  => $faker->name($gender),
            'email' => 'admin@radmila.co.id',
            'password'  => bcrypt('datek123'),
            'alamat'  => 'Bandung',
            'tanggal_lahir' => $faker->dateTimeBetween('1960-01-01', '2000-12-31')->format('Y-m-d'),
            'identitas' => $faker->nik(),
            'jenis_kelamin' => $gender,
            'kontak' => '082214070367',
            'role' => 'admin',
            'foto' => 'dummy.png',
            'email_verified_at' => now(),
            'verifikasi' => 1,
            'remember_token' => Str::random(60)
        ]);

        Pengguna::create([
            'nama'  => $faker->name($gender),
            'email' => 'teknisi@radmila.co.id',
            'password'  => bcrypt('datek123'),
            'alamat'  => 'Bandung',
            'tanggal_lahir' => $faker->dateTimeBetween('1960-01-01', '2000-12-31')->format('Y-m-d'),
            'identitas' => $faker->nik(),
            'jenis_kelamin' => $gender,
            'kontak' => '082214070367',
            'role' => 'teknisi',
            'foto' => 'teknisi.jpg',
            'email_verified_at' => now(),
            'verifikasi' => 1,
            'remember_token' => Str::random(60)
        ]);

        Pengguna::create([
            'nama'  => $faker->name($gender),
            'email' => 'sales@radmila.co.id',
            'password'  => bcrypt('datek123'),
            'alamat'  => 'Bandung',
            'tanggal_lahir' => $faker->dateTimeBetween('1960-01-01', '2000-12-31')->format('Y-m-d'),
            'identitas' => $faker->nik(),
            'jenis_kelamin' => $gender,
            'kontak' => '082214070367',
            'role' => 'sales',
            'foto' => 'sales.jpg',
            'email_verified_at' => now(),
            'verifikasi' => 1,
            'remember_token' => Str::random(60)
        ]);
        
        Pengguna::create([
            'nama'  => $faker->name($gender),
            'email' => 'pimpinan@radmila.co.id',
            'password'  => bcrypt('datek123'),
            'alamat'  => 'Bandung',
            'tanggal_lahir' => $faker->dateTimeBetween('1960-01-01', '2000-12-31')->format('Y-m-d'),
            'identitas' => $faker->nik(),
            'jenis_kelamin' => $gender,
            'kontak' => '082214070367',
            'role' => 'pimpinan',
            'foto' => 'dummy.png',
            'email_verified_at' => now(),
            'verifikasi' => 1,
            'remember_token' => Str::random(60)
        ]);

        // for($i = 1; $i <= 7; $i++){
        //     $gender = $faker->randomElement(['pria', 'wanita']);

        //     Pengguna::create([
        //         'nama'  => $faker->name($gender),
        //         'email' => $faker->email(),
        //         'password'  => bcrypt('datek123'),
        //         'alamat'  => 'Bandung',
        //         'tanggal_lahir' => $faker->dateTimeBetween('1960-01-01', '2000-12-31')->format('Y-m-d'),
        //         'identitas' => $faker->nik(),
        //         'jenis_kelamin' => $gender,
        //         'kontak' => $faker->phoneNumber,
        //         'role' => 'teknisi',
        //         'foto' => 'dummy.png',
        //         'email_verified_at' => now(),
        //         'verifikasi' => 1,
        //         'remember_token' => Str::random(60)
        //     ]);
        // }
    }
}
