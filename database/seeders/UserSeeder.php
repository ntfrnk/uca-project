<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Se crea inicialmente un usuario
         * con privilegios de administrador
         */
        User::insert([
            'level_id' => 1,
            'name' => 'User',
            'lastname' => 'Admin',
            'email' => 'admin@ucaproject.com',
            'password' => \Hash::make('admin'),
        ]);
    }
}
