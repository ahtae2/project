<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/fibermap', 'AdminController@fibermap');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/pelanggan/daftar/subscription/{name}', 'PelangganController@storeRegistrasiPelanggan')->name('pelanggan.daftar.subscription');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/pengguna/print', 'PenggunaController@print')->name('pengguna.print');
    Route::get('/pengguna/printdetail/{id}', 'PenggunaController@printdetail')->name('pengguna.printdetail');
    Route::get('/pengguna/exportpdf', 'PenggunaController@exportPDF')->name('pengguna.exportpdf');
    Route::resource('/pengguna', 'PenggunaController');

    Route::get('/pelanggan/verifikasi', 'PelangganController@verifikasiPelangganIndex')->name('pelanggan.verifikasi.index');
    Route::match(['get', 'post'], '/pelanggan/verifikasi/verified/{id}', 'PelangganController@verifikasiPelangganVerified')->name('pelanggan.verifikasi.verified');
    Route::post('/pelanggan/import', 'PelangganController@import')->name('pelanggan.import');
    Route::get('/pelanggan/exportpdf', 'PelangganController@exportPDF')->name('pelanggan.exportpdf');
    Route::post('/pelanggan/daftar', 'PelangganController@storeRegistrasiPelanggan')->name('pelanggan.daftar');
    Route::resource('/pelanggan', 'PelangganController');

    Route::resource('/verifikasi-pendaftaran', 'VerifikasiPendaftaranController');

    Route::get('/setting', 'SettingController@index');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,teknisi']], function () {
    Route::get('/perangkat-odp/exportpdf', 'OpticalDistributionPointController@exportPDF')->name('perangkat-odp.exportpdf');
    Route::resource('/perangkat-odp', 'OpticalDistributionPointController');

    Route::get('/perangkat-odc/exportpdf', 'OpticalDistributionCabinetController@exportPDF')->name('perangkat-odc.exportpdf');
    Route::resource('/perangkat-odc', 'OpticalDistributionCabinetController');

    Route::get('/pemetaan-odc/exportpdf', 'PemetaanODCController@exportPDF')->name('pemetaan-odc.exportpdf');
    Route::get('/pemetaan-odc/printdetail/{id}', 'PemetaanODCController@printdetail')->name('pemetaan-odc.printdetail');
    Route::resource('/pemetaan-odc', 'PemetaanODCController');

    Route::post('/pemetaan-odp/port', 'PemetaanODPController@port')->name('pemetaan-odp.port');
    Route::get('/pemetaan-odp/exportpdf', 'PemetaanODPController@exportPDF')->name('pemetaan-odp.exportpdf');
    Route::get('/pemetaan-odp/printdetail/{id}', 'PemetaanODPController@printdetail')->name('pemetaan-odp.printdetail');
    Route::resource('/pemetaan-odp', 'PemetaanODPController');

    Route::post('/pemetaan-pelanggan/port', 'PemetaanPelangganController@port')->name('pemetaan-pelanggan.port');
    Route::get('/pemetaan-pelanggan/exportpdf', 'PemetaanPelangganController@exportPDF')->name('pemetaan-pelanggan.exportpdf');
    Route::get('/pemetaan-pelanggan/printdetail/{id}', 'PemetaanPelangganController@printdetail')->name('pemetaan-pelanggan.printdetail');
    Route::resource('/pemetaan-pelanggan', 'PemetaanPelangganController');

    Route::get('/pemeliharaan/printjadwal/', 'PemeliharaanController@printJadwal')->name('pemeliharaan.printjadwal');
    Route::get('/pemeliharaan/exportpdf/', 'PemeliharaanController@exportPDF')->name('pemeliharaan.exportpdf');
    Route::get('/pemeliharaan/printdetail/{id}', 'PemeliharaanController@printdetail')->name('pemeliharaan.printdetail');
    Route::resource('/pemeliharaan', 'PemeliharaanController');

    Route::get('/pemeliharaan-pelanggan/detail/{id}', 'PemeliharaanPelangganController@detail')->name('pemeliharaan-pelanggan.detail');
    Route::get('/pemeliharaan-pelanggan/exportpdf/', 'PemeliharaanPelangganController@exportPDF')->name('pemeliharaan-pelanggan.exportpdf');
    Route::resource('/pemeliharaan-pelanggan', 'PemeliharaanPelangganController');

    Route::post('/wilayah/getDistrict', 'WilayahController@getDistrict')->name('wilayah.getDistrict');
    Route::post('/wilayah/getCity', 'WilayahController@getCity')->name('wilayah.getCity');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,sales']], function () {
    Route::resource('/pelanggan', 'PelangganController');
    Route::get('/pengadaan/exportpdf/', 'PengadaanController@exportPDF')->name('pengadaan.exportpdf');
    Route::resource('/pengadaan', 'PengadaanController');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,pimpinan']], function () {
    Route::resource('/laporan', 'LaporanController');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,teknisi,sales,pimpinan']], function () {
    Route::get('dashboard', 'AdminController@index');
    Route::get('/map2', 'MapController@index');
    Route::post('/map2', 'MapController@index')->name('map.index');
    Route::get('/map', 'AdminController@map');
});
