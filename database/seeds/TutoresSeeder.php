<?php

use Illuminate\Database\Seeder;
use App\Tutor;

class TutoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutors')->insert([
      	['id' => 1, 'telefono'  => '2281496378', 'nombre' => 'MIGUEL ANGEL DIAZ TORRES','correo' => 'america123@gmail.com', 'idAlumno' => 1],
      	['id' => 2, 'telefono'  => '2281793366', 'nombre' => 'JUAN ALBERTO DIAZ ROMERO','correo' => 'GHJU96@prueba.com', 'idAlumno' => 2],
      	['id' => 3, 'telefono'  => '2298635577', 'nombre' => 'KARLA TORRES SANTOS','correo' => 'lovefresita@hotmail.com', 'idAlumno' => 3],
      	['id' => 4, 'telefono'  => '2282789633', 'nombre' => 'PEDRO JUAREZ SOTO','correo' => 'lovefresita@hotmail.com', 'idAlumno' => 4],
      	['id' => 5, 'telefono'  => '2282778855', 'nombre' => 'MARIA ESCARLANTE TORRES','correo' => 'GHJU96@prueba.com', 'idAlumno' => 5],
      	['id' => 6, 'telefono'  => '2284669987', 'nombre' => 'JACQUELINE ESCOBEDO DIAZ','correo' => 'GHJU96@prueba.com', 'idAlumno' => 6],
      	['id' => 7, 'telefono'  => '2281774411', 'nombre' => 'FERNANDA SANTOS MUÑOZ','correo' => 'lovefresita@hotmail.com', 'idAlumno' => 7],
      	['id' => 8, 'telefono'  => '2283661235', 'nombre' => 'ANTONIO GARCIA GARCIA','correo' => 'america123@gmail.com', 'idAlumno' => 8],
      	['id' => 9, 'telefono'  => '2283789638', 'nombre' => 'JORGE IGNACIO DELFIN DIAZ','correo' => 'america123@gmail.com', 'idAlumno' => 9],
      	['id' => 10, 'telefono'  => '2281557801', 'nombre' => 'CARLOS ALBERTO MARIN MARIN','correo' => 'america123@gmail.com', 'idAlumno' => 10],
      	]);
    }
}
