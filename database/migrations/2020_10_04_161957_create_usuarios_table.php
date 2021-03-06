<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('numTel');
            $table->string('rg');
            $table->date('data_nascimento');
            $table->bigInteger('matricula');
            $table->foreignId('cargo_id');
            $table->string('email')->unique();
            $table->string('senha');
            $table->enum('setor', ['Administrativo', 'Academico', 'Administrativo/Academico']);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('cargo_id')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
