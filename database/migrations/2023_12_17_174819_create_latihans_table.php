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

        Schema::create('latihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_latihan_id')->nullable();
            $table->foreign('jadwal_latihan_id')->references('id')->on('jadwal_latihans');    
            
            $table->unsignedBigInteger('grup_id');
            $table->foreign('grup_id')->references('id')->on('grups');
            
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

        Schema::dropIfExists('latihans');
    }
};
