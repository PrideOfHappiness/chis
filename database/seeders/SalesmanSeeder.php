<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Salesman;

class SalesmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'userID' => 8,
                'alias' => 'IT',
                'status' => 'Active',
            ],
            [
                'userID' => 5,
                'alias' => 'SA',
                'status' => 'Active',
            ],
        ];

        foreach ($data as $value){
            Salesman::create($value);
        }
    }
}
