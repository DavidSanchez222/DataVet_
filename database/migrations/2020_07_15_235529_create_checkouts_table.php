<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique()->comment('Numero de factura de venta.');
            $table->foreignId('product_id')->constrained()->comment('Identificador del producto al cual se le hace la salida, y que se encuentra en la tabla de productos.');
            $table->integer('quantity')->comment('Cantidad del producto que se vende en una factura');
            $table->foreignId('user_id')->constrained()->comment('Identidicador del usuario que realiza la venta y genera la salida, que se encuentra en la tabla de usuarios.');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
