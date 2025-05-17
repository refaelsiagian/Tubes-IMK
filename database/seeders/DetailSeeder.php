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
        // Jilbab Segi 4
        DB::table('details')->insert([
            ['id' => 1, 'item_id' => 1, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 35000, 'item_quantity' => 10],
            ['id' => 2, 'item_id' => 2, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 25000, 'item_quantity' => 15],
            ['id' => 3, 'item_id' => 3, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 25000, 'item_quantity' => 8],
            ['id' => 4, 'item_id' => 4, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 30000, 'item_quantity' => 12],
            ['id' => 5, 'item_id' => 5, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 40000, 'item_quantity' => 9],
            ['id' => 6, 'item_id' => 6, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 45000, 'item_quantity' => 13],
            ['id' => 7, 'item_id' => 7, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 50000, 'item_quantity' => 10],
            ['id' => 8, 'item_id' => 8, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 50000, 'item_quantity' => 11],
            ['id' => 9, 'item_id' => 9, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 50000, 'item_quantity' => 14],
            ['id' => 10, 'item_id' => 10, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 45000, 'item_quantity' => 10],
        ]);

        // Jilbab Instan
        DB::table('details')->insert([
            ['id' => 11, 'item_id' => 11, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 45000, 'item_quantity' => 9],
            ['id' => 12, 'item_id' => 12, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 45000, 'item_quantity' => 7],
            ['id' => 13, 'item_id' => 13, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 60000, 'item_quantity' => 8],
            ['id' => 14, 'item_id' => 14, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 65000, 'item_quantity' => 10],
            ['id' => 15, 'item_id' => 15, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 25000, 'item_quantity' => 12],
            ['id' => 16, 'item_id' => 16, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 90000, 'item_quantity' => 9],
            ['id' => 17, 'item_id' => 17, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 60000, 'item_quantity' => 13],
            ['id' => 18, 'item_id' => 18, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 45000, 'item_quantity' => 10],
            ['id' => 19, 'item_id' => 19, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 55000, 'item_quantity' => 14],
            ['id' => 20, 'item_id' => 20, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 55000, 'item_quantity' => 11],
            ['id' => 21, 'item_id' => 21, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 65000, 'item_quantity' => 12],
        ]); 

        //Pashmina
        DB::table('details')->insert([
            ['id' => 22, 'item_id' => 22, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 30000, 'item_quantity' => 13],
            ['id' => 23, 'item_id' => 23, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 45000, 'item_quantity' => 10],
            ['id' => 24, 'item_id' => 24, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 35000, 'item_quantity' => 8],
            ['id' => 25, 'item_id' => 25, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 45000, 'item_quantity' => 7],
            ['id' => 26, 'item_id' => 26, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 30000, 'item_quantity' => 9],
            ['id' => 27, 'item_id' => 27, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 25000, 'item_quantity' => 10],
            ['id' => 28, 'item_id' => 28, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 35000, 'item_quantity' => 13],
            ['id' => 29, 'item_id' => 29, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 25000, 'item_quantity' => 11],
            ['id' => 30, 'item_id' => 30, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 35000, 'item_quantity' => 10],
            ['id' => 31, 'item_id' => 31, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 25000, 'item_quantity' => 12],
        ]);

        // Perlengkapan Hijab
        DB::table('details')->insert([
            ['id' => 32, 'item_id' => 32, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 140000, 'item_quantity' => 9],
            ['id' => 33, 'item_id' => 33, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 150000, 'item_quantity' => 8],
            ['id' => 34, 'item_id' => 34, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 180000, 'item_quantity' => 13],
            ['id' => 35, 'item_id' => 35, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 120000, 'item_quantity' => 12],
            ['id' => 36, 'item_id' => 36, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 180000, 'item_quantity' => 10],
            ['id' => 37, 'item_id' => 37, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 400000, 'item_quantity' => 9],
            ['id' => 38, 'item_id' => 38, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 150000, 'item_quantity' => 7],
            ['id' => 39, 'item_id' => 39, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 200000, 'item_quantity' => 8],
            ['id' => 40, 'item_id' => 40, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 160000, 'item_quantity' => 10],
            ['id' => 41, 'item_id' => 41, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 180000, 'item_quantity' => 11],
        ]);

        // Aksesoris Hijab
        DB::table('details')->insert([
            ['id' => 42, 'item_id' => 42, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 15000, 'item_quantity' => 13],
            ['id' => 43, 'item_id' => 43, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 20000, 'item_quantity' => 10],
            ['id' => 44, 'item_id' => 44, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 10000, 'item_quantity' => 12],
            ['id' => 45, 'item_id' => 45, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 15000, 'item_quantity' => 14],
            ['id' => 46, 'item_id' => 46, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 15000, 'item_quantity' => 13],
            ['id' => 47, 'item_id' => 47, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 12000, 'item_quantity' => 9],
            ['id' => 48, 'item_id' => 48, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 12000, 'item_quantity' => 10],
            ['id' => 49, 'item_id' => 49, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 20000, 'item_quantity' => 12],
            ['id' => 50, 'item_id' => 50, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 20000, 'item_quantity' => 11],
            ['id' => 51, 'item_id' => 51, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 15000, 'item_quantity' => 10],
        ]);
        
        // Perlengkapan Haji
        DB::table('details')->insert([
            ['id' => 52, 'item_id' => 52, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 55000, 'item_quantity' => 9],
            ['id' => 53, 'item_id' => 53, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 40000, 'item_quantity' => 11],
            ['id' => 54, 'item_id' => 54, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 150000, 'item_quantity' => 8],
            ['id' => 55, 'item_id' => 55, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 120000, 'item_quantity' => 10],
            ['id' => 56, 'item_id' => 56, 'colour' => null, 'size' => null, 'item_image' => null, 'item_price' => 115000, 'item_quantity' => 12],
        ]);

    }
}
