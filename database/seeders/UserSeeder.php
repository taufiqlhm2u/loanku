<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        User::create([
            'name' => 'Johan Nasr',
            'email' => 'john@f.com',
            'password' => Hash::make('john'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Allie Copper',
            'email' => 'allie@gmail.com',
            'password' => Hash::make('allie'),
            'role' => 'staff'
        ]);

        for ($a = 1; $a <= 8; $a++) {
             User::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'password' => Hash::make('1234'),
            'role' => 'borrower'
        ]);
        }
        
    }
}
