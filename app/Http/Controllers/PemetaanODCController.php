<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Map;
use App\OpticalDistributionCabinet;
use App\PemetaanOpticalDistributionCabinet;
use App\Pengguna;
use App\Wilayah;

use DB;
use Image;

class PemetaanODCController extends Controller
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

        // var_dump(PemetaanOpticalDistributionCabinet::find(1)->opticaldistributioncabinets()->get());

        return view('pages.pemetaan.odc.index', compact('pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan'));
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

        foreach ($pemetaanODC as $value) {
            $data[] = $value->nama_odc;
        }

        $perangkat = OpticalDistributionCabinet::select('id', 'nama')->whereNotIn('nama', $data)->get();

        $kecamatan = DB::table('indonesia_districts')->get();
        $kecamatan = json_decode($kecamatan, true);

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        return view('pages.pemetaan.odc.create', compact('provinces', 'pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'perangkat', 'pengguna', 'kecamatan'));
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
            'nama' => ['required'],
            // 'id_provinsi'	=> ['required'],
            // 'id_kota'	=> ['required'],
            // // 'id_kecamatan'	=> ['required'],
            'alamat' => ['required', 'min:5'],
            'latitude'	=> ['required'],
            'longitude'	=> ['required'],
            'foto' => 'required|mimes:jpeg,png,jpg,jpg|max:8000',
            'id_odc'  => ['required'],
        ]);

        // Menyimpan data file yang diupload ke variabel $file
        $foto = $request->file('foto');

        $filename = time().'.'.$foto->extension();

        // Isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';

        // Upload file
        $img = Image::make($foto->path());
        $img->resize(800, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($tujuan_upload.'/'.$filename);
        // $foto->move($tujuan_upload, $filename);

        // mengambil data barang dengan kode paling besar
        $pemetaanODC = Map::PemetaanODC()->get();
        $pemetaanODCCount = $pemetaanODC->count();

        PemetaanOpticalDistributionCabinet::create([
            // 'id' => 'PTX' . time() . sprintf("%03s", $pemetaanODCCount),
            'nama' => $request->nama,
            'id_provinsi' => $request->province,
            'id_kota' => $request->city,
            'id_kecamatan' => $request->district,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude'  => $request->longitude,
            'keterangan' => $request->keterangan,
            'foto' => $filename,
            'id_odc'  => $request->id_odc,
            'id_pengguna' => $request->id_pengguna,
        ]);

        // $request->create($request->all());

        return redirect()->route('pemetaan-odc.index')->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $odc = Map::PemetaanODC()->where('pemetaan_optical_distribution_cabinets.id', $id)->first();

        $pemetaanPerangkat = Map::PemetaanODP()->where('pemetaan_perangkats.id_petaodc', $id)
        ->get();

        return view('pages.pemetaan.odc.detail', compact('odc', 'pemetaanPerangkat'));
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

        $perangkat = Map::PemetaanODC()->where('pemetaan_optical_distribution_cabinets.id', $id)
        ->first();

        $kecamatan = DB::table('indonesia_districts')->get();
        $kecamatan = json_decode($kecamatan, true);

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        return view('pages.pemetaan.odc.edit', compact('provinces', 'pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'perangkat', 'pengguna', 'kecamatan'));
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
        $pemetaanODC = PemetaanOpticalDistributionCabinet::findOrFail($id);

        if($request->file('foto')) {
            // Menyimpan data file yang diupload ke variabel $file
            $foto = $request->file('foto');

            $filename = time().'.'.$foto->extension();

            // Isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';

            // Upload file
            $img = Image::make($foto->path());
            $img->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($tujuan_upload.'/'.$filename);
            // $foto->move($tujuan_upload, $filename);
        } else {
            $foto = $pemetaanODC->foto;
            $filename = $foto;
        }

        $this->validate($request, [
            'nama' => ['required'],
            // // 'id_kecamatan'	=> ['required'],
            'alamat' => ['required', 'min:5'],
            'latitude'	=> ['required'],
            'longitude'	=> ['required'],
        ]);

        $pemetaanODC->update([
            'nama' => $request->nama,
            'id_provinsi' => $request->province,
            'id_kota' => $request->city,
            'id_kecamatan' => $request->district,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude'  => $request->longitude,
            'keterangan' => $request->keterangan,
            'foto' => $filename,
            'id_odc'  => $pemetaanODC->id_odc,
            'id_pengguna' => $request->id_pengguna,
        ]);

        // $request->create($request->all());

        return redirect()->route('pemetaan-odc.index')->with('status', 'Berhasil mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemetaanODC = PemetaanOpticalDistributionCabinet::findOrFail($id);

        $image_path = public_path()."/data_file/" . $pemetaanODC->foto;  // Value is not URL but directory file path
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $pemetaanODC->delete();
        return redirect()->route('pemetaan-odc.index')->with('status', 'Berhasil menghapus!');
    }

    public function exportPDF(Request $request) {
        $pemetaanODC = Map::PemetaanODC()->whereBetween('pemetaan_optical_distribution_cabinets.created_at', [$request->tgl_awal, $request->tgl_akhir])->get();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemetaan.odc.print', compact('pemetaanODC', 'pimpinan'));
    }
    
    public function printdetail($id)
    {
        $pemetaanODC = Map::PemetaanODC()->where('pemetaan_optical_distribution_cabinets.id', $id)->first();

        $pemetaanPerangkat = Map::PemetaanODP()->where('pemetaan_perangkats.id_petaodc', $id)
        ->get();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemetaan.odc.printdetail', compact('pemetaanODC', 'pemetaanPerangkat', 'pimpinan'));
    }
}
