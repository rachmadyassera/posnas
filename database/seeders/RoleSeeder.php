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
        Role::create([

            // 'uuid' => Str::uuid(),
            'name' => 'admin'
        ]);

        Role::create([

            // 'uuid' => Str::uuid(),
            'name' => 'operator'
        ]);

        Role::create([

            // 'uuid' => Str::uuid(),
            'name' => 'superadmin'
        ]);
    }
}
