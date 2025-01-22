<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
            'admin',
            'operator',
            'superadmin'
        ];


        foreach ($roles as $roles) {
            Role::updateOrCreate(['name' => $roles]);
            // Permission::create(['uuid' => Str::uuid(),'name' => $permission]);
        }
    }
}
