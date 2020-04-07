<?php

namespace App\Imports;

use App\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumnosImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumno([
            'curp'            => $row['curp'],
            'primerApellido'  => $row['primerapellido'],
            'segundoApellido' => $row['segundoapellido'],
            'nombre'          => $row['nombre'],
            'grado'           => $row['grado'],
            'grupo'           => $row['grupo'],
            'nombreTutor'     => $row['nombretutor'],
            'telefonoTutor'   => $row['telefonotutor'],
            'correoTutor'     => $row['correotutor'],
            'idRfid'          => $row['idrfid'],
            'idEscuela'       => $row['idescuela']
        ]);
    }
}
