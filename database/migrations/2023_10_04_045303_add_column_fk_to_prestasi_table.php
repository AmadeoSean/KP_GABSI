<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFkToPrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kejuaraan')->after('point');
            $table->foreign('id_kejuaraan')->references('id')->on('kejuaraan');

            $table->unsignedBigInteger('id_atlet')->after('id_kejuaraan');
            $table->foreign('id_atlet')->references('id')->on('atlet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->dropForeign(['id_kejuaraan']);
            $table->dropColumn('id_kejuaraan');
            
            $table->dropForeign(['id_atlet']);
            $table->dropColumn('id_atlet');
        });
    }
}
