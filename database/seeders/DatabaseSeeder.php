<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario de prueba original
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'cliente', // Asigna un rol también aquí
        ]);

        // Nuevos usuarios con roles específicos
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'administrador',
        ]);

        User::create([
            'name' => 'Cajero User',
            'email' => 'cajero@example.com',
            'password' => Hash::make('password'),
            'role' => 'cajero',
        ]);

        User::create([
            'name' => 'Cocinero User',
            'email' => 'cocinero@example.com',
            'password' => Hash::make('password'),
            'role' => 'cocinero',
        ]);

        User::create([
            'name' => 'Cliente User',
            'email' => 'cliente@example.com',
            'password' => Hash::make('password'),
            'role' => 'cliente',
        ]);
    }
}
