<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnaliticasVentasDiariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analiticas_ventas_diarias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sucursal_id')->unsigned();
            $table->integer('year')->unsigned();
            $table->integer('month')->unsigned();
            $table->integer('day')->unsigned();
            $table->integer('ventas')->unsigned();
            $table->integer('monto')->unsigned();
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')->on('sucursal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('analiticas_ventas_diarias');
    }
}
