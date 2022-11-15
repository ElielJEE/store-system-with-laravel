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
        Schema::create('factura__detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_factura');
            $table->unsignedBigInteger('fk_producto');
            $table->integer('cantidad');

            $table->foreign('fk_factura')->references('id')->on('facturas')->onDelete('cascade');
            
            $table->foreign('fk_producto')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura__detalles');
    }
};
