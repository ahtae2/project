<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use DB;

use App\Mail\VerifikasiEmail;
use Illuminate\Support\Facades\Mail;

class VerifikasiPendaftaranController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pengguna = DB::table('penggunas')->where('verifikasi', '=', 0)->get();

        return view('pages.verifikasi.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengguna = DB::table('penggunas')->where('penggunas.id', '=', $id)->first();

        return view('pages.verifikasi.detail', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        echo $request->kontak;

        $pengguna = Pengguna::findOrFail($id);

        $pengguna->update([
            'verifikasi' => 1
        ]);
        
        // Kirim Email
        // Mail::to("ray.yustian@gmail.com")->send(new VerifikasiEmail($pengguna));

        return redirect()->route('verifikasi-pendaftaran.index')->with('status', 'Berhasil Memverifikasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pengguna = Pengguna::findOrFail($id);

        $pengguna->delete();
        return redirect()->route('verifikasi-pendaftaran.index')->with('status', 'Berhasil menghapus!');
    }
}
