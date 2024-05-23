<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PemetaanPelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelanggan = 0;

        function tambahPelanggan ($latitude, $longitude, $idKecamatan, $petaODP, $alamatPemetaan) {
            for($i=0; $i<count($latitude); $i++) {
                $petaODP++;
    
                $newLatitude = [];
                $newLongitude = [];
    
                for($j=0; $j<5; $j++) {
                    $lat = $latitude[$i];
                    $lon = $longitude[$i];
    
                    $radiusRad = 0.25/111.3;
                    $y0 = $lat;
                    $x0 = $lon;
                    $u = \lcg_value();
                    $v = \lcg_value();
                    $w = $radiusRad * \sqrt($u);
                    $t = 2 * M_PI * $v;
                    $x = $w * \cos($t);
                    $y1 = $w * \sin($t);
                    $x1 = $x / \cos(\deg2rad($y0));
                    $newY = \round($y0 + $y1, 13);
                    $newX = \round($x0 + $x1, 13);
    
                    array_push($newLatitude, $newY);
                    array_push($newLongitude, $newX);
                }
    
                for($k=0; $k<count($newLatitude); $k++){
                    global $pelanggan;
                    $pelanggan++;
                    
                    \App\PemetaanPelanggan::create([
                        'id_kecamatan' => $idKecamatan,
                        'alamat' => $alamatPemetaan,
                        'latitude' => $newLatitude[$k],
                        'longitude'  => $newLongitude[$k],
                        'keterangan' => (rand(0,9) > 7 ? 'Gangguan' : 'Lancar'),
                        'port' => ($k+1),
                        'id_pelanggan'  => $pelanggan,
                        'id_pengguna' => ($k+1),
                        'id_petaodp' => $petaODP,
                    ]);
                }
            }
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
        
        $idKecamatan = 25;
        $petaODP = 0;
        $alamatPemetaan = "Pangalengan";

        tambahPelanggan($latitude, $longitude, $idKecamatan, $petaODP, $alamatPemetaan);

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

        $idKecamatan = 31;
        $petaODP = 3;
        $alamatPemetaan = "Soreang";
        
        tambahPelanggan($latitude, $longitude, $idKecamatan, $petaODP, $alamatPemetaan);

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

        $idKecamatan = 2;
        $petaODP = 6;
        $alamatPemetaan = "Baleendah";
     
        tambahPelanggan($latitude, $longitude, $idKecamatan, $petaODP, $alamatPemetaan);

        // ODP Banjaran
        $latitude = [
            -7.053257726994978,
        ];

        // ODP Banjaran
        $longitude = [
            107.5910371541977,
        ];

        $idKecamatan = 2;
        $petaODP = 9;
        $alamatPemetaan = "Banjaran";
     
        tambahPelanggan($latitude, $longitude, $idKecamatan, $petaODP, $alamatPemetaan);
    }
}
