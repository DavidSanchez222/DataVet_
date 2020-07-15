<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id()->comment('Identificador del proveedor en la tabla.');
            $table->string('name')->unique()->comment('Nombre del proveedor.');
            $table->string('rut_nit')->unique()->comment('Codigo RUT o NIT');
            $table->string('address')->comment('Dirección del proveedor.');
            $table->string('phones')->comment('Teléfonos del proveedor.');
            $table->timestamps();
            $table->softDeletes()->comment('Campo que indica la fecha en la que ha sido eliminado el proveedor.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
