<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Owner',
            'id' => 'R001',
            'email' => 'OuV9P@example.com',
            'password' => bcrypt('password'),
            'role' => 'owner',
        ]);

        User::create([
            'name' => 'Admin',
            'id' => 'R002',
            'email' => null,
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Admin 2',
            'id' => 'R003',
            'email' => null,
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}
