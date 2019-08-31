<?php

use Illuminate\Database\Seeder;
use App\UsersTableSeeder;
use App\Escuela;
use App\Alumno;
use App\Tutor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(EscuelasSeeder::class);
        $this->call(AlumnosSeeder::class);
        $this->call(TutoresSeeder::class);
    }
}
