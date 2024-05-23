<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Map;
use App\Perangkat;
use App\PemetaanPerangkat;
use DB;
use Image;
use App\Pengguna;

class PemetaanODPController extends Controller
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

        return view('pages.pemetaan.odp.index', compact('pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan'));
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

        foreach ($pemetaanPerangkat as $value) {
            $data[] = $value->nama_odp;
        }

        $perangkat = Perangkat::select('id', 'nama')->whereNotIn('nama', $data)->get();

        $kecamatan = DB::table('indonesia_districts')->get();
        $kecamatan = json_decode($kecamatan, true);

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        $pemetaanODC = json_decode($pemetaanODC, true);

        return view('pages.pemetaan.odp.create', compact('provinces', 'kecamatan', 'pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'perangkat', 'pengguna'));
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
            'nama'	=> ['required'],
            // 'id_kecamatan'	=> ['required'],
            'alamat' => ['required', 'min:5'],
            'latitude'	=> ['required'],
            'longitude'	=> ['required'],
            'foto' => 'required|mimes:jpeg,png,jpg|max:8000',
            'port' => ['required'],
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

        PemetaanPerangkat::create([
            'nama' => $request->nama,
            'id_provinsi' => $request->province,
            'id_kota' => $request->city,
            'id_kecamatan' => $request->district,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude'  => $request->longitude,
            'keterangan' => $request->keterangan,
            'id_odp'  => $request->id_odp,
            'id_pengguna' => $request->id_pengguna,
            'id_petaodc' => $request->id_petaodc,
            'foto' => $filename,
            'port' => $request->port
        ]);

        // $request->create($request->all());

        return redirect()->route('pemetaan-odp.index')->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perangkat = Map::PemetaanODP()->where('pemetaan_perangkats.id', $id)
        ->first();
        
        $pemetaanPelanggan = Map::PemetaanPelanggan()->where('pemetaan_pelanggans.id_petaodp', $id)
        ->get();

        return view('pages.pemetaan.odp.detail', compact('perangkat', 'pemetaanPelanggan'));
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

        $perangkat = Map::PemetaanODP()->where('pemetaan_perangkats.id', $id)
        ->first();

        $kecamatan = DB::table('indonesia_districts')->get();
        $kecamatan = json_decode($kecamatan, true);

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        $pemetaanODC = json_decode($pemetaanODC, true);

        return view('pages.pemetaan.odp.edit', compact('provinces', 'kecamatan', 'pemetaanODC', 'pemetaanPerangkat', 'pemetaanPelanggan', 'perangkat', 'pengguna'));
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
        $pemetaanPerangkat = pemetaanPerangkat::findOrFail($id);

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
            $foto = $pemetaanPerangkat->foto;
            $filename = $foto;
        }

        $this->validate($request, [
            'nama'	=> ['required'],
            // 'id_kecamatan'	=> ['required'],
            'alamat' => ['required', 'min:5'],
            'latitude'	=> ['required'],
            'longitude'	=> ['required'],
            'port' => ['required'],
        ]);

        $pemetaanPerangkat->update([
            'nama' => $request->nama,
            'id_provinsi' => $request->province,
            'id_kota' => $request->city,
            'id_kecamatan' => $request->district,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude'  => $request->longitude,
            'keterangan' => $request->keterangan,
            'id_pengguna' => $request->id_pengguna,
            'id_petaodc' => $request->id_petaodc,
            'foto' => $filename,
            'port' => $request->port
        ]);

        // $request->create($request->all());

        return redirect()->route('pemetaan-odp.index')->with('status', 'Berhasil mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perangkat = PemetaanPerangkat::findOrFail($id);

        $image_path = public_path()."/data_file/" . $perangkat->foto;  // Value is not URL but directory file path
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $perangkat->delete();
        return redirect()->route('pemetaan-odp.index')->with('status', 'Berhasil menghapus!');
    }

    public function port(Request $request) {
        // $port = Map::PemetaanODP()->where('pemetaan_perangkats.id', $request->get('id'))
        // ->pluck('core', 'id');

        $portPelanggan = Map::PemetaanODP()->where('pemetaan_perangkats.id_petaodc', $request->get('id'))->pluck('port')->toArray();

        $corePerangkat = Map::PemetaanODC()->where('pemetaan_optical_distribution_cabinets.id', $request->get('id'))->get();

        foreach($corePerangkat as $value) {
            $corePerangkat = $value->core;
        }

        $corePerangkat = range(1, $corePerangkat);

        $portTersedia = array_diff($corePerangkat, $portPelanggan);

        return response()->json($portTersedia);
    }

    public function exportPDF(Request $request) {
        $pemetaanODP = Map::PemetaanODP()->whereBetween('pemetaan_optical_distribution_cabinets.created_at', [$request->tgl_awal, $request->tgl_akhir])->get();

        $pimpinan = \App\Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemetaan.odp.print', compact('pemetaanODP', 'pimpinan'));
    }

    public function printdetail($id)
    {
        $pemetaanODP = Map::PemetaanODP()->where('pemetaan_perangkats.id', $id)->first();

        $pemetaanPelanggan = Map::PemetaanPelanggan()->where('pemetaan_pelanggans.id_petaodp', $id)
        ->get();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemetaan.odp.printdetail', compact('pemetaanODP', 'pemetaanPelanggan', 'pimpinan'));
    }
}
