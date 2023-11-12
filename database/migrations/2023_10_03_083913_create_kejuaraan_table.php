<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKejuaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kejuaraan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('lokasi');
            $table->string('keterangan');
            $table->string('formulir');
            $table->string('foto');
            $table->date('tanggal_publikasi');
            $table->time('jam_publikasi');
            $table->date('tanggal_akhir_pendaftaran');
            $table->integer('bentuk_kejuaraan');
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
        Schema::dropIfExists('kejuaraan');
    }
}
