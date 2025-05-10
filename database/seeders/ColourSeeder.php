<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colours = [
            ['id' => 1, 'colour_name' => 'Dusty pink'],
            ['id' => 2, 'colour_name' => 'Baby blue'],
            ['id' => 3, 'colour_name' => 'Mint green'],
            ['id' => 4, 'colour_name' => 'Peach pastel'],
            ['id' => 5, 'colour_name' => 'Lavender pastel'],
            ['id' => 6, 'colour_name' => 'Cream / beige'],
            ['id' => 7, 'colour_name' => 'Maroon'],
            ['id' => 8, 'colour_name' => 'Navy blue'],
            ['id' => 9, 'colour_name' => 'Emerald green'],
            ['id' => 10, 'colour_name' => 'Mustard yellow'],
            ['id' => 11, 'colour_name' => 'Dark chocolate'],
            ['id' => 12, 'colour_name' => 'Turquoise'],
            ['id' => 13, 'colour_name' => 'Teal'],
            ['id' => 14, 'colour_name' => 'Soft grey'],
            ['id' => 15, 'colour_name' => 'Silver'],
        ];

        DB::table('colours')->insert($colours);
    }
}
