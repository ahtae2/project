<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PemetaanPelanggan;
use App\PemeliharaanPelanggan;
use App\Map;
use DB;

class PemeliharaanPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemeliharaanPelanggan = DB::table('pemeliharaan_pelanggans')
        ->leftJoin('pemetaan_pelanggans', 'pemeliharaan_pelanggans.id_petapelanggan', '=', 'pemetaan_pelanggans.id')
        ->leftJoin('pelanggans', 'pemetaan_pelanggans.id_pelanggan', '=', 'pelanggans.id')
        ->leftJoin('penggunas', 'pemeliharaan_pelanggans.id_pengguna', '=', 'penggunas.id')
        ->select('pemeliharaan_pelanggans.*', 'pelanggans.nama', 'pemeliharaan_pelanggans.created_at as tanggal_pemetaan', 'penggunas.nama as teknisi')
        ->get();

        $pemetaanPelanggan = DB::table('pemetaan_pelanggans')
        ->leftJoin('pelanggans', 'pemetaan_pelanggans.id_pelanggan', '=', 'pelanggans.id')
        ->select('pemetaan_pelanggans.*', 'pelanggans.nama', 'pemetaan_pelanggans.created_at as tanggal_pemetaan')
        ->get();

        return view('pages.pemeliharaan.pelanggan.index', compact('pemeliharaanPelanggan', 'pemetaanPelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];

        // $pemetaanPerangkat = PemetaanPerangkat::all();
        // foreach ($pemetaanPerangkat as $value) {
        //     $data[] = $value->id;
        // }
        // $perangkat = Perangkat::select('id', 'nama')->whereNotIn('id', $data)->get();
        
        $pemetaanPelanggan = Map::PemetaanPelanggan()->get();
        $pemetaanPelanggan = json_decode($pemetaanPelanggan, true);

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        return view('pages.pemeliharaan.pelanggan.create', compact('pemetaanPelanggan', 'pengguna'));
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
            'id_petapelanggan' => ['required'],
            'keterangan' => ['required'],
            'id_pengguna' => ['required']
        ]);

        PemeliharaanPelanggan::create([
            'id_petapelanggan'  => $request->id_petapelanggan,
            'keterangan' => $request->keterangan,
            'catatan' => $request->catatan,
            'id_pengguna' => $request->id_pengguna,
            'created_at' => $request->created_at
        ]);

        // Update status di pemetaan pelanggan
        $pemetaanPelanggan = PemetaanPelanggan::findOrFail($request->id_petapelanggan);

        $pemetaanPelanggan->update([
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pemeliharaan-pelanggan.index')->with('status', 'Berhasil menambahkan!');
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
        $pemeliharaanPelanggan = DB::table('pemeliharaan_pelanggans')
        ->leftJoin('pemetaan_pelanggans', 'pemeliharaan_pelanggans.id_petapelanggan', '=', 'pemetaan_pelanggans.id')
        ->leftJoin('pelanggans', 'pemetaan_pelanggans.id_pelanggan', '=', 'pelanggans.id')
        ->leftJoin('penggunas', 'pemeliharaan_pelanggans.id_pengguna', '=', 'penggunas.id')
        ->select('pemeliharaan_pelanggans.*', 'pelanggans.nama', 'pemeliharaan_pelanggans.created_at as tanggal_pemetaan', 'penggunas.nama as teknisi')
        ->where('pemeliharaan_pelanggans.id', $id)
        ->first();

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        return view('pages.pemeliharaan.pelanggan.edit', compact('pemeliharaanPelanggan', 'pengguna'));
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
        $pemeliharaanPelanggan = PemeliharaanPelanggan::findOrFail($id);

        $this->validate($request, [
            'keterangan' => ['required'],
            'id_pengguna' => ['required']
        ]);

        $pemeliharaanPelanggan->update([
            'id_petapelanggan'  => $pemeliharaanPelanggan->id_petapelanggan,
            'keterangan' => $request->keterangan,
            'catatan' => $request->catatan,
            'id_pengguna' => $request->id_pengguna,
            'created_at' => $request->created_at
        ]);

        // Update status di pemetaan pelanggan
        $pemetaanPelanggan = PemetaanPelanggan::findOrFail($pemeliharaanPelanggan->id_petapelanggan);

        $pemetaanPelanggan->update([
            'keterangan' => $request->keterangan,
        ]);  

        return redirect()->route('pemeliharaan-pelanggan.index')->with('status', 'Berhasil mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemeliharaanPelanggan = PemeliharaanPelanggan::findOrFail($id);
        $pemeliharaanPelanggan->delete();
        
        return redirect()->route('pemeliharaan-pelanggan.index')->with('status', 'Berhasil menghapus!');
    }

    public function detail($id) {
        $pemeliharaanPelanggan = DB::table('pemeliharaan_pelanggans')
        ->leftJoin('pemetaan_pelanggans', 'pemeliharaan_pelanggans.id_petapelanggan', '=', 'pemetaan_pelanggans.id')
        ->leftJoin('pelanggans', 'pemetaan_pelanggans.id_pelanggan', '=', 'pelanggans.id')
        ->leftJoin('penggunas', 'pemeliharaan_pelanggans.id_pengguna', '=', 'penggunas.id')
        ->select('pemeliharaan_pelanggans.*', 'pelanggans.nama', 'penggunas.nama as teknisi')
        ->where('pemeliharaan_pelanggans.id_petapelanggan', $id)
        ->get();

        $pelanggan = Map::PemetaanPelanggan()->where('pemetaan_pelanggans.id', $id)
        ->first();

        return view('pages.pemeliharaan.pelanggan.detail', compact('pemeliharaanPelanggan', 'pelanggan'));
    }

    public function exportPDF(Request $request) {
        $tglAwal = $request->tgl_awal;
        $tglAkhir = $request->tgl_akhir;

        $pemeliharaanPelanggan = DB::table('pemeliharaan_pelanggans')
        ->leftJoin('pemetaan_pelanggans', 'pemeliharaan_pelanggans.id_petapelanggan', '=', 'pemetaan_pelanggans.id')
        ->leftJoin('pelanggans', 'pemetaan_pelanggans.id_pelanggan', '=', 'pelanggans.id')
        ->leftJoin('penggunas', 'pemeliharaan_pelanggans.id_pengguna', '=', 'penggunas.id')
        ->select('pemeliharaan_pelanggans.*', 'pelanggans.nama', 'pemeliharaan_pelanggans.created_at as tanggal_pemetaan', 'penggunas.nama as teknisi')
        ->whereBetween('pemeliharaan_pelanggans.created_at', [$tglAwal, $tglAkhir])
        ->get();

        $pimpinan = \App\Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemeliharaan.pelanggan.print', compact('pemeliharaanPelanggan', 'pimpinan'));
    }
}
