<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Operator',
                'nik' => '1462000179',
                'email' => 'operator@gmail.com',
                'role' => 'operator',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Keuangan',
                'nik' => '1462000111',
                'email' => 'keuangan@gmail.com',
                'role' => 'keuangan',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'marketing',
                'nik' => '1462000112',
                'email' => 'marketing@gmail.com',
                'role' => 'marketing',
                'password' => bcrypt('123456'),
            ],
        ];
        foreach ($user as $key => $val) {
            User::create($val);
        }
    }
}
