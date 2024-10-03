<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\Country; 
use Faker\Factory as Fake;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake::create();
        $countryIds = Country::pluck('id')->toArray();

        for ($i=0; $i < 25 ; $i++) { 
            $state = new State;
            $state->country_id = $faker->randomElement($countryIds);
            $state->state = $faker->state;
            $state->save();
        }
    }
}
