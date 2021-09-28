<?php

use Illuminate\Database\Seeder;
use App\Escuela;

class EscuelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escuelas')->insert([
        ['id' => 1, 'nombreEscuela'  => 'SIN ESCUELA', 'clave' => 'NA','turno' => 'NA', 'nivel' => 'NA'],
      	['id' => 2, 'nombreEscuela'  => 'MANUEL C. TELLO', 'clave' => 'XKJHKJGHKHJ','turno' => 'MATUTINO', 'nivel' => 'SECUNDARIA'],
      	['id' => 3, 'nombreEscuela'  => 'EMILIANO ZAPATA', 'clave' => 'YRTYRTYRYTU','turno' => 'MATUTINO', 'nivel' => 'BACHILLERATO']
      	]);
    }
}
