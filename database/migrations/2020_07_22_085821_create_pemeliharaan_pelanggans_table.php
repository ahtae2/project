<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeliharaanPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeliharaan_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->string('catatan')->nullable();
            $table->BigInteger('id_petapelanggan')->unsigned()->nullable();
            $table->foreign('id_petapelanggan')->references('id')->on('pemetaan_pelanggans')->onDelete('set null');
            $table->BigInteger('id_pengguna')->unsigned()->nullable();
            $table->foreign('id_pengguna')->references('id')->on('penggunas')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeliharaan_pelanggans');
    }
}
