<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OpticalDistributionCabinet;
use App\Pengguna;

class OpticalDistributionCabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perangkat = OpticalDistributionCabinet::all();
        // $perangkat = DB::table('perangkats')
        // ->leftJoin('penggunas', 'perangkats.id_pengguna', '=', 'penggunas.id')
        // ->select('perangkats.*', 'penggunas.nama as teknisi')
        // ->get();

        return view('pages.perangkat.odc.index', ['perangkat'=>$perangkat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.perangkat.odc.create');
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
            'model' => ['required', 'min:3'],
            'core' => ['required'],
        ]);

        OpticalDistributionCabinet::create([
            'nama'  => $request->nama,
            'model' => $request->model,
            'core' => $request->core,
        ]);

        // $request->create($request->all());

        return redirect()->route('perangkat-odc.index')->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perangkat = OpticalDistributionCabinet::findOrFail($id);

        return view('pages.perangkat.odc.detail', compact('perangkat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perangkat = OpticalDistributionCabinet::findOrFail($id);

        return view('pages.perangkat.odc.edit', compact('perangkat'));
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
        $perangkat = OpticalDistributionCabinet::findOrFail($id);

        $this->validate($request, [
            'nama' => ['required', 'min:3'],
            'model' => ['required', 'min:3'],
            'core' => ['required'],
        ]);

        $perangkat->update([
            'nama'  => $request->nama,
            'model' => $request->model,
            'core' => $request->core,
        ]);

        return redirect()->route('perangkat-odc.index')->with('status', 'Berhasil Mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perangkat = OpticalDistributionCabinet::findOrFail($id);

        $perangkat->delete();
        return redirect()->route('perangkat-odc.index')->with('status', 'Berhasil menghapus!');
    }

    public function exportPDF(Request $request) {
        $odc = OpticalDistributionCabinet::whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])->get();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.perangkat.odc.print', compact('odc', 'pimpinan'));
    }

    public function exportExcel(Request $request) {
        // return Excel::download(new PenggunaExport($request->tgl_awal, $request->tgl_akhir), 'pengguna.xlsx');
    }
}
