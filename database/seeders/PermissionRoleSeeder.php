<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $permissions = [
            'module-role',
            'user-create',
            'user-edit',
            'user-delete',
            'user-list'
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
            // Permission::create(['uuid' => Str::uuid(),'name' => $permission]);
        }

        // Permission::create([

        //     'uuid' => Str::uuid(),
        //     'name' => 'module-role',
        //     'guard_name' => 'web'
        // ]);
        // Permission::create([

        //     'uuid' => Str::uuid(),
        //     'name' => 'user-create',
        //     'guard_name' => 'web'
        // ]);
        // Permission::create([

        //     'uuid' => Str::uuid(),
        //     'name' => 'user-edit',
        //     'guard_name' => 'web'
        // ]);
        // Permission::create([

        //     'uuid' => Str::uuid(),
        //     'name' => 'user-delete',
        //     'guard_name' => 'web'
        // ]);
        // Permission::create([

        //     'uuid' => Str::uuid(),
        //     'name' => 'user-list',
        //     'guard_name' => 'web'
        // ]);

    }
}
