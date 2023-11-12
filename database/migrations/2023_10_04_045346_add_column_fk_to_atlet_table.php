<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkToAtletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atlet', function (Blueprint $table) {
           

            $table->unsignedBigInteger('id_gabsi')->after('id_bp');
            $table->foreign('id_gabsi')->references('id')->on('gabsi');

            $table->unsignedBigInteger('id_pelatih')->after('id_gabsi');
            $table->foreign('id_pelatih')->references('id')->on('pelatih');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atlet', function (Blueprint $table) {
            $table->dropForeign(['id_gabsi']);
            $table->dropColumn('id_gabsi');
            
            $table->dropForeign(['id_pelatih']);
            $table->dropColumn('id_pelatih');
        });
    }
}
