<?php

namespace Database\Seeders;

use App\Models\Warehouses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'warehouseIDs' => '787-400',
                'warehouseName' => 'Gudang Utama',
                'alamat' => 'Tes Alamat 1',
                'contact' => 'Admin Gudang Utama',
                'telepon' => '0218897785',
                'teleponHP' => '087760885598',
                'email' => 'admin@gudangchis.com',
                'status' => 'Active',
            ],
            [
                'warehouseIDs' => '787-900',
                'warehouseName' => 'Gudang 1',
                'alamat' => 'Tes Alamat 2',
                'contact' => 'Admin Gudang 1',
                'telepon' => '0218874475',
                'teleponHP' => '0857112554789',
                'email' => 'admingudang1@gudangchis.com',
                'status' => 'Active',
            ]
        ];

        foreach($data as $value){
            Warehouses::insert($value);
        }
    }
}
