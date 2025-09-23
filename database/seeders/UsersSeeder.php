<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::updateOrCreate(

            ['email' => 'alpatester@lepat.app'],
            ['name' => 'Developer', 'role' => 'superadmin', 'password' => bcrypt('081279329132')]
            // [
            // 'id' => Str::uuid(),
            // 'name' => 'Developer',
            // 'role' => 'superadmin',
            // 'email' => 'alpatester@posnas.app',
            // 'password' => bcrypt('081279329132'),
            // ]
        );

        // $permissions = Permission::whereIn('id', [1,2,3])->pluck('id','id')->all();
        $permissions = Permission::pluck('id', 'id')->all();
        // $permissions = Permission::pluck('uuid')->toArray();
        // $permissions = Permission::pluck('uuid')->toArray();
        // dd($permissions);
        $role = Role::findByName($admin->role);
        // dd($role->id);
        $role->syncPermissions($permissions);

        $admin->assignRole('superadmin');

    }
}
