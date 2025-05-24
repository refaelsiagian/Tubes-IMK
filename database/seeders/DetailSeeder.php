<?php

namespace Database\Seeders;
use App\Models\Item;
use App\Models\Details;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = 1;

        // Jilbab Segi 4
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 1, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 2, 'colour' => null, 'size' => null, 'stock' => 15],
            ['id' => $id++, 'item_id' => 3, 'colour' => 'Beige', 'size' => 'XL', 'stock' => 8],
            ['id' => $id++, 'item_id' => 3, 'colour' => 'Beige', 'size' => 'L', 'stock' => 9],
            ['id' => $id++, 'item_id' => 3, 'colour' => 'Turquoise', 'size' => 'XL', 'stock' => 3],
            ['id' => $id++, 'item_id' => 3, 'colour' => 'Turquoise', 'size' => 'L', 'stock' => 5],
            ['id' => $id++, 'item_id' => 4, 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 5, 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 6, 'colour' => 'Pink', 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 6, 'colour' => 'Magenta', 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 6, 'colour' => 'Silver', 'size' => null, 'stock' => 4],
            ['id' => $id++, 'item_id' => 7, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 8, 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 9, 'colour' => null, 'size' => 'S', 'stock' => 14],
            ['id' => $id++, 'item_id' => 9, 'colour' => null, 'size' => 'M', 'stock' => 7],
            ['id' => $id++, 'item_id' => 9, 'colour' => null, 'size' => 'XL', 'stock' => 9],
            ['id' => $id++, 'item_id' => 9, 'colour' => null, 'size' => 'L', 'stock' => 13],
            ['id' => $id++, 'item_id' => 10, 'colour' => null, 'size' => null, 'stock' => 10],
        ]);

        // Jilbab Instan
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 11, 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 12, 'colour' => null, 'size' => null, 'stock' => 7],
            ['id' => $id++, 'item_id' => 13, 'colour' => 'Sage', 'size' => 'L', 'stock' => 8],
            ['id' => $id++, 'item_id' => 13, 'colour' => 'Mauve', 'size' => 'XL', 'stock' => 8],
            ['id' => $id++, 'item_id' => 13, 'colour' => 'Mauve', 'size' => 'L', 'stock' => 8],
            ['id' => $id++, 'item_id' => 13, 'colour' => 'Lavender', 'size' => 'XL', 'stock' => 8],
            ['id' => $id++, 'item_id' => 13, 'colour' => 'Lavender', 'size' => 'L', 'stock' => 8],
            ['id' => $id++, 'item_id' => 13, 'colour' => 'Sage', 'size' => 'XL', 'stock' => 8],
            ['id' => $id++, 'item_id' => 14, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 15, 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 16, 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 17, 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 18, 'colour' => 'Lilac', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 18, 'colour' => 'Peach', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 18, 'colour' => 'Mint', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 18, 'colour' => 'Lemon', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 18, 'colour' => 'Teal', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 18, 'colour' => 'Indigo', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 19, 'colour' => null, 'size' => null, 'stock' => 14],
            ['id' => $id++, 'item_id' => 20, 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 21, 'colour' => null, 'size' => null, 'stock' => 12],
        ]);

        // Pashmina
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 22, 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 23, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 24, 'colour' => null, 'size' => null, 'stock' => 8],
            ['id' => $id++, 'item_id' => 25, 'colour' => null, 'size' => 'S', 'stock' => 7],
            ['id' => $id++, 'item_id' => 25, 'colour' => null, 'size' => 'M', 'stock' => 12],
            ['id' => $id++, 'item_id' => 25, 'colour' => null, 'size' => 'L', 'stock' => 7],
            ['id' => $id++, 'item_id' => 25, 'colour' => null, 'size' => 'XL', 'stock' => 7],
            ['id' => $id++, 'item_id' => 26, 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 27, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 28, 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 29, 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 30, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 31, 'colour' => null, 'size' => null, 'stock' => 12],
        ]);

        // Perlengkapan Hijab
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 32, 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 33, 'colour' => null, 'size' => null, 'stock' => 8],
            ['id' => $id++, 'item_id' => 34, 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 35, 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 36, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 37, 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 38, 'colour' => null, 'size' => null, 'stock' => 7],
            ['id' => $id++, 'item_id' => 39, 'colour' => null, 'size' => null, 'stock' => 8],
            ['id' => $id++, 'item_id' => 40, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 41, 'colour' => null, 'size' => null, 'stock' => 11],
        ]);

        // Aksesoris Hijab
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 42, 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 43, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 44, 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 45, 'colour' => null, 'size' => null, 'stock' => 14],
            ['id' => $id++, 'item_id' => 46, 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 47, 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 48, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 49, 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 50, 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 51, 'colour' => null, 'size' => null, 'stock' => 10],
        ]);

        // Perlengkapan Haji
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 52, 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 53, 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 54, 'colour' => null, 'size' => null, 'stock' => 8],
            ['id' => $id++, 'item_id' => 55, 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 56, 'colour' => null, 'size' => null, 'stock' => 12],
        ]);
    }

}
