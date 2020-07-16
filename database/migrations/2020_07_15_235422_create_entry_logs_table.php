<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_logs', function (Blueprint $table) {
            $table->id()->comment('Identificador de la entrada en la tabla.');
            $table->string('purchase_order')->unique()->comment('Numero de la orden de compra.');
            $table->foreignId('product_id')->constrained()->comment('Identificador del producto de la tabla de productos.');
            $table->integer('quantity')->comment('Cantidad del producto entrante');
            $table->foreignId('provider_id')->constrained()->comment('Identificador del proveedor en la tabla de proveedores.');
            $table->foreignId('user_id')->constrained()->comment('Identificador del usuario que hace el registro de la entrada del producto, el cual esta en la tabla de usuarios.');
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
        Schema::dropIfExists('entry_logs');
    }
}
