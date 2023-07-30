<?php

namespace Database\Seeders;

use App\Models\Pusat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PusatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 1; $i <= 30; $i++){
        Pusat::insert([
            [
                'name' => $faker->city()
            ],
        ]);
    }
    }
}
