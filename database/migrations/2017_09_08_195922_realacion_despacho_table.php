<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RealacionDespachoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->table('facturas', function (Blueprint $table) {
            $table->integer('estado_id')->default(1);
            $table->foreign('estado_id')->references('id')->on('CatEstDespacho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->table('facturas', function (Blueprint $table) {
            $table->dropColumn('estado_id');
        });
    }
}
