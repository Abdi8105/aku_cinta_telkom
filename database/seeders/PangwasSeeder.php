<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PangwasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pangwas = [
            ['nama_pangwas' => 'Budi Santoso'],
            ['nama_pangwas' => 'Siti Nurhaliza'],
            ['nama_pangwas' => 'Ahmad Fauzi'],
            ['nama_pangwas' => 'Dewi Lestari'],
            ['nama_pangwas' => 'Rudi Hermawan'],
        ];

        foreach ($pangwas as $data) {
            DB::table('pangwas')->insert([
                'nama_pangwas' => $data['nama_pangwas'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
