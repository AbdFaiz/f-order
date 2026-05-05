<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role
        $roles = [
            ['code' => 'adm', 'name' => 'admin', 'description' => 'Administrator Website'],
            ['code' => 'wt', 'name' => 'waitress', 'description' => 'Waitress'],
            ['code' => 'chf', 'name' => 'chef', 'description' => 'Chef'],
            ['code' => 'csh', 'name' => 'cashier', 'description' => 'Cashier'],
            ['code' => 'mng', 'name' => 'manager', 'description' => 'Manager'],
        ];

        foreach($roles as $role) {
            $roleU = Role::create([
                'code' => $role['code'],
                'name' => $role['name'],
                'description' => $role['description'],
            ]);
        }

        $roleAdmin = $roleU->where('code', 'adm')->first('id');
        $roleWaitress = $roleU->where('code', 'wt')->first('id');
        $roleChef = $roleU->where('code', 'chf')->first('id');
        $roleCashier = $roleU->where('code', 'csh')->first('id');
        $roleManager = $roleU->where('code', 'mng')->first('id');

        // User
        $users = [
            ['name' => 'admin', 'email' => 'admin@foa.id', 'password' => Hash::make('password'), 'role_id' => $roleAdmin],
        ];

        foreach($roles as $role) {
            Role::create([
                'code' => $role['code'],
                'name' => $role['name'],
                'description' => $role['description'],
            ]);
        }
    }
}
