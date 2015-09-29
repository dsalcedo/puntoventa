<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketPedidoPromocionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_pedido_promocion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned();
            $table->integer('promocion_id')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->integer('monto')->unsigned();
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('mesa_ticket')->onDelete('cascade');
            $table->foreign('promocion_id')->references('id')->on('catalogo_promociones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket_pedido_promocion');
    }
}
