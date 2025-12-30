<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
                // Panggil seeder users jika ada
                // UserSeeder::class, 

                // Panggil seeder AdminUserSeeder yang baru kita buat
            AdminUserSeeder::class,

                // Seeder untuk data master
            PangwasSeeder::class,
            TematikSeeder::class,
            PurchaseOrderSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}