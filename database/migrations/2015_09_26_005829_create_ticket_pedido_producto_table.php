<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketPedidoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_pedido_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('monto')->default(0);
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('mesa_ticket')->onDelete('cascade');
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
        Schema::drop('ticket_pedido_producto');
    }
}
