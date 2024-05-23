<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemetaanPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemetaan_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->text('alamat');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('keterangan');
            $table->integer('port');
            $table->BigInteger('id_pelanggan')->unsigned()->nullable();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('set null');
            $table->BigInteger('id_pengguna')->unsigned()->nullable();
            $table->foreign('id_pengguna')->references('id')->on('penggunas')->onDelete('set null');
            $table->BigInteger('id_petaodp')->unsigned()->nullable();
            $table->foreign('id_petaodp')->references('id')->on('pemetaan_perangkats')->onDelete('set null');
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
        Schema::dropIfExists('pemetaan_pelanggans');
    }
}
