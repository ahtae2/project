<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\Perangkat;
use DB;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = app('App\Http\Controllers\WilayahController')->getProvince();

        if(!$request->has('district')) {
            $odc = true;
            $odp = true;
            $pelanggan = true;
            $currentKecamatan = (object) array();
            $currentKecamatan->nama = '';

            $pemetaanODC = Map::PemetaanODC()->get();
            $pemetaanPerangkat = Map::PemetaanODP()->get();
            $pemetaanPelanggan = Map::PemetaanPelanggan()->get();

            $jumlahODC = DB::select( DB::raw('SELECT indonesia_districts.name, id_kecamatan, COUNT(*) as kecamatan FROM pemetaan_optical_distribution_cabinets LEFT JOIN indonesia_districts
            ON pemetaan_optical_distribution_cabinets.id_kecamatan = indonesia_districts.id GROUP BY id_kecamatan ORDER BY kecamatan DESC'));
            $jumlahODP = DB::select( DB::raw('SELECT indonesia_districts.name, id_kecamatan, COUNT(*) as kecamatan FROM pemetaan_perangkats LEFT JOIN indonesia_districts
            ON pemetaan_perangkats.id_kecamatan = indonesia_districts.id GROUP BY id_kecamatan ORDER BY kecamatan DESC'));
            $jumlahPelanggan = DB::select( DB::raw('SELECT indonesia_districts.name, id_kecamatan, COUNT(*) as kecamatan FROM pemetaan_pelanggans LEFT JOIN indonesia_districts
            ON pemetaan_pelanggans.id_kecamatan = indonesia_districts.id GROUP BY id_kecamatan ORDER BY kecamatan DESC'));
        }

        if($request->has('district')) {
            $currentKecamatan = DB::table('indonesia_districts')->select('name')->where('id', $request->district)->first();
            $odc = $request->has('odc') ? true : false;
            $odp = $request->has('odp') ? true : false;
            $pelanggan = $request->has('pelanggan') ? true : false;

            $jumlahODC = DB::select( DB::raw('SELECT indonesia_districts.name, id_kecamatan, COUNT(*) as kecamatan FROM pemetaan_optical_distribution_cabinets LEFT JOIN indonesia_districts
            ON pemetaan_optical_distribution_cabinets.id_kecamatan = indonesia_districts.id WHERE pemetaan_optical_distribution_cabinets.id_kecamatan = ' . $request->district . ' GROUP BY id_kecamatan ORDER BY kecamatan DESC'));
            $jumlahODP = DB::select( DB::raw('SELECT indonesia_districts.name, id_kecamatan, COUNT(*) as kecamatan FROM pemetaan_perangkats LEFT JOIN indonesia_districts
            ON pemetaan_perangkats.id_kecamatan = indonesia_districts.id WHERE pemetaan_perangkats.id_kecamatan = ' . $request->district . ' GROUP BY id_kecamatan ORDER BY kecamatan DESC'));
            $jumlahPelanggan = DB::select( DB::raw('SELECT indonesia_districts.name, id_kecamatan, COUNT(*) as kecamatan FROM pemetaan_pelanggans LEFT JOIN indonesia_districts
            ON pemetaan_pelanggans.id_kecamatan = indonesia_districts.id WHERE pemetaan_pelanggans.id_kecamatan = ' . $request->district . ' GROUP BY id_kecamatan ORDER BY kecamatan DESC'));

            if($odc) {
                $pemetaanODC = Map::PemetaanODC()->where('pemetaan_optical_distribution_cabinets.id_kecamatan', $request->district)->get();
            } else {
                $pemetaanODC = [];
            }

            if($odp) {
                $pemetaanPerangkat = Map::PemetaanODP()->where('pemetaan_perangkats.id_kecamatan', $request->district)->get();
            } else {
                $pemetaanPerangkat = [];
            }

            if($pelanggan) {
                $pemetaanPelanggan = Map::PemetaanPelanggan()->where('pemetaan_pelanggans.id_kecamatan', $request->district)->get();
            } else {
                $pemetaanPelanggan = [];
            }
        }

        $kecamatan = DB::table('indonesia_districts')->get();

        return view('pages.map.index', compact('provinces', 'pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'kecamatan', 'odc', 'odp', 'pelanggan', 'currentKecamatan', 'jumlahODC', 'jumlahODP', 'jumlahPelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
