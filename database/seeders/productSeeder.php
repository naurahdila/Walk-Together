<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk kategori Beasiswa
        DB::table('products')->insert([
            [
                'name_product' => 'Beasiswa S1 Teknologi',
                'description' => 'Beasiswa untuk program S1 di bidang Teknologi Informasi.',
                'price' => 25000,  // Gratis
                'kategori' => 'beasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Beasiswa Master Manajemen',
                'description' => 'Beasiswa program Master untuk jurusan Manajemen.',
                'price' => 30000,  // Gratis
                'kategori' => 'beasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Beasiswa S2 Kedokteran',
                'description' => 'Beasiswa S2 untuk jurusan Kedokteran di universitas ternama.',
                'price' => 40000,  // Gratis
                'kategori' => 'beasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Seeder untuk kategori Magang
        DB::table('products')->insert([
            [
                'name_product' => 'Magang di Google',
                'description' => 'Program magang di Google untuk mahasiswa jurusan TI.',
                'price' => 500000,  // Contoh harga
                'kategori' => 'magang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Magang di Facebook',
                'description' => 'Magang di Facebook dengan kesempatan belajar banyak bidang teknologi.',
                'price' => 400000,  // Contoh harga
                'kategori' => 'magang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Magang di Tokopedia',
                'description' => 'Program magang di Tokopedia untuk jurusan Manajemen dan TI.',
                'price' => 300000,  // Contoh harga
                'kategori' => 'magang',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Seeder untuk kategori Lomba
        DB::table('products')->insert([
            [
                'name_product' => 'Lomba Coding Nasional',
                'description' => 'Lomba coding untuk tingkat nasional dengan hadiah uang tunai.',
                'price' => 0,  // Gratis
                'kategori' => 'lomba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Lomba Desain Grafis',
                'description' => 'Lomba desain grafis dengan tema "Teknologi Masa Depan".',
                'price' => 50000,  // Gratis
                'kategori' => 'lomba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Lomba Debate Nasional',
                'description' => 'Lomba debat antar universitas dengan tema sosial dan politik.',
                'price' => 50000,  // Gratis
                'kategori' => 'lomba',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Seeder untuk kategori Fresh Graduate
        DB::table('products')->insert([
            [
                'name_product' => 'Karir Fresh Graduate - Software Engineer',
                'description' => 'Kesempatan bekerja untuk fresh graduate sebagai Software Engineer.',
                'price' => 7000000,  // Contoh harga
                'kategori' => 'freshgraduate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Karir Fresh Graduate - Data Analyst',
                'description' => 'Peluang karir untuk fresh graduate di bidang Data Analysis.',
                'price' => 6500000,  // Contoh harga
                'kategori' => 'freshgraduate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Karir Fresh Graduate - Digital Marketing',
                'description' => 'Lowongan pekerjaan untuk fresh graduate di bidang Digital Marketing.',
                'price' => 6000000,  // Contoh harga
                'kategori' => 'freshgraduate',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Seeder untuk kategori Mapres
        DB::table('products')->insert([
            [
                'name_product' => 'Mapres Nasional - S1 Teknik Informatika',
                'description' => 'Mapres untuk mahasiswa S1 Teknik Informatika di universitas nasional.',
                'price' => 0,  // Gratis
                'kategori' => 'mapres',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Mapres Universitas Jakarta',
                'description' => 'Pemilihan Mapres Universitas Jakarta untuk mahasiswa berbagai jurusan.',
                'price' => 40000,  // Gratis
                'kategori' => 'mapres',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Mapres Nasional - S2 Manajemen',
                'description' => 'Mapres Nasional untuk program S2 Manajemen.',
                'price' => 30000,  // Gratis
                'kategori' => 'mapres',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Seeder untuk kategori Kewirausahaan
        DB::table('products')->insert([
            [
                'name_product' => 'Kewirausahaan - Kursus Bisnis Online',
                'description' => 'Kursus bisnis online untuk mengembangkan keterampilan wirausaha.',
                'price' => 1500000,  // Contoh harga
                'kategori' => 'kewirausahaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Kewirausahaan - Workshop Startup',
                'description' => 'Workshop untuk membangun startup yang sukses.',
                'price' => 2000000,  // Contoh harga
                'kategori' => 'kewirausahaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Kewirausahaan - Mentoring Bisnis',
                'description' => 'Sesi mentoring bisnis untuk memulai usaha dengan sukses.',
                'price' => 2500000,  // Contoh harga
                'kategori' => 'kewirausahaan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
