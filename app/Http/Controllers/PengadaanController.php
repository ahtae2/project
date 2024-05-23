<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\Pengadaan;
use App\Pengguna;
use App\Pelanggan;
use DB;

class PengadaanController extends Controller
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

        $pengadaan = DB::table('pengadaans')
                        ->leftJoin('penggunas', 'pengadaans.id_pengguna', '=', 'penggunas.id')
                        ->leftJoin('pelanggans', 'pengadaans.id_pelanggan', '=', 'pelanggans.id')
                        ->select('pengadaans.*', 'penggunas.nama as sales', 'pelanggans.nama')
                        ->get();


        return view('pages.pengadaan.index', compact('pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'pengadaan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemetaanODC = Map::PemetaanODC()->get();
        $pemetaanPerangkat = Map::PemetaanODP()->get();
        $pemetaanPelanggan = Map::PemetaanPelanggan()->get();
        
        $data = [];
        
        foreach ($pemetaanPelanggan as $value) {
            $data[] = $value->id;
        }
        $pelanggan = Pelanggan::select('id', 'nama')->whereNotIn('id', $data)->get();

        $pengguna = DB::table('penggunas')->where('role', '=', 'sales')->get();
        $pengguna = json_decode($pengguna, true);

        return view('pages.pengadaan.create', compact('pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'pengguna', 'pelanggan'));
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
            'id_pelanggan' => ['required'],
            'id_pengguna' => ['required'],
            'alamat' => ['required', 'min:5'],
            'latitude'	=> ['required'],
            'longitude'	=> ['required'],
        ]);

        Pengadaan::create([
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'id_pelanggan' => $request->id_pelanggan,
            'id_pengguna' => $request->id_pengguna,
        ]);

        return redirect()->route('pengadaan.index')->with('status', 'Berhasil menambahkan!');
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
        $pengadaan = DB::table('pengadaans')
        ->leftJoin('penggunas', 'pengadaans.id_pengguna', '=', 'penggunas.id')
        ->leftJoin('pelanggans', 'pengadaans.id_pelanggan', '=', 'pelanggans.id')
        ->select('pengadaans.*', 'penggunas.nama as sales', 'pelanggans.nama')
        ->where('pengadaans.id', $id)
        ->first(); 

        $pelanggan = Pelanggan::all();
        
        $pengguna = DB::table('penggunas')->where('role', '=', 'sales')->get();
        $pengguna = json_decode($pengguna, true);

        return view('pages.pengadaan.edit', compact('pengadaan', 'pengguna', 'pelanggan'));
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
        $pengadaan = Pengadaan::findOrFail($id);

        $this->validate($request, [
            'id_pengguna' => ['required'],
            'alamat' => ['required', 'min:5'],
            'latitude'	=> ['required'],
            'longitude'	=> ['required'],
        ]);

        $pengadaan->update([
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'id_pengguna' => $request->id_pengguna,
        ]);

        return redirect()->route('pengadaan.index')->with('status', 'Berhasil mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);

        $pengadaan->delete();
        
        return redirect()->route('pengadaan.index')->with('status', 'Berhasil menghapus!');
    }

    public function exportPDF(Request $request) {
        $tglAwal = $request->tgl_awal;
        $tglAkhir = $request->tgl_akhir;

        $pengadaan = DB::table('pengadaans')
        ->leftJoin('penggunas', 'pengadaans.id_pengguna', '=', 'penggunas.id')
        ->leftJoin('pelanggans', 'pengadaans.id_pelanggan', '=', 'pelanggans.id')
        ->select('pengadaans.*', 'penggunas.nama as sales', 'pelanggans.nama')
        ->whereBetween('pengadaans.created_at', [$tglAwal, $tglAkhir])
        ->get();

        $pimpinan = \App\Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pengadaan.print', compact('pengadaan', 'pimpinan'));
    }
}
