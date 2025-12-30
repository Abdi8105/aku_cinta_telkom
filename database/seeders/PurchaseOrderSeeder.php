<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $purchaseOrders = [
            ['no_po' => 'PO/2024/12/001'],
            ['no_po' => 'PO/2024/12/002'],
            ['no_po' => 'PO/2024/12/003'],
            ['no_po' => 'PO/2024/12/004'],
            ['no_po' => 'PO/2024/12/005'],
        ];

        foreach ($purchaseOrders as $data) {
            DB::table('purchase_order')->insert([
                'no_po' => $data['no_po'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
