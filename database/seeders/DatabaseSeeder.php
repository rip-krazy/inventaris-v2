<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'name' => 'Ilya',
            'email' => 'ilya12@gmail.com',
            'password' => Hash::make('12345678'), // Menggunakan Hash::make untuk password
            'usertype' => 'admin',
            'mapel' => 'Bahasa',
        ]);
    }
}