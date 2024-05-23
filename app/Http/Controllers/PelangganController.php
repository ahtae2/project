<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Imports\PelangganImport;
use App\Perangkat;
use DB;
use Excel;
use App\Pengguna;
use App\VerifikasiPelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pelanggan = Pelanggan::all();
        // $pelanggan = DB::table('pelanggans')
        //                 ->leftJoin('perangkats', 'pelanggans.id_odp', '=', 'perangkats.id')
        //                 ->select('pelanggans.*', 'perangkats.nama as perangkat')
        //                 ->get();

        return view('pages.pelanggan.index', ['pelanggan'=>$pelanggan]);
    }

    public function verifikasiPelangganIndex() {
        $pelanggan = VerifikasiPelanggan::with('paketLangganan')->get();

        return view('pages.verifikasi-langganan.index', ['pelanggan'=>$pelanggan]);
    }

    public function verifikasiPelangganVerified($id) {
        $verifikasiPelanggan = VerifikasiPelanggan::find($id);

        if (!$verifikasiPelanggan) {
            return redirect()->route('pelanggan.index')->with('error', 'Data tidak ditemukan!');
        }

        Pelanggan::create([
            'nama'  => $verifikasiPelanggan->nama,
            'alamat'  => $verifikasiPelanggan->alamat,
            'tanggal_lahir'  => $verifikasiPelanggan->tanggal_lahir,
            'kontak'  => $verifikasiPelanggan->kontak,
            'email'  => $verifikasiPelanggan->email,
            'identitas'  => $verifikasiPelanggan->identitas,
            'pekerjaan'  => $verifikasiPelanggan->pekerjaan,
            'jenis_kelamin'  => $verifikasiPelanggan->jenis_kelamin,
            'paket_id' => $verifikasiPelanggan->paket_id,
        ]);

        $verifikasiPelanggan->delete();
            
        return redirect()->route('pelanggan.index')->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $perangkat = Perangkat::all();

        return view('pages.pelanggan.create', compact('perangkat'));
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
            'nama' => ['required', 'min:3'],
            'alamat' => ['required', 'min:4'],
            'kontak' => ['required', 'min:5'],
        ]);

        Pelanggan::create([
            'nama'  => $request->nama,
            'alamat'  => $request->alamat,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'kontak'  => $request->kontak,
            'email'  => $request->email,
            'identitas'  => $request->identitas,
            'pekerjaan'  => $request->pekerjaan,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'paket_id' => $request->paket_id,
        ]);
            
        // $request->create($request->all());

        return redirect()->route('pelanggan.index')->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRegistrasiPelanggan(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required', 'min:3'],
            'alamat' => ['required', 'min:4'],
            'kontak' => ['required', 'min:5'],
        ]);

        VerifikasiPelanggan::create([
            'nama'  => $request->nama,
            'alamat'  => $request->alamat,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'kontak'  => $request->kontak,
            'email'  => $request->email,
            'identitas'  => $request->identitas,
            'pekerjaan'  => $request->pekerjaan,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'paket_id' => $request->paket_id,
        ]);
            
        return back()->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('pages.pelanggan.detail', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pelanggan = Pelanggan::findOrFail($id);

        $perangkat = Perangkat::all();

        return view('pages.pelanggan.edit', compact('perangkat', 'pelanggan'));
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
        $pelanggan = Pelanggan::findOrFail($id); 

        $this->validate($request, [
            'nama' => ['required', 'min:3'],
            'alamat' => ['required', 'min:4'],
            'kontak' => ['required', 'min:5'],
        ]);


        $pelanggan->update([
            'nama'  => $request->nama,
            'alamat'  => $request->alamat,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'kontak'  => $request->kontak,
            'email'  => $request->email,
            'identitas'  => $request->identitas,
            'pekerjaan'  => $request->pekerjaan,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'paket_id' => $request->paket_id,
        ]);

        return redirect()->route('pelanggan.index')->with('status', 'Berhasil Mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();
        
        return redirect()->route('pelanggan.index')->with('status', 'Berhasil menghapus!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $data = Excel::import(new PelangganImport, request()->file('file'));

            return redirect()->route('pelanggan.index')->with('status', 'Berhasil  mengimport!');
        }   
    }

    public function exportPDF(Request $request) {
        $pelanggan = Pelanggan::whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])->get();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pelanggan.print', compact('pelanggan', 'pimpinan'));
    }

    public function exportExcel(Request $request) {
        // return Excel::download(new PenggunaExport($request->tgl_awal, $request->tgl_akhir), 'pengguna.xlsx');
    }
}
