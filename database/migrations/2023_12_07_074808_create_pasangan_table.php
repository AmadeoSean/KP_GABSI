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
        Schema::create('pasangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_atlet_1')->nullable();
            $table->foreign('id_atlet_1')->references('id')->on('atlets');
            $table->unsignedBigInteger('id_atlet_2')->nullable();
            $table->foreign('id_atlet_2')->references('id')->on('atlets');  
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
        Schema::dropIfExists('pasangans');
    }
};
