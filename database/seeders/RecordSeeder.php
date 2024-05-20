<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        foreach (range(1, 200) as $index) {
            DB::table('records')->insert([
                'description' => $faker->name,
                'user_id' => 2,
                'category_id' => $faker->numberBetween(1,8),
                'amount' => $faker->numberBetween(25000,3000000),
                'date' => $faker->dateTimeBetween('-1 years'),
            ]);
        }

    }
}
