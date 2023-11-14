<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletJadwalLatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlet_jadwal_latihan', function (Blueprint $table) {
            $table->unsignedBigInteger('jadwal_latihan_id')->nullable();
            $table->foreign('jadwal_latihan_id')->references('id')->on('jadwal_latihans');
            $table->unsignedBigInteger('atlet_id')->nullable();
            $table->foreign('atlet_id')->references('id')->on('atlets');    
            $table->string('catatan',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atlet_jadwal_latihan');
    }
}
