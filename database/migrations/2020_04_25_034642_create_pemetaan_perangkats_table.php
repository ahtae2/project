<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemetaanPerangkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemetaan_perangkats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('keterangan');
            $table->string('foto');
            $table->integer('port');
            $table->BigInteger('id_petaodc')->unsigned()->nullable();
            $table->foreign('id_petaodc')->references('id')->on('pemetaan_optical_distribution_cabinets')->onDelete('set null');
            $table->BigInteger('id_odp')->unsigned()->nullable();
            $table->foreign('id_odp')->references('id')->on('perangkats')->onDelete('set null');            
            $table->BigInteger('id_pengguna')->unsigned()->nullable();
            $table->foreign('id_pengguna')->references('id')->on('penggunas')->onDelete('set null');
            $table->timestamps();

            $table->char('id_provinsi')->nullable();
            $table->foreign('id_provinsi')->references('id')->on('indonesia_provinces')->onDelete('set null');
            $table->char('id_kota')->nullable();
            $table->foreign('id_kota')->references('id')->on('indonesia_cities')->onDelete('set null');
            $table->char('id_kecamatan')->nullable();
            $table->foreign('id_kecamatan')->references('id')->on('indonesia_districts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemetaan_perangkats');
    }
}
