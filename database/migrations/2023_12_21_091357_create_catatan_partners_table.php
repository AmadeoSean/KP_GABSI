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
        Schema::create('catatan_partners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('latihan_id');
            $table->foreign('latihan_id')->references('id')->on('latihans');
            $table->unsignedBigInteger('atlet_id');
            $table->foreign('atlet_id')->references('id')->on('atlets');    
            $table->string('nama_catatan');
            $table->string('catatan_partner', 255);
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
        Schema::dropIfExists('catatan_partners');
    }
};
