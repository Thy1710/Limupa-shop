<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // for ($i = 0; $i < 5; $i++) {
        //     categories::create([
        //         'name' => $faker->word,
        //         'description' => $faker->sentence
        //     ]);
        // }
    }
}
