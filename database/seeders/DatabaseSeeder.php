<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(OrganizationSeeder::class);
        $this->call(LocationSeeder::class);

    }
}
