<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [

            // ☕ COFFEE
            ['name' => 'Espresso', 'category' => 'Coffee', 'price' => 18000, 'status' => 'available'],
            ['name' => 'Americano', 'category' => 'Coffee', 'price' => 20000, 'status' => 'available'],
            ['name' => 'Cappuccino', 'category' => 'Coffee', 'price' => 23000, 'status' => 'available'],
            ['name' => 'Cafe Latte', 'category' => 'Coffee', 'price' => 24000, 'status' => 'available'],
            ['name' => 'Kopi Susu Gula Aren', 'category' => 'Coffee', 'price' => 25000, 'status' => 'available'],
            ['name' => 'Vietnam Drip', 'category' => 'Coffee', 'price' => 22000, 'status' => 'available'],
            ['name' => 'Cold Brew', 'category' => 'Coffee', 'price' => 26000, 'status' => 'available'],
            ['name' => 'Kopi Tubruk', 'category' => 'Coffee', 'price' => 15000, 'status' => 'available'],

            // 🧊 NON COFFEE
            ['name' => 'Es Teh Manis', 'category' => 'Non Coffee', 'price' => 8000, 'status' => 'available'],
            ['name' => 'Teh Tawar Panas', 'category' => 'Non Coffee', 'price' => 5000, 'status' => 'available'],
            ['name' => 'Teh Tarik', 'category' => 'Non Coffee', 'price' => 15000, 'status' => 'available'],
            ['name' => 'Matcha Latte', 'category' => 'Non Coffee', 'price' => 26000, 'status' => 'available'],
            ['name' => 'Chocolate Latte', 'category' => 'Non Coffee', 'price' => 25000, 'status' => 'available'],
            ['name' => 'Red Velvet Latte', 'category' => 'Non Coffee', 'price' => 26000, 'status' => 'available'],
            ['name' => 'Taro Latte', 'category' => 'Non Coffee', 'price' => 26000, 'status' => 'available'],
            ['name' => 'Lemon Tea', 'category' => 'Non Coffee', 'price' => 18000, 'status' => 'available'],
            ['name' => 'Lychee Tea', 'category' => 'Non Coffee', 'price' => 20000, 'status' => 'available'],
            ['name' => 'Air Mineral', 'category' => 'Non Coffee', 'price' => 6000, 'status' => 'available'],

            // 🥐 SNACK
            ['name' => 'Croissant', 'category' => 'Snack', 'price' => 18000, 'status' => 'available'],
            ['name' => 'Pain au Chocolat', 'category' => 'Snack', 'price' => 20000, 'status' => 'available'],
            ['name' => 'French Fries', 'category' => 'Snack', 'price' => 15000, 'status' => 'available'],
            ['name' => 'Donat Gula', 'category' => 'Snack', 'price' => 12000, 'status' => 'available'],
            ['name' => 'Singkong Goreng', 'category' => 'Snack', 'price' => 14000, 'status' => 'available'],
            ['name' => 'Pisang Goreng', 'category' => 'Snack', 'price' => 14000, 'status' => 'available'],
            ['name' => 'Roti Bakar Coklat Keju', 'category' => 'Snack', 'price' => 20000, 'status' => 'available'],
            ['name' => 'Tahu Crispy', 'category' => 'Snack', 'price' => 12000, 'status' => 'available'],

            // 🍽️ FOOD
            ['name' => 'Nasi Goreng', 'category' => 'Food', 'price' => 28000, 'status' => 'available'],
            ['name' => 'Mie Goreng', 'category' => 'Food', 'price' => 26000, 'status' => 'available'],
            ['name' => 'Mie Rebus', 'category' => 'Food', 'price' => 26000, 'status' => 'available'],
            ['name' => 'Rice Bowl Ayam', 'category' => 'Food', 'price' => 30000, 'status' => 'available'],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
