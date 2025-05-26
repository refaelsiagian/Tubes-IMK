<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $images = [];

        // Loop item_id dari A001 sampai A056
        for ($i = 1; $i <= 56; $i++) {
            $itemId = 'A' . str_pad($i, 3, '0', STR_PAD_LEFT);

            // Tambahkan 5 baris untuk tiap item_id
            for ($j = 0; $j < 5; $j++) {
                $images[] = [
                    'item_id'    => $itemId,
                    'colour'     => null,
                    'image_name' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert ke database
        DB::table('images')->insert($images);
    }
}
