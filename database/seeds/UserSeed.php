<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
            ]);
        $user->assignRole('administrator');
        $user = User::create([
            'name' => 'Usuario',
            'last_name' => 'Solicitante',
            'email' => 'solicitante@admin.com',
            'password' => bcrypt('admin')
            ]);
            $user->assignRole('requester');
            $user = User::create([
            'name' => 'Usuario',
            'last_name' => 'Aprobador',
            'email' => 'aprobador@admin.com',
            'password' => bcrypt('admin')
        ]);
        $user->assignRole('approver');

    }
}
