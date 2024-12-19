<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menjalankan seeder untuk Role, AdminUser, dan Product
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            ProductSeeder::class, // Pastikan nama class sesuai
        ]);

        // Membuat user secara manual (contoh)
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2
        ]);
    }
}
