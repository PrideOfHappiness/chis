<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'customerIDs' => '982501',
                'code' => '7.7',
                'customerName' => 'Tes Customer 1',
                'alamat' => 'Tes Alamat Customer',
                'contact' => 'Contact 1',
                'telepon' => '0271851222',
                'teleponHP' => '085700088832',
                'teleponFax' => '0271851587',
                'telepon2' => null,
                'teleponHP2' => null,
                'teleponFax2' => null,
                'telepon3' => null,
                'teleponHP3' => null,
                'teleponFax3' => null,
                'email' => 'tesemail@gmail.com',
                'kota' => 'Jakarta Barat',
                'area' => 'Jabodetabek ',
                'status' => 'Active',
                'statusPKP' => 'No',
                'userIDSales' => 2,
                'deliveryAddress' => 'Tes ALamat Pengiriman 1',
                'bayarPer' => 'Lump Sum',
            ],
            [
                'customerIDs' => '857225',
                'code' => '8.8',
                'customerName' => 'Tes Customer 2',
                'alamat' => 'Tes Alamat Customer 2',
                'contact' => 'Contact 2',
                'telepon' => '031878898',
                'teleponHP' => '085700088831',
                'teleponFax' => '031874815',
                'telepon2' => null,
                'teleponHP2' => null,
                'teleponFax2' => null,
                'telepon3' => null,
                'teleponHP3' => null,
                'teleponFax3' => null,
                'email' => 'tesemail@gmail.com',
                'kota' => 'Surabaya',
                'area' => 'Jawa Timur ',
                'status' => 'Active',
                'statusPKP' => 'No',
                'userIDSales' => 1,
                'deliveryAddress' => 'Tes ALamat Pengiriman 2',
                'bayarPer' => 'Lump Sum',
            ],
        ];

        foreach($data as $value){
            Customers::create($value);
        }
    }
}
