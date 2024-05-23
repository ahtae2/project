<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Map extends Model
{
    public function scopePemetaanODC() {
        return DB::table('pemetaan_optical_distribution_cabinets')
        ->leftJoin('indonesia_provinces', 'pemetaan_optical_distribution_cabinets.id_provinsi', '=', 'indonesia_provinces.id')
        ->leftJoin('indonesia_cities', 'pemetaan_optical_distribution_cabinets.id_kota', '=', 'indonesia_cities.id')
        ->leftJoin('indonesia_districts', 'pemetaan_optical_distribution_cabinets.id_kecamatan', '=', 'indonesia_districts.id')
        ->leftJoin('optical_distribution_cabinets', 'pemetaan_optical_distribution_cabinets.id_odc', '=', 'optical_distribution_cabinets.id')
        ->leftJoin('penggunas', 'pemetaan_optical_distribution_cabinets.id_pengguna', '=', 'penggunas.id')
        ->select('pemetaan_optical_distribution_cabinets.*', 'indonesia_provinces.name as nama_provinsi', 'indonesia_cities.name as nama_kota', 'indonesia_districts.name as nama_kecamatan', 'optical_distribution_cabinets.nama as nama_odc', 'optical_distribution_cabinets.core', 'penggunas.nama as teknisi');
    }

    public function scopePemetaanODP() {
        return DB::table('pemetaan_perangkats')
        ->leftJoin('indonesia_provinces', 'pemetaan_perangkats.id_provinsi', '=', 'indonesia_provinces.id')
        ->leftJoin('indonesia_cities', 'pemetaan_perangkats.id_kota', '=', 'indonesia_cities.id')
        ->leftJoin('indonesia_districts', 'pemetaan_perangkats.id_kecamatan', '=', 'indonesia_districts.id')
        ->leftJoin('perangkats', 'pemetaan_perangkats.id_odp', '=', 'perangkats.id')
        ->leftJoin('penggunas', 'pemetaan_perangkats.id_pengguna', '=', 'penggunas.id')
        ->leftJoin('pemetaan_optical_distribution_cabinets', 'pemetaan_perangkats.id_petaodc', '=', 'pemetaan_optical_distribution_cabinets.id')
        ->select('pemetaan_perangkats.*', 'indonesia_provinces.name as nama_provinsi', 'indonesia_cities.name as nama_kota', 'indonesia_districts.name as nama_kecamatan', 'pemetaan_optical_distribution_cabinets.nama as nama_odc', 'perangkats.nama as nama_odp', 'perangkats.core', 'penggunas.nama as teknisi');
    }

    public function scopePemetaanPelanggan() {
        return DB::table('pemetaan_pelanggans')
        ->leftJoin('indonesia_provinces', 'pemetaan_pelanggans.id_provinsi', '=', 'indonesia_provinces.id')
        ->leftJoin('indonesia_cities', 'pemetaan_pelanggans.id_kota', '=', 'indonesia_cities.id')
        ->leftJoin('indonesia_districts', 'pemetaan_pelanggans.id_kecamatan', '=', 'indonesia_districts.id')
        ->leftJoin('pelanggans', 'pemetaan_pelanggans.id_pelanggan', '=', 'pelanggans.id')
        ->leftJoin('pemetaan_perangkats', 'pemetaan_pelanggans.id_petaodp', '=', 'pemetaan_perangkats.id')
        ->leftJoin('penggunas', 'pemetaan_pelanggans.id_pengguna', '=', 'penggunas.id')
        ->leftJoin('perangkats', 'pemetaan_perangkats.id_odp', '=', 'perangkats.id')
        ->select('pemetaan_pelanggans.*', 'indonesia_provinces.name as nama_provinsi', 'indonesia_cities.name as nama_kota', 'indonesia_districts.name as nama_kecamatan', 'pelanggans.nama', 'pelanggans.kontak', 'pemetaan_perangkats.nama as nama_petaodp', 'perangkats.nama as nama_odp', 'penggunas.nama as teknisi');
    }
}
