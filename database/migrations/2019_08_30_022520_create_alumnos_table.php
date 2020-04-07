<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('curp')->nullable();
            $table->string('primerApellido')->nullable();
            $table->string('segundoApellido')->nullable();
            $table->string('nombre');
            $table->string('grado');
            $table->string('grupo');
            $table->string('nombreTutor')->nullable();
            $table->string('telefonoTutor')->nullable();
            $table->string('correoTutor')->nullable();
            $table->string('idRfid')->nullable();
            $table->bigInteger('idEscuela')->unsigned();
            $table->foreign('idEscuela')->references('id')->on('escuelas');
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
        Schema::dropIfExists('alumnos');
    }
}
