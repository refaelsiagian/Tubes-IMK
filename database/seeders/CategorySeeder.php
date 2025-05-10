<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_name' => 'Jilbab Segi 4', 'category_slug' => 'jilbab-segi-4'],
            ['category_name' => 'Jilbab Instan', 'category_slug' => 'jilbab-instan'],
            ['category_name' => 'Pashmina', 'category_slug' => 'pashmina'],
            ['category_name' => 'Perlengkap Hijab', 'category_slug' => 'perlengkap-hijab'],
            ['category_name' => 'Aksesoris Hijab', 'category_slug' => 'aksesoris-hijab'],
            ['category_name' => 'Perlengkapan Haji', 'category_slug' => 'perlengkapan-haji'],
        ]);
    }
}
