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
            'email' => 'ilya@gmail.com',
            'password' => '12345678',
            'usertype' => 'admin',
            'mapel' => 'Bahasa',
        ]);
    }
}
