<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;
use Faker\Factory as Fake;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake::create();
        $stateIds = State::pluck('id')->toArray();
        for ($i=0; $i < 45 ; $i++) { 
            $city = new City;
            $city->state_id = $faker->randomElement($stateIds);
            $city->city = $faker->city;
            $city->save();
        }
    }
}
