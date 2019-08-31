<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutors';
    protected $fillable = [
    'nombre',
    'telefono',
    'correo',
    'idAlumno'
  ];
}
