<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('locations')->insert([
            'id' => Str::uuid(),
            'user_id' => '-',
            'organization_id' => '-',
            'name' => 'Aula Thamrin Munthe, Kantor Walikota.',
            'address' => 'JL. Jend.Sudirman, KM.5.5, Kel. Pantai Johor, Kec. Datuk Bandar, Kota Tanjungbalai',
            'description' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('locations')->insert([
            'id' => Str::uuid(),
            'user_id' => '-',
            'organization_id' => '-',
            'name' => 'Aula Sutrisno Hadi, Kantor Walikota.',
            'address' => 'JL. Jend.Sudirman, KM.5.5, Kel. Pantai Johor, Kec. Datuk Bandar, Kota Tanjungbalai',
            'description' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
    }
}
