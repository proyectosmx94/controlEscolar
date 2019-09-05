<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
    'curp',
    'primerApellido',
    'segundoApellido',
    'nombre',
    'grado',
    'grupo',
    'idEscuela',
    'idTutor'
  ];
}
