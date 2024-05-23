<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\Pelanggan;
use App\PemetaanPelanggan;
use DB;
use App\Pengguna;

class PemetaanPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemetaanODC = Map::PemetaanODC()->get();
        $pemetaanPerangkat = Map::PemetaanODP()->get();
        $pemetaanPelanggan = Map::PemetaanPelanggan()->get();

        $pemetaanPerangkat = json_decode($pemetaanPerangkat, true);

        return view('pages.pemetaan.pelanggan.index', compact('pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = app('App\Http\Controllers\WilayahController')->getProvince();

        $pemetaanODC = Map::PemetaanODC()->get();
        $pemetaanPerangkat = Map::PemetaanODP()->get();
        $pemetaanPelanggan = Map::PemetaanPelanggan()->get();
        
        $data = [];
        
        foreach ($pemetaanPelanggan as $value) {
            $data[] = $value->id;
        }
        $pelanggan = Pelanggan::select('id', 'nama')->whereNotIn('id', $data)->get();

        $kecamatan = DB::table('indonesia_districts')->get();
        $kecamatan = json_decode($kecamatan, true);

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        $pemetaanPerangkat = json_decode($pemetaanPerangkat, true);

        return view('pages.pemetaan.pelanggan.create', compact('provinces', 'pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'pelanggan', 'kecamatan', 'pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_pelanggan'	=> ['required'],
            // 'id_kecamatan'	=> ['required'],
            'alamat' => ['required', 'min:5'],
            'latitude'	=> ['required'],
            'longitude'	=> ['required'],
            'port' => ['required'],
        ]);

        PemetaanPelanggan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_provinsi' => $request->province,
            'id_kota' => $request->city,
            'id_kecamatan' => $request->district,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude'  => $request->longitude,
            'keterangan' => $request->keterangan,
            'id_petaodp'  => $request->id_petaodp,
            'id_pengguna' => $request->id_pengguna,
            'port' => $request->port
        ]);

        // $request->create($request->all());

        return redirect()->route('pemetaan-pelanggan.index')->with('status', 'Berhasil menambahkan!');
    }

    public function port(Request $request) {
        // $port = Map::PemetaanODP()->where('pemetaan_perangkats.id', $request->get('id'))
        // ->pluck('core', 'id');

        $portPelanggan = Map::PemetaanPelanggan()->where('pemetaan_pelanggans.id_petaodp', $request->get('id'))->pluck('port')->toArray();

        $corePerangkat = Map::PemetaanODP()->where('pemetaan_perangkats.id', $request->get('id'))->get();

        foreach($corePerangkat as $value) {
            $corePerangkat = $value->core;
        }

        $corePerangkat = range(1, $corePerangkat);

        $portTersedia = array_diff($corePerangkat, $portPelanggan);

        // foreach($corePerangkat as $value) {
        //     echo $value;
        // }

        return response()->json($portTersedia);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemetaanPelanggan = Map::PemetaanPelanggan()->where('pemetaan_pelanggans.id', $id)
        ->first();

        return view('pages.pemetaan.pelanggan.detail', compact('pemetaanPelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinces = app('App\Http\Controllers\WilayahController')->getProvince();

        $pemetaanODC = Map::PemetaanODC()->get();
        $pemetaanPerangkat = Map::PemetaanODP()->get();
        $pemetaanPelanggan = Map::PemetaanPelanggan()->get();

        $pelanggan = Map::PemetaanPelanggan()->where('pemetaan_pelanggans.id', $id)
        ->first();  

        $kecamatan = DB::table('indonesia_districts')->get();
        $kecamatan = json_decode($kecamatan, true);

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        $pemetaanPerangkat = json_decode($pemetaanPerangkat, true);

        return view('pages.pemetaan.pelanggan.edit', compact('provinces', 'pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'pengguna', 'kecamatan', 'pelanggan'));
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
        $pemetaanPelanggan = pemetaanPelanggan::findOrFail($id);

        $this->validate($request, [
            'alamat' => ['required', 'min:5'],
            // 'id_kecamatan'	=> ['required'],
            'latitude'	=> ['required'],
            'longitude'	=> ['required'],
            'port' => ['required'],
        ]);

        $pemetaanPelanggan->update([
            'alamat' => $request->alamat,
            'id_provinsi' => $request->province,
            'id_kota' => $request->city,
            'id_kecamatan' => $request->district,
            'latitude' => $request->latitude,
            'longitude'  => $request->longitude,
            'keterangan' => $request->keterangan,
            'id_petaodp'  => $request->id_petaodp,
            'id_pengguna' => $request->id_pengguna,
            'port' => $request->port
        ]);

        // $request->create($request->all());

        return redirect()->route('pemetaan-pelanggan.index')->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemetaanPelanggan = PemetaanPelanggan::findOrFail($id);

        $pemetaanPelanggan->delete();
        return redirect()->route('pemetaan-pelanggan.index')->with('status', 'Berhasil menghapus!');
    }

    public function exportPDF(Request $request) {
        $pemetaanPelanggan = Map::PemetaanPelanggan()->whereBetween('pemetaan_pelanggans.created_at', [$request->tgl_awal, $request->tgl_akhir])->get();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemetaan.pelanggan.print', compact('pemetaanPelanggan', 'pimpinan'));
    }

    public function exportExcel(Request $request) {
        // return Excel::download(new PenggunaExport($request->tgl_awal, $request->tgl_akhir), 'pengguna.xlsx');
    }

    public function printdetail($id)
    {
        $pemetaanPelanggan = Map::PemetaanPelanggan()->where('pemetaan_pelanggans.id', $id)
        ->first();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemetaan.pelanggan.printdetail', compact('pemetaanPelanggan', 'pimpinan'));
    }
}
