<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'category_id' => '1',
            'name' => 'Louis Vuiton Z1',
            'image' => '',
            'size' => '40',
            'price' => '850000'

        ]);
        DB::table('product')->insert([
            'category_id' => '2',
            'name' => 'Diadora Dd99',
            'image' => '',
            'size' => '43',
            'price' => '975000'

        ]);
        DB::table('product')->insert([
            'category_id' => '3',
            'name' => 'Converse',
            'image' => '',
            'size' => '38',
            'price' => '615000'

        ]);
    }
}
