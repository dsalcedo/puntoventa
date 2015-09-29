<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosPromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_promociones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promocion_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();

            $table->foreign('promocion_id')->references('id')->on('catalogo_promociones')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('catalogo_productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos_promociones');
    }
}
