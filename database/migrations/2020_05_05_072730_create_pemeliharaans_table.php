<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeliharaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('keterangan');
            $table->string('catatan')->nullable();
            $table->BigInteger('id_petaodp')->unsigned()->nullable();
            $table->foreign('id_petaodp')->references('id')->on('pemetaan_perangkats')->onDelete('set null');
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
        Schema::dropIfExists('pemeliharaans');
    }
}
