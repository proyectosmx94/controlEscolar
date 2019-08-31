<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
    'curp',
    'nombre',
    'grado',
    'grupo',
    'idEscuela',
    'idTutor'
  ];
}
