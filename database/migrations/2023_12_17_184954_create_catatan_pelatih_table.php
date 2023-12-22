<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_pelatihs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('latihan_id');
            $table->foreign('latihan_id')->references('id')->on('latihans');
            $table->unsignedBigInteger('pasangan_id');
            $table->foreign('pasangan_id')->references('id')->on('pasangans');
            $table->string('nama_catatan');
            $table->string('catatan_pelatih', 255);
            $table->string('catatan_diri', 255)->nullable();
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
        Schema::dropIfExists('catatan_pelatihs');
    }
};
