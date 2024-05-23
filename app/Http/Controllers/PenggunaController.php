<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Pengguna;
use App\Exports\PenggunaExport;

use PDF;
use Maatwebsite\Excel\Facades\Excel;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pengguna = Pengguna::all();

        return view('pages.pengguna.index', compact('pengguna'));

        // return Pengguna::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.pengguna.create');
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
            'email' => ['required'],
            'password' => ['required', 'min:5'],
            'alamat' => ['required', 'min:5'],
            'kontak' => ['required', 'min:5'],
            'role' => ['required'],
            'foto' => 'required|mimes:jpeg,png,jpg|max:8000',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $foto = $request->file('foto');

        $filename = time().'.'.$foto->extension();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';

        // upload file
        $foto->move($tujuan_upload, $filename);

        Pengguna::create([
            'nama'  => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat'  => $request->alamat,
            'kontak'  => $request->kontak,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'identitas'  => $request->identitas,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'role' => $request->role,
            'verifikasi' => 1,
            'foto' => $filename,
        ]);
            
        // $request->create($request->all());

        return redirect()->route('pengguna.index')->with('status', 'Berhasil Menambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        return view('pages.pengguna.detail', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pengguna = Pengguna::findOrFail($id); 

        return view('pages.pengguna.edit', compact('pengguna'));
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
        $pengguna = Pengguna::findOrFail($id);

        $this->validate($request, [
            'nama' => ['required', 'min:3'],
            'email' => ['required'],
            'alamat' => ['required', 'min:5'],
            'kontak' => ['required', 'min:5'],
            'foto' => 'image|mimes:jpeg,png,jpg,jpg,gif,svg|max:2048',
            'role' => ['required']
        ]);

        if($request->file('foto')) {
            // menyimpan data file yang diupload ke variabel $file
            $foto = $request->file('foto');

            $filename = time().'.'.$foto->extension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';

            // upload file
            $foto->move($tujuan_upload, $filename);
        } else {
            $foto = $pengguna->foto;
            $filename = $foto;
        }

        $pengguna->update([
            'nama'  => $request->nama,
            'email' => $request->email,
            'password' => $request->password == "" ? $pengguna->password : bcrypt($request->password),
            'alamat'  => $request->alamat,
            'kontak'  => $request->kontak,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'identitas'  => $request->identitas,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'verifikasi' => 1,
            'role' => $request->role,
            'foto' => $foto,
        ]);
            
        // $pengguna->update($request->all());

        return redirect()->route('pengguna.index')->with('status', 'Berhasil Mengedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pengguna = Pengguna::findOrFail($id);

        $image_path = public_path()."/data_file/" . $pengguna->foto;  // Value is not URL but directory file path
        
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('status', 'Berhasil menghapus!');
    }

    public function printdetail($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        return view('pages.pengguna.printdetail', compact('pengguna'));
    }

    public function exportPDF(Request $request) {
        $pengguna = Pengguna::whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])->get();

        $pimpinan = Pengguna::where('role', 'pimpinan')->first();

        return view('pages.pengguna.print', compact('pengguna', 'pimpinan'));
    }

    public function exportExcel(Request $request) {
        return Excel::download(new PenggunaExport($request->tgl_awal, $request->tgl_akhir), 'pengguna.xlsx');
    }
}
