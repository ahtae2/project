<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\Perangkat;
use DB;

class AdminController extends Controller
{
    public function index() 
    {
        $pemetaanODC = Map::PemetaanODC()->get();
        $pemetaanPerangkat = Map::PemetaanODP()->get();
        $pemetaanPelanggan = Map::PemetaanPelanggan()->get();

        // Dashboard Status
        $pelanggan = Map::PemetaanPelanggan()->get()->count();
        $pengguna = DB::table('penggunas')->count();
        $jumlahPerangkat = DB::table('pemetaan_optical_distribution_cabinets')->count() + DB::table('pemetaan_perangkats')->count();
        $gangguan = (DB::table('pemetaan_perangkats')->where('keterangan', 'Gangguan')->count()) + (DB::table('pemetaan_pelanggans')->where('keterangan', 'Gangguan')->count());

        $jumlahPelanggan = DB::select( DB::raw('SELECT indonesia_districts.name, id_kecamatan, COUNT(*) as kecamatan FROM pemetaan_pelanggans LEFT JOIN indonesia_districts
        ON pemetaan_pelanggans.id_kecamatan = indonesia_districts.id GROUP BY id_kecamatan ORDER BY kecamatan DESC'));

        $newPengguna = \App\Pengguna::where('verifikasi', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $newPemetaanPerangkat = Map::PemetaanODP()->orderBy('created_at', 'desc')->take(3)->get();
        $perangkat = Perangkat::orderBy('created_at', 'desc')->take(3)->get();

        return view('pages.dashboard.index', compact('pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'pelanggan', 'pengguna', 'jumlahPerangkat', 'gangguan', 'jumlahPelanggan', 'newPengguna', 'newPemetaanPerangkat', 'perangkat'));
    }

    public function map() {
        $pemetaanODC = Map::PemetaanODC()->get();
        $pemetaanPerangkat = Map::PemetaanODP()->get();
        $pemetaanPelanggan = Map::PemetaanPelanggan()->get();
        
        return view('pages.map', compact('pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan'));
    }

    public function fibermap() {
        $pemetaanPerangkat = Map::PemetaanODP()->get();
        
        return view('pages.fibermap', compact('pemetaanPerangkat'));
        // return view('welcome', compact('pemetaanPerangkat'));
    }
}
