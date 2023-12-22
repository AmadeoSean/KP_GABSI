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
        Schema::table('jadwal_latihans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pelatih')->nullable()->after('id');
            $table->foreign('id_pelatih')->references('id')->on('pelatihs');
            $table->string('nama')->after('id_pelatih');
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
        Schema::table('jadwal_latihans', function (Blueprint $table) {
            $table->dropForeign(['id_pelatih']);
            $table->dropColumn('id_pelatih');
            $table->dropColumn('nama');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
};
