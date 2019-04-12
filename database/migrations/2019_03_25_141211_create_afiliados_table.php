<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->string('matricula');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombre');
            $table->string('sexo')->commet('MASCULINO - FEMENINO ');
            $table->date('fecha_nacimiento');
            $table->string('carnet');
            $table->string('carnet_exp');
            $table->string('regional');

            $table->string('centro_salud');
            $table->string('sigla');
            $table->string('fecha_actualizacion');
            $table->integer('id_user');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    //Nº 	MATRICULA	AP_PATERNO	AP_MATERNO	NOMBRES	SEXO	FECHA_NAC	CARNET_ID	CARNET_EXP	REGIONAL

    public function down()
    {
        Schema::dropIfExists('afiliados');
    }
}
