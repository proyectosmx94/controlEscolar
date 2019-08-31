<?php

use Illuminate\Database\Seeder;
use App\Alumno;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->insert([
      	['id' => 1, 'nombre' => 'CARLOS DIAZ TORRES','grado' => 'TERCERO', 'grupo' => 'B', 'idEscuela' => 1, 'curp' => 'AOPI061019MVZCRSA3'],
      	['id' => 2, 'nombre' => 'MARIA DIAZ ROMERO','grado' => 'PRIMERO', 'grupo' => 'A', 'idEscuela' => 1, 'curp' => 'AUBE060707HVZGZRA5'],
      	['id' => 3, 'nombre' => 'JOSE PEDRO TORRES SANTOS','grado' => 'SEGUNDO', 'grupo' => 'A', 'idEscuela' => 1, 'curp' => 'AUCJ061006HVZGMNA9'],
      	['id' => 4, 'nombre' => 'PABLO JUAREZ SOTO','grado' => 'SEGUNDO', 'grupo' => 'A', 'idEscuela' => 1, 'curp' => 'AARC060130HVZMNRA1'],
      	['id' => 5, 'nombre' => 'MIGUEL ESCARLANTE TORRES','grado' => 'PRIMERO', 'grupo' => 'B', 'idEscuela' => 1, 'curp' => 'AULE061010MVZRPSA0'],
      	['id' => 6, 'nombre' => 'LIDYA ESCOBEDO DIAZ','grado' => 'PRIMERO', 'grupo' => 'C', 'idEscuela' => 1, 'curp' => 'JIAA060101MVZMGRA0'],
      	['id' => 7, 'nombre' => 'RUBI SANTOS MUÑOZ','grado' => 'SEGUNDO', 'grupo' => 'C', 'idEscuela' => 1, 'curp' => 'ROHD061117MVZDRRA3'],
      	['id' => 8, 'nombre' => 'EMMANUEL GARCIA GARCIA','grado' => 'TERCERO', 'grupo' => 'B', 'idEscuela' => 1, 'curp' => 'RUSJ060522HVZZNSA4'],
      	['id' => 9, 'nombre' => 'JUAN JOSE DELFIN DIAZ','grado' => 'TERCERO', 'grupo' => 'A', 'idEscuela' => 1, 'curp' => 'TESM060512MNEJNCA3'],
      	['id' => 10, 'nombre' => 'MARIA MARIN MARIN','grado' => 'TERCERO', 'grupo' => 'C', 'idEscuela' => 1, 'curp' => 'TOUR060604MVZRTBA0'],
      	]);
    }
}
