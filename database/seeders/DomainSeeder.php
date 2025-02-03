<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DomainSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Domain::create([
                'for'            => $faker->randomElement(['company', 'customer']),
                'domain'         => $faker->unique()->domainName,
                'customer'       => $faker->name,
                'mobile'         => $faker->phoneNumber,
                'project'        => $faker->word,
                'purchase_date'  => $faker->dateTimeBetween('-1 years', 'now'),
                'renewal_date'   => $faker->dateTimeBetween('now', '+1 years'),
                'renewal_amount' => $faker->numberBetween(100, 1000),
                'hidden'         => $faker->boolean(20),
            ]);
        }
    }
}
