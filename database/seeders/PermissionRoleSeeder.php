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
            ['name' => 'operator-create','module' => 'operator'],
            ['name' => 'operator-read','module' => 'operator'],
            ['name' => 'operator-edit','module' => 'operator'],
            ['name' => 'operator-delete','module' => 'operator'],
            ['name' => 'operator-list','module' => 'operator'],
            ['name' => 'agenda-create','module' => 'agenda'],
            ['name' => 'agenda-read','module' => 'agenda'],
            ['name' => 'agenda-edit','module' => 'agenda'],
            ['name' => 'agenda-delete','module' => 'agenda'],
            ['name' => 'agenda-list','module' => 'agenda'],
            ['name' => 'agenda-cancel','module' => 'agenda'],
            ['name' => 'agenda-search','module' => 'agenda'],
            ['name' => 'agenda-download','module' => 'agenda'],
            ['name' => 'note-create','module' => 'agenda'],
            ['name' => 'note-read','module' => 'agenda'],
            ['name' => 'note-edit','module' => 'agenda'],
            ['name' => 'note-delete','module' => 'agenda'],
            ['name' => 'presensi-create','module' => 'presensi'],
            ['name' => 'presensi-read','module' => 'presensi'],
            ['name' => 'presensi-edit','module' => 'presensi'],
            ['name' => 'presensi-delete','module' => 'presensi'],
            ['name' => 'presensi-list','module' => 'presensi'],
            ['name' => 'presensi-qr','module' => 'presensi'],
            ['name' => 'presensi-download','module' => 'presensi'],
            ['name' => 'location-create','module' => 'presensi'],
            ['name' => 'location-read','module' => 'presensi'],
            ['name' => 'location-edit','module' => 'presensi'],
            ['name' => 'location-delete','module' => 'presensi'],
            ['name' => 'location-list','module' => 'presensi'],
            ['name' => 'participant-create','module' => 'presensi'],
            ['name' => 'participant-read','module' => 'presensi'],
            ['name' => 'participant-edit','module' => 'presensi'],
            ['name' => 'participant-delete','module' => 'presensi'],
            ['name' => 'participant-list','module' => 'presensi']
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
