<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_types', function (Blueprint $table) {
            $table->id()->comment('Identificador del tipo de documento en la tabla.');
            $table->string('abbreviation')->unique()->comment('Abreviación del tipo de documento.');
            $table->string('name')->comment('Nombre del tipo de documento.');
            $table->timestamps();
            $table->softDeletes()->comment('Campo que indica la fecha en la que ha sido eliminado el tipo de documento.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_types');
    }
}
