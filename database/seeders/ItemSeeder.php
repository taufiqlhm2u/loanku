<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $items = [
            "Smartphone Galaxy A15",
            "Laptop Asus VivoBook 14",
            "Buku Dasar-Dasar Pemrograman",
            "Buku Manajemen Waktu untuk Pelajar",
            "Obeng Set Serbaguna 12 in 1",
            "Bor Listrik Mini 350W",
            "Meja Belajar Kayu Minimalis",
            "Kursi Kantor Ergonomis",
            "Bola Sepak Standar FIFA",
            "Raket Badminton Carbon Pro"
        ];

        $category = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5];

        for ($a = 0; $a < 10; $a++) {
            Item::create([
                'category_id' => $category[$a],
                'code' => uniqid(),
                'name' => $items[$a],
                'condition' => 'Good',
                'stock' => 5
            ]);
        }
    }
}
