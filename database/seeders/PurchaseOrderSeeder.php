<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'purchaseOrderNo' => '24/04/0097-PO',
                'version' => 1,
                'PODate' => now(),
                'supplier' => 'SUP-00001',
                'status' => 'PO Accepted',
            ],
            [
                'purchaseOrderNo' => '24/04/0096-PO',
                'version' => 1,
                'PODate' => now(),
                'supplier' => 'SUP-00001',
                'status' => 'PO Accepted',
            ],
        ];

        foreach($data as $value){
            PurchaseOrder::create($value);
        }
    }
}
