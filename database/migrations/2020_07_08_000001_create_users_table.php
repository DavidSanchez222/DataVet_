<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('Identificador del usuario en el la base de datos.');
            $table->string('nickname')->comment('Apodo que aparecerá en la cuenta del usuario.');
            $table->string('name')->comment('Nombre del usuario.');
            $table->string('lastname')->comment('Apellidos del usuario.');
            $table->foreignId('document_type_id')->constrained()->comment('Llave foránea de la tabla tipos de documentos(type_documents).');
            $table->string('number_id')->unique()->comment('Numero de identificación del usuario.');
            $table->string('phone')->comment('Teléfono de contacto del usuario');
            $table->foreignId('role_id')->constrained()->comment('Llave foranea que hace referencia al id en la tabla de roles.v');
            $table->string('email')->unique()->comment('Correo electrónico del usuario.');
            $table->timestamp('email_verified_at')->nullable()->comment('Fecha de verificación del correo electrónico.');
            $table->string('password')->comment('Contraseña del usuario');
            $table->rememberToken()->comment('Clave del sistema para recordar sesiones abiertas.');
            $table->timestamps();
            $table->softDeletes()->comment('Campo que indica la fecha en la que ha sido eliminada la cuenta del usuario.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
