<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use APP\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $random_id = '222' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $random_number = '0' . str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        $classes = ['SK1A', 'SK2A', 'SK3A', 'SE1A', 'SE2A', 'IE1A', 'IE2A', 'IE3A', 'IE4A'];
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'studentID' =>  '222' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
                'telnum' => $random_number,
                'class' => $classes[array_rand($classes)],
                'status' => 0

            ]);
        }
    }
}
