<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Gaming Headset',
                'price' => 350000,
                'image' => 'images/headset.jpg',
                'description' => 'High quality gaming headset.',
                'quantity' => 10,
                'category_id' => 1,
            ],
            [
                'name' => 'Mechanical Keyboard',
                'price' => 550000,
                'image' => 'images/keyboard.jpg',
                'description' => 'RGB mechanical keyboard.',
                'quantity' => 7,
                'category_id' => 1,
            ],
            [
                'name' => 'Action Figure – Hero',
                'price' => 150000,
                'image' => 'images/action_figure.jpg',
                'description' => 'Collectible hero action figure.',
                'quantity' => 12,
                'category_id' => 2,
            ],
        ]);
    }
}