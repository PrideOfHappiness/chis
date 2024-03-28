<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserAccess;

class UserAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_access' => 'Master',
            ],
            [
                'user_access' => 'Super Admin',
            ],
            [
                'user_access' => 'Admin',
            ],
            [
                'user_access' => 'Warehouse',
            ],
            [
                'user_access' => 'Sales',
            ],
            [
                'user_access' => 'Production',
            ],
            [
                'user_access' => 'Finance',
            ],
            [
                'user_access' => 'Back Office',
            ],
            [
                'user_access' => 'Admin Gudang',
            ],
            [
                'user_access' => 'Warehouse 2',
            ],    
        ];

        foreach($data as $value){
            UserAccess::create($value);
        }
    }
}
