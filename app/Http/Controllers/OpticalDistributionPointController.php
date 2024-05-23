<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perangkat;
use App\Pengguna;
use App\OpticalDistributionCabinet;
use DB;

class OpticalDistributionPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $perangkat = Perangkat::all();

        return view('pages.perangkat.odp.index', ['perangkat'=>$perangkat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $perangkat = Perangkat::all();

        $odc = OpticalDistributionCabinet::all();

        return view('pages.perangkat.odp.create', compact('perangkat', 'odc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'nama' => ['required', 'min:3'],
            'model' => ['required', 'min:3'],
            'core' => ['required'],
        ]);

        Perangkat::create([
            'nama'  => $request->nama,
            'model' => $request->model,
            'core'  => $request->core
        ]);

        // $request->create($request->all());

        return redirect()->route('perangkat-odp.index')->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perangkat = Perangkat::findOrFail($id);

        return view('pages.perangkat.odp.detail', compact('perangkat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $perangkat = Perangkat::findOrFail($id);

        $odc = OpticalDistributionCabinet::all();

        return view('pages.perangkat.odp.edit', compact('perangkat', 'odc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $perangkat = Perangkat::findOrFail($id); 

        $this->validate($request, [
            'nama' => ['required', 'min:3'],
            'model' => ['required', 'min:3'],
            'core' => ['required'],
        ]);

        $perangkat->update([
            'nama'  => $request->nama,
            'model' => $request->model,
            'core'  => $request->core,
        ]);
      
        return redirect()->route('perangkat-odp.index')->with('status', 'Berhasil Mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $perangkat = Perangkat::findOrFail($id);

        $perangkat->delete();
        return redirect()->route('perangkat-odp.index')->with('status', 'Berhasil menghapus!');
    }

    public function exportPDF(Request $request) {
        $odp = Perangkat::whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])->get();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.perangkat.odp.print', compact('odp', 'pimpinan'));
    }

    public function exportExcel(Request $request) {
        // return Excel::download(new PenggunaExport($request->tgl_awal, $request->tgl_akhir), 'pengguna.xlsx');
    }
}
