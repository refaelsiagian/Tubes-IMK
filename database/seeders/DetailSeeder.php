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
            ['id' => $id++, 'item_id' => 'A001', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A002', 'colour' => null, 'size' => null, 'stock' => 15],
            ['id' => $id++, 'item_id' => 'A003', 'colour' => 'Beige', 'size' => 'XL', 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A003', 'colour' => 'Beige', 'size' => 'L', 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A003', 'colour' => 'Turquoise', 'size' => 'XL', 'stock' => 3],
            ['id' => $id++, 'item_id' => 'A003', 'colour' => 'Turquoise', 'size' => 'L', 'stock' => 5],
            ['id' => $id++, 'item_id' => 'A004', 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 'A005', 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A006', 'colour' => 'Pink', 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 'A006', 'colour' => 'Magenta', 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A006', 'colour' => 'Silver', 'size' => null, 'stock' => 4],
            ['id' => $id++, 'item_id' => 'A007', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A008', 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 'A009', 'colour' => null, 'size' => 'S', 'stock' => 14],
            ['id' => $id++, 'item_id' => 'A009', 'colour' => null, 'size' => 'M', 'stock' => 7],
            ['id' => $id++, 'item_id' => 'A009', 'colour' => null, 'size' => 'XL', 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A009', 'colour' => null, 'size' => 'L', 'stock' => 13],
            ['id' => $id++, 'item_id' => 'A010', 'colour' => null, 'size' => null, 'stock' => 10],
        ]);

        // Jilbab Instan
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 'A011', 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A012', 'colour' => null, 'size' => null, 'stock' => 7],
            ['id' => $id++, 'item_id' => 'A013', 'colour' => 'Sage', 'size' => 'L', 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A013', 'colour' => 'Mauve', 'size' => 'XL', 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A013', 'colour' => 'Mauve', 'size' => 'L', 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A013', 'colour' => 'Lavender', 'size' => 'XL', 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A013', 'colour' => 'Lavender', 'size' => 'L', 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A013', 'colour' => 'Sage', 'size' => 'XL', 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A014', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A015', 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 'A016', 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A017', 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 'A018', 'colour' => 'Lilac', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A018', 'colour' => 'Peach', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A018', 'colour' => 'Mint', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A018', 'colour' => 'Lemon', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A018', 'colour' => 'Teal', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A018', 'colour' => 'Indigo', 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A019', 'colour' => null, 'size' => null, 'stock' => 14],
            ['id' => $id++, 'item_id' => 'A020', 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 'A021', 'colour' => null, 'size' => null, 'stock' => 12],
        ]);

        // Pashmina
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 'A022', 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 'A023', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A024', 'colour' => null, 'size' => null, 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A025', 'colour' => null, 'size' => 'S', 'stock' => 7],
            ['id' => $id++, 'item_id' => 'A025', 'colour' => null, 'size' => 'M', 'stock' => 12],
            ['id' => $id++, 'item_id' => 'A025', 'colour' => null, 'size' => 'L', 'stock' => 7],
            ['id' => $id++, 'item_id' => 'A025', 'colour' => null, 'size' => 'XL', 'stock' => 7],
            ['id' => $id++, 'item_id' => 'A026', 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A027', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A028', 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 'A029', 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 'A030', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A031', 'colour' => null, 'size' => null, 'stock' => 12],
        ]);

        // Perlengkapan Hijab
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 'A032', 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A033', 'colour' => null, 'size' => null, 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A034', 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 'A035', 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 'A036', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A037', 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A038', 'colour' => null, 'size' => null, 'stock' => 7],
            ['id' => $id++, 'item_id' => 'A039', 'colour' => null, 'size' => null, 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A040', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A041', 'colour' => null, 'size' => null, 'stock' => 11],
        ]);

        // Aksesoris Hijab
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 'A042', 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 'A043', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A044', 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 'A045', 'colour' => null, 'size' => null, 'stock' => 14],
            ['id' => $id++, 'item_id' => 'A046', 'colour' => null, 'size' => null, 'stock' => 13],
            ['id' => $id++, 'item_id' => 'A047', 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A048', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A049', 'colour' => null, 'size' => null, 'stock' => 12],
            ['id' => $id++, 'item_id' => 'A050', 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 'A051', 'colour' => null, 'size' => null, 'stock' => 10],
        ]);

        // Perlengkapan Haji
        DB::table('details')->insert([
            ['id' => $id++, 'item_id' => 'A052', 'colour' => null, 'size' => null, 'stock' => 9],
            ['id' => $id++, 'item_id' => 'A053', 'colour' => null, 'size' => null, 'stock' => 11],
            ['id' => $id++, 'item_id' => 'A054', 'colour' => null, 'size' => null, 'stock' => 8],
            ['id' => $id++, 'item_id' => 'A055', 'colour' => null, 'size' => null, 'stock' => 10],
            ['id' => $id++, 'item_id' => 'A056', 'colour' => null, 'size' => null, 'stock' => 12],
        ]);
    }

}
