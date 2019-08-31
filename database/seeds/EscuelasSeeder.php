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
      	['id' => 1, 'nombreEscuela'  => 'MANUEL C. TELLO', 'clave' => 'XKJHKJGHKHJ','turno' => 'MATUTINO', 'NIVEL' => 'SECUNDARIA'],
      	['id' => 2, 'nombreEscuela'  => 'EMILIANO ZAPATA', 'clave' => 'YRTYRTYRYTU','turno' => 'MATUTINO', 'NIVEL' => 'BACHILLERATO']
      	]);
    }
}
