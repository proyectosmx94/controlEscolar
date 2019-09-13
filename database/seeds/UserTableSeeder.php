<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'ADMINISTRADOR';
        $user->claveEscuela = 'MVX123';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
