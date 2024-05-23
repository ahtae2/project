<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\PemetaanPerangkat;
use App\Perangkat;
use App\Pemeliharaan;
use App\Map;
use App\Pengguna;
use DB;
use Image;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemetaanPerangkat = DB::select(DB::raw("Select `pemetaan_perangkats`.`id` AS `id_petaodp`, `pemetaan_perangkats`.`created_at` AS `tanggal_pemetaan`, `pemetaan_perangkats`.nama AS `nama_pemetaan`, `pemeliharaans`.`created_at` as `tanggal_pemeliharaan` from `pemetaan_perangkats` left join `pemeliharaans` on `pemetaan_perangkats`.`id` = `pemeliharaans`.`id_petaodp` WHERE `pemeliharaans`.`created_at` IS NULL group by `id_odp` UNION SELECT `d`.`id_petaodp`, `pemetaan_perangkats`.`created_at` AS `tanggal_pemetaan`, `pemetaan_perangkats`.nama AS `nama_pemetaan`, `d`.`created_at` AS `tanggal_pemeliharaan` FROM (select pemeliharaans.* FROM pemeliharaans JOIN (select id_petaodp, Max(created_at) AS Mx FROM pemeliharaans GROUP BY id_petaodp) Mx ON pemeliharaans.id_petaodp=Mx.id_petaodp AND pemeliharaans.created_at=Mx.Mx) d LEFT JOIN `pemetaan_perangkats` ON `pemetaan_perangkats`.`id` = `d`.`id_petaodp` ORDER BY id_petaodp"));

        $pemeliharaan = DB::table('pemeliharaans')
            ->leftJoin('pemetaan_perangkats', 'pemeliharaans.id_petaodp', '=', 'pemetaan_perangkats.id')
            ->leftJoin('penggunas', 'pemeliharaans.id_pengguna', '=', 'penggunas.id')
            ->select('pemeliharaans.*', 'pemetaan_perangkats.nama', 'pemetaan_perangkats.created_at as tanggal_pemetaan', 'penggunas.nama as teknisi')
            ->get();

        return view('pages.pemeliharaan.perangkat.index', compact('pemetaanPerangkat', 'pemeliharaan'));
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

        $pemetaanPerangkat = PemetaanPerangkat::get();

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        return view('pages.pemeliharaan.perangkat.create', compact('pemetaanPerangkat', 'pengguna'));
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
            'id_petaodp' => ['required'],
            'foto' => 'required|mimes:jpeg,png,jpg|max:8000',
            'keterangan' => ['required'],
            'id_pengguna' => ['required']
        ]);

        // Menyimpan data file yang diupload ke variabel $file
        $foto = $request->file('foto');

        $filename = time() . '.' . $foto->extension();

        // Isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';

        // Upload file
        $foto->move($tujuan_upload, $filename);

        Pemeliharaan::create([
            'id_petaodp'  => $request->id_petaodp,
            'foto' => $filename,
            'keterangan' => $request->keterangan,
            'catatan' => $request->catatan,
            'id_pengguna' => $request->id_pengguna,
            'created_at' => $request->created_at
        ]);


        // Update status di pemetaan perangkat
        $pemetaanPerangkat = pemetaanPerangkat::findOrFail($request->id_petaodp);

        $pemetaanPerangkat->update([
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pemeliharaan.index')->with('status', 'Berhasil menambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemeliharaan = DB::table('pemeliharaans')
            ->leftJoin('pemetaan_perangkats', 'pemeliharaans.id_petaodp', '=', 'pemetaan_perangkats.id')
            ->leftJoin('penggunas', 'pemeliharaans.id_pengguna', '=', 'penggunas.id')
            ->select('pemeliharaans.*', 'pemetaan_perangkats.nama', 'penggunas.nama as teknisi')
            ->where('pemeliharaans.id_petaodp', $id)
            ->get();

        $perangkat = Map::PemetaanODP()->where('pemetaan_perangkats.id', $id)
            ->first();

        return view('pages.pemeliharaan.perangkat.detail', compact('pemeliharaan', 'perangkat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemeliharaan = DB::table('pemeliharaans')
            ->leftJoin('pemetaan_perangkats', 'pemeliharaans.id_petaodp', '=', 'pemetaan_perangkats.id')
            ->leftJoin('penggunas', 'pemeliharaans.id_pengguna', '=', 'penggunas.id')
            ->select('pemeliharaans.*', 'pemetaan_perangkats.nama', 'penggunas.nama as teknisi')
            ->where('pemeliharaans.id', $id)
            ->first();

        $pengguna = DB::table('penggunas')->where('role', '=', 'teknisi')->get();
        $pengguna = json_decode($pengguna, true);

        return view('pages.pemeliharaan.perangkat.edit', compact('pemeliharaan', 'pengguna'));
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
        $pemeliharaan = pemeliharaan::findOrFail($id);

        $this->validate($request, [
            'keterangan' => ['required'],
            'id_pengguna' => ['required']
        ]);

        if ($request->file('foto')) {
            // Menyimpan data file yang diupload ke variabel $file
            $foto = $request->file('foto');

            $filename = time() . '.' . $foto->extension();

            // Isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';

            // Upload file
            $img = Image::make($foto->path());
            $img->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($tujuan_upload . '/' . $filename);
            // $foto->move($tujuan_upload, $filename);
        } else {
            $foto = $pemeliharaan->foto;
            $filename = $foto;
        }

        $pemeliharaan->update([
            'id_petaodp'  => $pemeliharaan->id_petaodp,
            'foto' => $filename,
            'keterangan' => $request->keterangan,
            'catatan' => $request->catatan,
            'id_pengguna' => $request->id_pengguna,
            'created_at' => $request->created_at
        ]);

        // Update status di pemetaan perangkat
        $pemetaanPerangkat = pemetaanPerangkat::findOrFail($pemeliharaan->id_petaodp);

        $pemetaanPerangkat->update([
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pemeliharaan.index')->with('status', 'Berhasil mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemeliharaan = Pemeliharaan::findOrFail($id);
        $pemeliharaan->delete();

        $image_path = public_path() . "/data_file/" . $pengguna->foto;  // Value is not URL but directory file path

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        return redirect()->route('pemeliharaan.index')->with('status', 'Berhasil menghapus!');
    }

    public function printJadwal()
    {
        $pemetaanPerangkat = DB::select(DB::raw("Select `pemetaan_perangkats`.`id` AS `id_petaodp`, `pemetaan_perangkats`.`created_at` AS `tanggal_pemetaan`, `pemetaan_perangkats`.nama AS `nama_pemetaan`, `pemeliharaans`.`created_at` as `tanggal_pemeliharaan` from `pemetaan_perangkats` left join `pemeliharaans` on `pemetaan_perangkats`.`id` = `pemeliharaans`.`id_petaodp` WHERE `pemeliharaans`.`created_at` IS NULL group by `id_odp` UNION SELECT `d`.`id_petaodp`, `pemetaan_perangkats`.`created_at` AS `tanggal_pemetaan`, `pemetaan_perangkats`.nama AS `nama_pemetaan`, `d`.`created_at` AS `tanggal_pemeliharaan` FROM (select pemeliharaans.* FROM pemeliharaans JOIN (select id_petaodp, Max(created_at) AS Mx FROM pemeliharaans GROUP BY id_petaodp) Mx ON pemeliharaans.id_petaodp=Mx.id_petaodp AND pemeliharaans.created_at=Mx.Mx) d LEFT JOIN `pemetaan_perangkats` ON `pemetaan_perangkats`.`id` = `d`.`id_petaodp` ORDER BY id_petaodp"));

        return view('pages.pemeliharaan.perangkat.printjadwal', compact('pemetaanPerangkat'));
    }

    public function exportPDF(Request $request)
    {
        $tglAwal = $request->tgl_awal;
        $tglAkhir = $request->tgl_akhir;

        $pemeliharaan = DB::table('pemeliharaans')
            ->leftJoin('pemetaan_perangkats', 'pemeliharaans.id_petaodp', '=', 'pemetaan_perangkats.id')
            ->leftJoin('penggunas', 'pemeliharaans.id_pengguna', '=', 'penggunas.id')
            ->select('pemeliharaans.*', 'pemetaan_perangkats.nama', 'pemetaan_perangkats.created_at as tanggal_pemetaan', 'penggunas.nama as teknisi')
            ->whereBetween('pemeliharaans.created_at', [$tglAwal, $tglAkhir])
            ->get();

        $pimpinan = \App\Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemeliharaan.perangkat.print', compact('pemeliharaan', 'pimpinan'));
    }

    public function printdetail($id)
    {
        $pemeliharaan = DB::table('pemeliharaans')
            ->leftJoin('pemetaan_perangkats', 'pemeliharaans.id_petaodp', '=', 'pemetaan_perangkats.id')
            ->leftJoin('penggunas', 'pemeliharaans.id_pengguna', '=', 'penggunas.id')
            ->select('pemeliharaans.*', 'pemetaan_perangkats.nama', 'penggunas.nama as teknisi')
            ->where('pemeliharaans.id_petaodp', $id)
            ->get();

        $perangkat = Map::PemetaanODP()->where('pemetaan_perangkats.id', $id)
            ->first();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pemeliharaan.perangkat.printdetail', compact('pemeliharaan', 'perangkat', 'pimpinan'));
    }

    public function exportExcel(Request $request)
    {
        // return Excel::download(new PenggunaExport($request->tgl_awal, $request->tgl_akhir), 'pengguna.xlsx');
    }
}
