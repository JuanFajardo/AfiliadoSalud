<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Afiliado extends Model
{
  use SoftDeletes;
  protected $table    = 'afiliados';
  protected $fillable = ['id', 'numero', 'matricula', 'paterno', 'materno', 'nombre', 'sexo', 'fecha_nacimiento', 'carnet', 'carnet_exp', 'regional', 'centro_salud', 'sigla', 'fecha_actualizacion', 'id_user'];
  protected $dates    = ['deleted_at'];
}
