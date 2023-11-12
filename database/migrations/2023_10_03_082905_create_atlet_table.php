<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlet', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('nama_panggilan');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('telp');
            $table->string('email');
            $table->string('foto');
            $table->integer('total_point');
            $table->string('lamp_nik');
            $table->string('nik_bbo');
            $table->string('id_bp');
            $table->timestamps();
            // $table->unsignedBigInteger('id_catatan');
            // $table->foreign('id_catatan')->references('id')->on('catatan');

            // $table->unsignedBigInteger('id_gabsi');
            // $table->foreign('id_gabsi')->references('id')->on('gabsi');

            // $table->unsignedBigInteger('id_pelatih');
            // $table->foreign('id_pelatih')->references('id')->on('pelatih');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atlet');
    }
}
