<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'code' => '1234',
                'userName' => 'master123',
                'perusahaan' => 'PT. CHIS',
                'nama' => 'Tes Master Data',
                'branch' => 'master',
                'department' => 'Master',
                'user_access' => 1,
                'status' => 'Active',
                'email' => 'master@test.com',
                'password' => bcrypt('master1234567'),
            ],
            [
                'code' => '1475',
                'userName' => 'admin123',
                'nama' => 'Tes Admin Data',
                'branch' => 'Admin',
                'perusahaan' => 'PT. CHIS',
                'department' => 'Admin',
                'user_access' => 3,
                'status' => 'Active',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin1234567'),
            ],
            [
                'code' => '2369',
                'userName' => 'superadmin123',
                'nama' => 'Tes Super Admin Data',
                'branch' => 'Admin',
                'perusahaan' => 'PT. CHIS',
                'department' => 'Admin',
                'user_access' => 2,
                'status' => 'Active',
                'email' => 'superadmin@test.com',
                'password' => bcrypt('superadmin1234567'),
            ],
            [
                'code' => '1596',
                'userName' => 'warehouse',
                'nama' => 'Warehouse',
                'branch' => 'pusat',
                'perusahaan' => 'PT. CHIS',
                'department' => 'Warehouse',
                'user_access' => 4,
                'status' => 'Active',
                'email' => 'warehouse@test.com',
                'password' => bcrypt('warehouse1234567'),
            ],
            [
                'code' => '3214',
                'userName' => 'sales123',
                'nama' => 'Sales',
                'branch' => 'pusat',
                'perusahaan' => 'PT. CHIS',
                'department' => 'Sales',
                'user_access' => 5,
                'status' => 'Active',
                'email' => 'sales@test.com',
                'password' => bcrypt('sales1234567'),
            ],
            [
                'code' => '4789',
                'userName' => 'production123',
                'nama' => 'Production',
                'branch' => 'pusat',
                'perusahaan' => 'PT. CHIS',
                'department' => 'Production',
                'user_access' => 6,
                'status' => 'Active',
                'email' => 'production@test.com',
                'password' => bcrypt('superadmin1234567'),
            ],
            [
                'code' => '6357',
                'userName' => 'finance123',
                'nama' => 'Finance',
                'branch' => 'pusat',
                'perusahaan' => 'PT. CHIS',
                'department' => 'Finance',
                'user_access' => 7,
                'status' => 'Active',
                'email' => 'finance@test.com',
                'password' => bcrypt('finance1234567'),
            ],
        ];

        foreach($data as $value){
            User::create($value);
        }
    }
}
