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
            ['category_name' => 'Jilbab Segi 4', 'category_slug' => 'jilbab-segi-4', 'category_description' => 'Jilbab segi empat memberikan kesan elegan dan modern pada penampilanmu.', 'category_image' => null],
            ['category_name' => 'Jilbab Instan', 'category_slug' => 'jilbab-instan', 'category_description' => 'Jilbab instan praktis dan stylish untuk sehari-hari.', 'category_image' => null],
            ['category_name' => 'Pashmina', 'category_slug' => 'pashmina', 'category_description' => 'Pashmina elegan dan trendy untuk penampilanmu.', 'category_image' => null],
            ['category_name' => 'Perlengkap Hijab', 'category_slug' => 'perlengkap-hijab', 'category_description' => 'Perlengkap hijab praktis dan stylish untuk sehari-hari.', 'category_image' => null],
            ['category_name' => 'Aksesoris Hijab', 'category_slug' => 'aksesoris-hijab', 'category_description' => 'Aksesoris hijab praktis dan stylish untuk sehari-hari.', 'category_image' => null],
            ['category_name' => 'Perlengkapan Haji', 'category_slug' => 'perlengkapan-haji', 'category_description' => 'Perlengkapan haji untuk mendukung perjalanan hajimu.', 'category_image' => null],
        ]);
    }
}
