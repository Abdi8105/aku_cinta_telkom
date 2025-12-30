<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'lokasi' => 'Jakarta Pusat',
                'deskripsi' => 'Instalasi fiber optik untuk gedung perkantoran',
            ],
            [
                'lokasi' => 'Bandung',
                'deskripsi' => 'Upgrade infrastruktur jaringan telekomunikasi',
            ],
            [
                'lokasi' => 'Surabaya',
                'deskripsi' => 'Pemasangan tower BTS baru',
            ],
            [
                'lokasi' => 'Makassar',
                'deskripsi' => 'Modernisasi sistem komunikasi kantor regional',
            ],
            [
                'lokasi' => 'Medan',
                'deskripsi' => 'Implementasi jaringan 5G area perkotaan',
            ],
        ];

        foreach ($projects as $data) {
            DB::table('project')->insert([
                'lokasi' => $data['lokasi'],
                'deskripsi' => $data['deskripsi'],
                'ts' => now(),
            ]);
        }
    }
}
