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
      	['id' => 1, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'CARLOS','grado' => 'TERCERO', 'grupo' => 'B', 'idEscuela' => 2, 'curp' => 'TOHN020624MVZRRMA6'],
      	['id' => 2, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'MARIA','grado' => 'PRIMERO', 'grupo' => 'A', 'idEscuela' => 2, 'curp' => 'GUGJ050625HVZRRNA1'],
      	['id' => 3, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'JOSE PEDRO','grado' => 'SEGUNDO', 'grupo' => 'A', 'idEscuela' => 2, 'curp' => 'VAHJ040929HVZSRRA8'],
      	['id' => 4, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'PABLO','grado' => 'SEGUNDO', 'grupo' => 'A', 'idEscuela' => 2, 'curp' => 'LATL940301HVZNSS02'],
      	['id' => 5, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'MIGUEL','grado' => 'PRIMERO', 'grupo' => 'B', 'idEscuela' => 2, 'curp' => 'AULE061010MVZRPSA0'],
      	['id' => 6, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'LIDYA','grado' => 'PRIMERO', 'grupo' => 'C', 'idEscuela' => 2, 'curp' => 'JIAA060101MVZMGRA0'],
      	['id' => 7, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'RUBI','grado' => 'SEGUNDO', 'grupo' => 'C', 'idEscuela' => 2, 'curp' => 'ROHD061117MVZDRRA3'],
      	['id' => 8, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'EMMANUEL','grado' => 'TERCERO', 'grupo' => 'B', 'idEscuela' => 2, 'curp' => 'RUSJ060522HVZZNSA4'],
      	['id' => 9, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'JUAN JOSE','grado' => 'TERCERO', 'grupo' => 'A', 'idEscuela' => 2, 'curp' => 'TESM060512MNEJNCA3'],
      	['id' => 10, 'primerApellido' =>'PRUEBA', 'segundoApellido' =>'PRUEBA', 'nombre' => 'MARIA','grado' => 'TERCERO', 'grupo' => 'C', 'idEscuela' => 2, 'curp' => 'TOUR060604MVZRTBA0'],
      	]);
    }
}
