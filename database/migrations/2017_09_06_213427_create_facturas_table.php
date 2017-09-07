<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('facturas', function (Blueprint $table) {
            $table->dateTime('Fecha');
            $table->integer('Factura')->primary();
            $table->string('Nombre');
            $table->integer('sucursal_id')->unsigned();
            $table->foreign('sucursal_id')->references('id')->on('catsucursal');
           $table->char('CodValidoFact');
           $table->foreign('CodValidoFact')->references('CodEstado')->on('CatEstadoFact');
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
        Schema::dropIfExists('facturas');
    }
}
