<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('users_manage');
        $role->givePermissionTo('requester_manage');
        $role->givePermissionTo('approver_manage');
        $role = Role::create(['name' => 'requester']);
        $role->givePermissionTo('requester_manage');
        $role = Role::create(['name' => 'approver']);
        $role->givePermissionTo('approver_manage');
    }
}
