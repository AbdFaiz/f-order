<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesData = [
            ['code' => 'adm', 'name' => 'admin', 'description' => 'Administrator Website'],
            ['code' => 'wt', 'name' => 'waitress', 'description' => 'Waitress'],
            ['code' => 'chf', 'name' => 'chef', 'description' => 'Chef'],
            ['code' => 'csh', 'name' => 'cashier', 'description' => 'Cashier'],
            ['code' => 'mng', 'name' => 'manager', 'description' => 'Manager'],
        ];

        foreach ($rolesData as $role) {
            Role::create($role);
        }

        $roleIds = Role::pluck('id', 'code');

        $users = [
            ['name' => 'Admin User', 'username' => 'admin', 'email' => 'admin@foa.id', 'role_code' => 'adm'],
            ['name' => 'Waitress User', 'username' => 'waitress', 'email' => 'waitress@foa.id', 'role_code' => 'wt'],
            ['name' => 'Chef User', 'username' => 'chef', 'email' => 'chef@foa.id', 'role_code' => 'chf'],
            ['name' => 'Cashier User', 'username' => 'cashier', 'email' => 'cashier@foa.id', 'role_code' => 'csh'],
            ['name' => 'Manager User', 'username' => 'mngr', 'email' => 'manager@foa.id', 'role_code' => 'mng'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => Hash::make('password'),
                'role_id' => $roleIds[$user['role_code']],
            ]);
        }
    }
}
