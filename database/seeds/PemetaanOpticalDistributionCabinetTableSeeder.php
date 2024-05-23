<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PemetaanOpticalDistributionCabinetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc) {
            \App\PemetaanOpticalDistributionCabinet::create([
                'nama' => $nama,
                'alamat' => $alamat,
                'latitude' => $lat, 
                'longitude'  => $lon,
                'keterangan' => "Lancar",
                'foto' => 'odc.jpg',
                'id_kecamatan' => $id_kecamatan,
                'id_odc' => $id_odc,
                'id_pengguna' => 3,
            ]);
        }

        // ODC Arjasari
        $nama = 'ODC-ARJ-1';
        $alamat = "Arjasari";
        $lat = -7.077639575610853; 
        $lon = 107.63783097267152;
        $id_kecamatan = 1;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Baleendah
        $nama = 'ODC-BLN-1';
        $alamat = "Baleendah";
        $lat = -7.009069278386386; 
        $lon = 107.63503074645998;
        $id_kecamatan = 2;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Banjaran
        $nama = 'ODC-BJR-1';
        $alamat = "Banjaran";
        $lat = -7.055835403114302; 
        $lon = 107.59035587310792;
        $id_kecamatan = 3;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Bojongsoang
        $nama = 'ODC-BJG-1';
        $alamat = "Bojongsoang";
        $lat = -6.987940570356589; 
        $lon = 107.6479482650757;
        $id_kecamatan = 4;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Dayeuhkolot
        $nama = 'ODC-DYH-1';
        $alamat = "Dayeuhkolot";
        $lat = -6.983083209684022; 
        $lon = 107.6214909553528;
        $id_kecamatan = 5;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Cangkuang
        $nama = 'ODC-CKG-1';
        $alamat = "Cangkuang";
        $lat = -7.048506812204995; 
        $lon = 107.53688335418703;
        $id_kecamatan = 6;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Cicalengka
        $nama = 'ODC-CCL-1';
        $alamat = "Cicalengka";
        $lat = -6.986410610761026; 
        $lon = 107.8429126739502;
        $id_kecamatan = 7;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Cikancung
        $nama = 'ODC-CKC-1';
        $alamat = "Cikancung";
        $lat = -7.023037420846142; 
        $lon = 107.82145500183107;
        $id_kecamatan = 8;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Cilengkrang
        $nama = 'ODC-CLK-1';
        $alamat = "Cilengkrang";
        $lat = -6.878731268757977; 
        $lon = 107.72373139858246;
        $id_kecamatan = 9;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Cileunyi
        $nama = 'ODC-CLY-1';
        $alamat = "Cileunyi";
        $lat = -6.925062411948832; 
        $lon = 107.73343563079835;
        $id_kecamatan = 10;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Cimaung
        $nama = 'ODC-CMU-1';
        $alamat = "Cimaung";
        $lat = -7.097149457348665; 
        $lon = 107.56653785705568;
        $id_kecamatan = 11;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Cimenyan
        $nama = 'ODC-CMN-1';
        $alamat = "Cimenyan";
        $lat = -6.864733171514305; 
        $lon = 107.6722812652588;
        $id_kecamatan = 12;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Ciparay
        $nama = 'ODC-CPR-1';
        $alamat = "Ciparay";
        $lat = -7.030870654819888; 
        $lon = 107.71004676818849;
        $id_kecamatan = 13;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Ciwidey
        $nama = 'ODC-CWD-1';
        $alamat = "Ciwidey";
        $lat = -7.102589485850909; 
        $lon = 107.4525547027588;
        $id_kecamatan = 14;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Ibun
        $nama = 'ODC-IBN-1';
        $alamat = "Ibun";
        $lat = -7.129330506161791; 
        $lon = 107.75914192199707;
        $id_kecamatan = 15;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Pangalengan
        $nama = 'ODC-PGL-1';
        $alamat = "Pangalengan";
        $lat = -7.196048094571586; 
        $lon = 107.5721597671509;
        $id_kecamatan = 25;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);

        // ODC Soreang
        $nama = 'ODC-SRG-1';
        $alamat = "Soreang";
        $lat = -7.030007285510377; 
        $lon = 107.51924514770509;
        $id_kecamatan = 31;
        $id_odc = $id_kecamatan;
        tambahODC($nama, $alamat, $lat, $lon, $id_kecamatan, $id_odc);
    }
}
