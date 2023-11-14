<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletKejuaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlet_kejuaraan', function (Blueprint $table) {
            $table->unsignedBigInteger('atlet_id')->nullable();
            $table->foreign('atlet_id')->references('id')->on('atlets');
            $table->unsignedBigInteger('kejuraan_id')->nullable();
            $table->foreign('kejuraan_id')->references('id')->on('kejuaraans');    
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
        Schema::dropIfExists('atlet_kejuaraan');
    }
}
