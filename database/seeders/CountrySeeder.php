<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

use Faker\Factory as Fake; 

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Fake::create();
        for ($i=0; $i < 15 ; $i++) { 
            $country = new Country;
            $country->country = $faker->country;
            $country->save();
        }
    }
}
