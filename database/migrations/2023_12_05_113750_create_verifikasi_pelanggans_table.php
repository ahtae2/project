<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifikasi_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('kontak');
            $table->date('tanggal_lahir');
            $table->string('email');
            $table->string('identitas');
            $table->string('pekerjaan');
            $table->string('jenis_kelamin');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('paket_id')->references('id')->on('paket_langganans');
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
        Schema::dropIfExists('verifikasi_pelanggans');
    }
}
