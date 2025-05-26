<?php

namespace Database\Seeders;
use App\Models\Item;
use App\Models\Category;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('items')->insert([
            // Jilbab Segi 4
            ['id' => 'A001', 'item_name' => 'Shinar Ansania', 'item_slug' => 'jilbab-segi-4', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 16000, 'selling_price' => 35000, 'item_status' => 1],
            ['id' => 'A002', 'item_name' => 'Saudia Ansania', 'item_slug' => 'saudia-ansania', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 10000, 'selling_price' => 25000, 'item_status' => 1],
            ['id' => 'A003', 'item_name' => 'Voila Motif', 'item_slug' => 'voila-motif', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 10000, 'selling_price' => 25000, 'item_status' => 1],
            ['id' => 'A004', 'item_name' => 'Voal Miracle Plain', 'item_slug' => 'voal-miracle-plain', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 11000, 'selling_price' => 30000, 'item_status' => 1],
            ['id' => 'A005', 'item_name' => 'S4 Ceruti Mumtaz', 'item_slug' => 'ceruti-mumtaz', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 40000, 'item_status' => 1],
            ['id' => 'A006', 'item_name' => 'S4 Ceruti Syari', 'item_slug' => 's4-ceruti-syari', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 25000, 'selling_price' => 45000, 'item_status' => 1],
            ['id' => 'A007', 'item_name' => 'S4 Shinar Syari Ansania Mer', 'item_slug' => 's4-shinar-syari-ansania-mer', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 16000, 'selling_price' => 35000, 'item_status' => 1],
            ['id' => 'A008', 'item_name' => 'S4 Wolfis 130 MZ', 'item_slug' => 's4-wolfis-130-mz', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 30000, 'selling_price' => 50000, 'item_status' => 1],
            ['id' => 'A009', 'item_name' => 'S4 Luxury Syari Motif Pouch', 'item_slug' => 's4-luxury-syari-motif-pouch', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 17000, 'selling_price' => 35000, 'item_status' => 1],
            ['id' => 'A010', 'item_name' => 'S4 Voal Motif Kinara', 'item_slug' => 's4-voal-motif-kinara', 'category_id' => 1, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 25000, 'selling_price' => 45000, 'item_status' => 1],
        ]);

        // Jilbab Instan
        DB::table('items')->insert([
            ['id' => 'A011', 'item_name' => 'Voal Miracle Syari Motif', 'item_slug' => 'voal-miracle-syari-motif', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 26000, 'selling_price' => 45000, 'item_status' => 1],
            ['id' => 'A012', 'item_name' => 'S4 Plisket Jambul', 'item_slug' => 's4-plisket-jambul', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 25000, 'selling_price' => 45000, 'item_status' => 1],
            ['id' => 'A013', 'item_name' => 'Mumtaz L Jersey', 'item_slug' => 'mumtaz-l-jersey', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 40000, 'selling_price' => 60000, 'item_status' => 1],
            ['id' => 'A014', 'item_name' => 'Dafiyah Hudi', 'item_slug' => 'dafiyah-hudi', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 45000, 'selling_price' => 65000, 'item_status' => 1],
            ['id' => 'A015', 'item_name' => 'Hijab Sport', 'item_slug' => 'hijab-sport', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 10000, 'selling_price' => 25000, 'item_status' => 1],
            ['id' => 'A016', 'item_name' => 'Dira Jersey Jumbo', 'item_slug' => 'dira-jersey-jumbo', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 70000, 'selling_price' => 90000, 'item_status' => 1],
            ['id' => 'A017', 'item_name' => 'VRS Arab XXL', 'item_slug' => 'vrs-arab-xxl', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 45000, 'selling_price' => 60000, 'item_status' => 1],
            ['id' => 'A018', 'item_name' => 'Jersey Fitrii', 'item_slug' => 'jersey-fitrii', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 25000, 'selling_price' => 45000, 'item_status' => 1],
            ['id' => 'A019', 'item_name' => 'L Pet Tali Jersey Mumtaz', 'item_slug' => 'l-pet-tali-jersey-mumtaz', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 35000, 'selling_price' => 55000, 'item_status' => 1],
            ['id' => 'A020', 'item_name' => 'Crinkle Tali Mumtaz', 'item_slug' => 'crinkle-tali-l-mumtaz', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 30000, 'selling_price' => 50000, 'item_status' => 1],
            ['id' => 'A021', 'item_name' => 'Crinkle Pet Mumtaz', 'item_slug' => 'crinkle-pet-m-mumtaz', 'category_id' => 2, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 45000, 'selling_price' => 65000, 'item_status' => 1],
        ]);

        // Pashmina
        DB::table('items')->insert([
            ['id' => 'A022', 'item_name' => 'Pashmina Hanna Polos', 'item_slug' => 'pashmina-hanna-polos', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 17500, 'selling_price' => 30000, 'item_status' => 1],
            ['id' => 'A023', 'item_name' => 'Pashmina Seruti Payet Kepala', 'item_slug' => 'pashmina-seruti-payet-kepala', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 45000, 'item_status' => 1],
            ['id' => 'A024', 'item_name' => 'Pashmina Seruti Mumtaz', 'item_slug' => 'pashmina-seruti-mumtaz', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 35000, 'item_status' => 1],
            ['id' => 'A025', 'item_name' => 'Pashmina Awliya Payet', 'item_slug' => 'pashmina-awliya-payet', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 45000, 'item_status' => 1],
            ['id' => 'A026', 'item_name' => 'Pashmina Yeffa', 'item_slug' => 'pashmina-yeffa', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 30000, 'item_status' => 1],
            ['id' => 'A027', 'item_name' => 'Pashmina Saudia', 'item_slug' => 'pashmina-saudia', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 15000, 'selling_price' => 25000, 'item_status' => 1],
            ['id' => 'A028', 'item_name' => 'Pashmina Dubai', 'item_slug' => 'pashmina-dubai', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 35000, 'item_status' => 1],
            ['id' => 'A029', 'item_name' => 'Pashmina Sabin Hanna', 'item_slug' => 'pashmina-sabin-hanna', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 15000, 'selling_price' => 25000, 'item_status' => 1],
            ['id' => 'A030', 'item_name' => 'Pashmina Clara', 'item_slug' => 'pashmina-clara', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 15500, 'selling_price' => 35000, 'item_status' => 1],
            ['id' => 'A031', 'item_name' => 'Pashmina Richie Crepe Bunga', 'item_slug' => 'pashmina-richie-crepe-bunga', 'category_id' => 3, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 12000, 'selling_price' => 25000, 'item_status' => 1],
        ]);


        // Perlengkapan Hijab
        DB::table('items')->insert([
            ['id' => 'A032', 'item_name' => 'Mukena Travel Parasut', 'item_slug' => 'mukena-travel-parasut', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 70000, 'selling_price' => 140000, 'item_status' => 1],
            ['id' => 'A033', 'item_name' => 'Mukena Travel Motif', 'item_slug' => 'mukena-travel-motif', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 80000, 'selling_price' => 150000, 'item_status' => 1],
            ['id' => 'A034', 'item_name' => 'Delanova Brokat Premium', 'item_slug' => 'delanova-brokat-premium', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 90000, 'selling_price' => 180000, 'item_status' => 1],
            ['id' => 'A035', 'item_name' => 'Khadijah Tas', 'item_slug' => 'khadijah-tas', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 60000, 'selling_price' => 120000, 'item_status' => 1],
            ['id' => 'A036', 'item_name' => 'Khadijah Rayon Semi', 'item_slug' => 'khadijah-rayon-semi', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 90000, 'selling_price' => 180000, 'item_status' => 1],
            ['id' => 'A037', 'item_name' => 'Oriental Armani Sheren', 'item_slug' => 'oriental-armani-sheren', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 200000, 'selling_price' => 400000, 'item_status' => 1],
            ['id' => 'A038', 'item_name' => 'Rayon Polos RB', 'item_slug' => 'rayon-polos-rb', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 75000, 'selling_price' => 150000, 'item_status' => 1],
            ['id' => 'A039', 'item_name' => 'Uragiri Renda Mini', 'item_slug' => 'uragiri-renda-mini', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 100000, 'selling_price' => 200000, 'item_status' => 1],
            ['id' => 'A040', 'item_name' => 'Rayon Tabur Renda Tutu', 'item_slug' => 'rayon-tabur-renda-tutu', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 80000, 'selling_price' => 160000, 'item_status' => 1],
            ['id' => 'A041', 'item_name' => 'Mikro LV', 'item_slug' => 'mikro-lv', 'category_id' => 4, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 90000, 'selling_price' => 180000, 'item_status' => 1],
        ]);


        // Aksesoris Hijab
        DB::table('items')->insert([
            ['id' => 'A042', 'item_name' => 'Handsock Pita', 'item_slug' => 'handsock-pita', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 7000, 'selling_price' => 15000, 'item_status' => 1],
            ['id' => 'A043', 'item_name' => 'Handsock Pita Renda Putih', 'item_slug' => 'handsock-pita-renda-putih', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 9000, 'selling_price' => 20000, 'item_status' => 1],
            ['id' => 'A044', 'item_name' => 'Inner Bandana Kerut', 'item_slug' => 'inner-bandana-kerut', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 6000, 'selling_price' => 10000, 'item_status' => 1],
            ['id' => 'A045', 'item_name' => 'Inner Premium 1 Warna', 'item_slug' => 'inner-premium-1-warna', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 8000, 'selling_price' => 15000, 'item_status' => 1],
            ['id' => 'A046', 'item_name' => 'Inner Premium 4 Warna', 'item_slug' => 'inner-premium-4-warna', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 8000, 'selling_price' => 15000, 'item_status' => 1],
            ['id' => 'A047', 'item_name' => 'Manset Tangan Polos Kulit', 'item_slug' => 'manset-tangan-polos-kulit', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 7000, 'selling_price' => 12000, 'item_status' => 1],
            ['id' => 'A048', 'item_name' => 'Manset Tangan Lubang Kulit', 'item_slug' => 'manset-tangan-lubang-kulit', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 7000, 'selling_price' => 12000, 'item_status' => 1],
            ['id' => 'A049', 'item_name' => 'Kaos Kaki Wudhu', 'item_slug' => 'kaos-kaki-wudhu', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 10000, 'selling_price' => 20000, 'item_status' => 1],
            ['id' => 'A050', 'item_name' => 'Kaos Kaki Fashion', 'item_slug' => 'kaos-kaki-fashion', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 10000, 'selling_price' => 20000, 'item_status' => 1],
            ['id' => 'A051', 'item_name' => 'Kaos Kaki Jempol Stocking', 'item_slug' => 'kaos-kaki-jempol-stocking', 'category_id' => 5, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 11000, 'selling_price' => 22000, 'item_status' => 1],
        ]);

        // Perlengkapan Haji
        DB::table('items')->insert([
            ['id' => 'A052', 'item_name' => 'Singlet Haji', 'item_slug' => 'singlet-haji', 'category_id' => 6, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 55000, 'item_status' => 1],
            ['id' => 'A053', 'item_name' => 'Topi Haji', 'item_slug' => 'topi-haji', 'category_id' => 6, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 40000, 'item_status' => 1],
            ['id' => 'A054', 'item_name' => 'Jilbab Haji', 'item_slug' => 'jilbab-haji', 'category_id' => 6, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 150000, 'item_status' => 1],
            ['id' => 'A055', 'item_name' => 'Celana Haji Pria Hitam', 'item_slug' => 'celana-haji-pria-hitam', 'category_id' => 6, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 120000, 'item_status' => 1],
            ['id' => 'A056', 'item_name' => 'Celana Haji Wanita Putih', 'item_slug' => 'celana-haji-wanita-putih', 'category_id' => 6, 'item_description' => 'Lorem ipsum dolor sit amet', 'buying_price' => 20000, 'selling_price' => 115000, 'item_status' => 1],
        ]);

    }
}
