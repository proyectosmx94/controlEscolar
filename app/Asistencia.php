<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';
    protected $fillable = [
    'idAlumno',
    'idEscuela',
    'dateTime'
  ];
}
