<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesaTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesa_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket')->nullable();
            $table->integer('sucursal_id')->unsigned();
            $table->integer('mesa_id')->unsigned();
            $table->integer('usuario_id')->unsigned(); // Cobrado por
            $table->integer('monto')->default(0);
            $table->enum('estatus', ['cobrado','cancelado','sin_cobrar']);
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')->on('sucursal')->onDelete('cascade');
            $table->foreign('mesa_id')->references('id')->on('sucursal_mesas')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mesa_ticket');
    }
}
