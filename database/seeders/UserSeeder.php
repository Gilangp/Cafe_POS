<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Coffee',
                'email' => 'admin@coffee.test',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'Kasir Pagi',
                'email' => 'kasir1@coffee.test',
                'password' => Hash::make('password'),
                'role' => 'kasir',
                'status' => 'active',
            ],
            [
                'name' => 'Kasir Siang',
                'email' => 'kasir2@coffee.test',
                'password' => Hash::make('password'),
                'role' => 'kasir',
                'status' => 'active',
            ],
            [
                'name' => 'Kasir Malam',
                'email' => 'kasir3@coffee.test',
                'password' => Hash::make('password'),
                'role' => 'kasir',
                'status' => 'inactive', // contoh non-aktif
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
