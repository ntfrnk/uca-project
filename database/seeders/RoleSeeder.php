<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Titular',
            'Suplente', 
            'Adjunto',
        ];

        foreach($roles as $role){
            Role::insert(['name' => $role]);
        }
    }
}
