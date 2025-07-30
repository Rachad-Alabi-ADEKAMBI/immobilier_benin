<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'phone' => '019628866', // mets un numéro fictif valide
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // ou Hash::make('password')
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
    }
}
