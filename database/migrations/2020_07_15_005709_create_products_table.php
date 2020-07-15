<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('Identificador del producto dentro de la tabla de productos.');
            $table->string('name')->comment('Nombre del producto.');
            $table->string('barcode')->comment('Codigo del empaque del producto.');
            $table->text('description')->comment('Descripcion del producto.');
            $table->integer('price')->comment('Precio unitario del producto.');
            $table->double('iva')->comment('Impuesto.');
            $table->foreignId('categorie_id')->constrained()->comment('Llave foránea de la tabla tipos de documentos(type_documents).');
            $table->timestamps();
            $table->softDeletes()->comment('Campo que indica la fecha en la que ha sido eliminado el producto.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
