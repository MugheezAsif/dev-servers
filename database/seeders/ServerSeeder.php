<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ServerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 8; $i++) {
            Server::create([
                'for'            => $faker->randomElement(['company', 'customer']),
                'domain'         => $faker->unique()->domainName,
                'name'          => $faker->word,
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
