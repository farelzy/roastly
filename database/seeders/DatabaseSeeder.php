<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->updateOrInsert([
            'name' => 'Test User',
            'email' => 'lala@example.com',
        ]);

        // Admin user
        User::updateOrInsert([
            'name' => 'Admin',
            'email' => 'haiiiii@toko.com',
            'password' => Hash::make('123'), // Ganti password ini 
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        // Pelanggan user
        User::create([
            'name' => 'agnes',
            'email' => 'agnes@gmail.com',
            'password' => Hash::make('123'), // Ganti password ini 
            'email_verified_at' => now(),
            'role' => 'costumer',
        ]);

        $this->call([
            KategoriSeeder::class,
            ToppingSeeder::class,
            DrinkSeeder::class,
        ]);
    }
}
