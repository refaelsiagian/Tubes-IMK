<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['id' => 1, 'size_name' => 'S'],
            ['id' => 2, 'size_name' => 'M'],
            ['id' => 3, 'size_name' => 'L'],
            ['id' => 4, 'size_name' => 'XL'],
            ['id' => 5, 'size_name' => 'XXL'],
        ];

        DB::table('sizes')->insert($sizes);
    }
}
