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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();

            $table->float('peso_parcial')->nullable();
            $table->float('peso_final')->nullable();
            $table->float('descuento')->nullable();
            $table->float('precio')->nullable();
            $table->float('monto');
            $table->float('observacion')->nullable();

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->unsignedBigInteger('caja_id');
            $table->foreign('caja_id')->references('id')->on('cajas');

            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->unsignedBigInteger('calidad_id')->nullable();
            $table->foreign('calidad_id')->references('id')->on('calidads');

            $table->unsignedBigInteger('operacion_id');
            $table->foreign('operacion_id')->references('id')->on('operacions');
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
        Schema::dropIfExists('movimientos');
    }
};
