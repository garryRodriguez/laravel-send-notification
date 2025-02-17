<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\factory::create();
        for($i = 0; $i < 20; $i++){
            Book::create([
                'name' => $faker->sentence,
                'author' => $faker->name,
                'publish_date' => $faker->date,
            ]);
        }
    }
}
