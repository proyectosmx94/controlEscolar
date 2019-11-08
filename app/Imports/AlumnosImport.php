<?php

namespace App\Imports;

use App\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumno([
            'curp'            => $row[0],
            'primerApellido'  => $row[1],
            'segundoApellido' => $row[2],
            'nombre'          => $row[3],
            'grado'           => $row[4],
            'grupo'           => $row[5],
            'idEscuela'       => $row[6]
        ]);
    }
}
