<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnaliticasVentasMensualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analiticas_ventas_mensual', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sucursal_id')->unsigned();
            $table->date('fecha');
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
        Schema::drop('analiticas_ventas_mensual');
    }
}
