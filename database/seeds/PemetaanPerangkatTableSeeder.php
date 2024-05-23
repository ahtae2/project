<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PemetaanPerangkatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        function tambahODP($nama, $lat, $lon, $alamat, $id_kecamatan, $id_petaodc) {
            for($i=0; $i<count($lat); $i++){
                \App\PemetaanPerangkat::create([
                    'id_odp'  => ($i+1),
                    'nama' => $nama.($i+1),
                    'id_kecamatan' => $id_kecamatan,
                    'alamat' => $alamat,
                    'latitude' => $lat[$i],
                    'longitude'  => $lon[$i],
                    'keterangan' => (rand(0,9) > 7 ? 'Gangguan' : 'Lancar'),
                    'foto' => 'odp1.jpg',
                    'id_petaodc' => $id_petaodc,
                    'port' => ($i+1),
                    'id_pengguna' => 3,
                ]);
            }
        }

        // ODP Arjasari
        $lat = [
            -7.077283379157524,
        ];

        // ODP Arjasari
        $lon = [
            107.63738304376604,
        ];

        $nama = 'ODP-ARJ-';
        $alamat = 'Arjasari';
        $id_kecamatan = 1;
        $id_petaodc = $id_kecamatan;

        tambahODP($nama, $lat, $lon, $alamat, $id_kecamatan, $id_petaodc);

        // ODP Baleendah
        $latitude = [
            -7.003618362114665, 
            -7.012646407543912,
            -6.987094883121739
        ];

        // ODP Baleendah
        $longitude = [
            107.61134147644044, 
            107.63537406921388, 
            107.6060199737549
        ];

        for($i=0; $i<count($latitude); $i++){
            \App\PemetaanPerangkat::create([
                'id_odp'  => ($i+1),
                'nama' => 'ODP-BLN-'.($i+1),
                'id_kecamatan' => 2,
                'alamat' => 'Bandung',
                'latitude' => $latitude[$i],
                'longitude'  => $longitude[$i],
                'keterangan' => (rand(0,9) > 7 ? 'Gangguan' : 'Lancar'),
                'foto' => 'odp'. $faker->numberBetween(1,6) .'.jpg',
                'id_petaodc' => 2,
                'port' => ($i+1),
                'id_pengguna' => $faker->numberBetween(1,9),
            ]);
        }

        // ODP Banjaran
        $latitude = [
            -7.053257726994978,
        ];

        // ODP Banjaran
        $longitude = [
            107.5910371541977,
        ];

        for($i=0; $i<count($latitude); $i++){
            \App\PemetaanPerangkat::create([
                'id_odp'  => ($i+1),
                'nama' => 'ODP-BJR-'.($i+1),
                'id_kecamatan' => 3,
                'alamat' => 'Bandung',
                'latitude' => $latitude[$i],
                'longitude'  => $longitude[$i],
                'keterangan' => (rand(0,9) > 7 ? 'Gangguan' : 'Lancar'),
                'foto' => 'odp'. $faker->numberBetween(1,6) .'.jpg',
                'id_petaodc' => 3,
                'port' => ($i+1),
                'id_pengguna' => $faker->numberBetween(1,9),
            ]);
        }

        // ODP Cileunyi
        $lat = [
            -6.925983761571639,
            -6.926494601569393,
            -6.9319435271100325
        ];

        // ODP Cileunyi
        $lon = [
            107.72957324981691,
            107.73489475250246,
            107.73257732391359,
        ];

        $nama = 'ODP-CLY-';
        $alamat = 'Cileunyi';
        $id_kecamatan = 10;
        $id_petaodc = $id_kecamatan;

        tambahODP($nama, $lat, $lon, $alamat, $id_kecamatan, $id_petaodc);

        // ODP Cimaung
        $lat = [
            -7.081310104428774,
            -7.097319304491103,
        ];

        // ODP Cimaung
        $lon = [
            107.5649929046631,
            107.56396293640138,
        ];

        $nama = 'ODP-CMU-';
        $alamat = 'Cimaung';
        $id_kecamatan = 11;
        $id_petaodc = $id_kecamatan;

        tambahODP($nama, $lat, $lon, $alamat, $id_kecamatan, $id_petaodc);

        // ODP Ciparay
        $latitude = [
            -7.018431135595736,
        ];

        // ODP Ciparay
        $longitude = [
            107.69382476806642,
        ];

        for($i=0; $i<count($latitude); $i++){
            \App\PemetaanPerangkat::create([
                'id_odp'  => ($i+1),
                'nama' => 'ODP-IBN-'.($i+1),
                'id_kecamatan' => 15,
                'alamat' => 'Bandung',
                'latitude' => $latitude[$i],
                'longitude'  => $longitude[$i],
                'keterangan' => (rand(0,9) > 7 ? 'Gangguan' : 'Lancar'),
                'foto' => 'odp'. $faker->numberBetween(1,6) .'.jpg',
                'id_petaodc' => 15,
                'port' => ($i+1),
                'id_pengguna' => $faker->numberBetween(1,9),
            ]);
        }

        // ODP Ciwidey
        $lat = [
            -7.102937043990291,
            -7.107024360191956,
        ];

        // ODP Ciwidey
        $lon = [
            107.44669675827028,
            107.44734048843385,
        ];

        $nama = 'ODP-CWD-';
        $alamat = 'Ciwidey';
        $id_kecamatan = 14;
        $id_petaodc = $id_kecamatan;

        tambahODP($nama, $lat, $lon, $alamat, $id_kecamatan, $id_petaodc);

        // ODP Ibun
        $latitude = [
            -7.099504321745893,
        ];

        // ODP Ibun
        $longitude = [
            107.7542495727539,
        ];

        for($i=0; $i<count($latitude); $i++){
            \App\PemetaanPerangkat::create([
                'id_odp'  => ($i+1),
                'nama' => 'ODP-IBN-'.($i+1),
                'id_kecamatan' => 15,
                'alamat' => 'Bandung',
                'latitude' => $latitude[$i],
                'longitude'  => $longitude[$i],
                'keterangan' => (rand(0,9) > 7 ? 'Gangguan' : 'Lancar'),
                'foto' => 'odp'. $faker->numberBetween(1,6) .'.jpg',
                'id_petaodc' => 15,
                'port' => ($i+1),
                'id_pengguna' => $faker->numberBetween(1,9),
            ]);
        }

        // ODP Pangalengan
        $latitude = [
            -7.193487227114664, 
            -7.189310589536692, 
            -7.201847385889687
        ];

        // ODP Pangalengan
        $longitude = [
            107.57816791534425, 
            107.57095813751222, 
            107.56769657135011
        ];

        for($i=0; $i<count($latitude); $i++){
            \App\PemetaanPerangkat::create([
                'id_odp'  => ($i+1),
                'nama' => 'ODP-PGL-'.($i+1),
                'id_kecamatan' => 25,
                'alamat' => 'Bandung',
                'latitude' => $latitude[$i],
                'longitude'  => $longitude[$i],
                'keterangan' => (rand(0,9) > 7 ? 'Gangguan' : 'Lancar'),
                'foto' => 'odp'. $faker->numberBetween(1,6) .'.jpg',
                'id_petaodc' => 1,
                'port' => ($i+1),
                'id_pengguna' => $faker->numberBetween(1,9),
            ]);
        }

        // ODP Soreang
        $latitude = [
            -7.033519471663885, 
            -7.030330796553625, 
            -7.023595901921201
        ];

        // ODP Soreang
        $longitude = [
            107.5180220603942, 
            107.52621889114381, 
            107.52497434616089
        ];

        for($i=0; $i<count($latitude); $i++){
            \App\PemetaanPerangkat::create([
                'id_odp'  => ($i+1),
                'nama' => 'ODP-SRG-'.($i+1),
                'id_kecamatan' => 31,
                'alamat' => 'Bandung',
                'latitude' => $latitude[$i],
                'longitude'  => $longitude[$i],
                'keterangan' => (rand(0,9) > 7 ? 'Gangguan' : 'Lancar'),
                'foto' => 'odp'. $faker->numberBetween(1,6) .'.jpg',
                'id_petaodc' => 2,
                'port' => ($i+1),
                'id_pengguna' => $faker->numberBetween(1,9),
            ]);
        }
    }
}
