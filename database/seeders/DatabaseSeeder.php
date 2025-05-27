<?php

namespace Database\Seeders;

// Import the necessary classes
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('12345678'),
            'usertype' => 'admin',
            'mapel' => 'pepeleg',
        ]);
    }
}