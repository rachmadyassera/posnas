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
            ['name' => 'operator-create','module' => 'user'],
            ['name' => 'operator-edit','module' => 'user'],
            ['name' => 'operator-delete','module' => 'user'],
            ['name' => 'operator-list','module' => 'user'],
            ['name' => 'agenda-create','module' => 'agenda'],
            ['name' => 'agenda-edit','module' => 'agenda'],
            ['name' => 'agenda-delete','module' => 'agenda'],
            ['name' => 'agenda-list','module' => 'agenda'],
            ['name' => 'lokasi-create','module' => 'lokasi'],
            ['name' => 'lokasi-edit','module' => 'lokasi'],
            ['name' => 'lokasi-delete','module' => 'lokasi'],
            ['name' => 'lokasi-list','module' => 'lokasi'],
            ['name' => 'presensi-create','module' => 'presensi'],
            ['name' => 'presensi-edit','module' => 'presensi'],
            ['name' => 'presensi-delete','module' => 'presensi'],
            ['name' => 'presensi-list','module' => 'presensi']
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
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
