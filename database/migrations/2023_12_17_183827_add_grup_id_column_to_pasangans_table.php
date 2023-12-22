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
        Schema::table('pasangans', function (Blueprint $table) {
            $table->unsignedBigInteger('grup_id')->after('id_atlet_2');
            $table->foreign('grup_id')->references('id')->on('grups');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasangans', function (Blueprint $table) {
            $table->dropForeign(['grup_id']);
            $table->dropColumn('grup_id');
        });
    }
};
