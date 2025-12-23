<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = ['Electronics', 'Books & documnents', 'Tools & Equipment', 'Furniture', 'Sports Equipment'];
       for ($a = 0; $a < 5; $a++) {
         Category::create([
            'name' => $c[$a]
        ]);
       }
    }
}
