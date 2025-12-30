<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TematikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tematik = [
            ['nama_tematik' => 'Infrastruktur Jaringan'],
            ['nama_tematik' => 'Digitalisasi Layanan'],
            ['nama_tematik' => 'Keamanan Siber'],
            ['nama_tematik' => 'Optimasi Bandwidth'],
            ['nama_tematik' => 'Modernisasi Perangkat'],
        ];

        foreach ($tematik as $data) {
            DB::table('tematik')->insert([
                'nama_tematik' => $data['nama_tematik'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
