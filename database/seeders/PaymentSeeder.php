<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 15; $i++) {
            Payment::create([
                'domain' => $faker->domainName,
                'customer' => $faker->name,
                'mobile' => $faker->phoneNumber,
                'amount' => $faker->randomFloat(2, 10, 500),
                'type' => random_int(0, 1) ? 'domain' : 'server',
                'date' => Carbon::now()->subDays(rand(1, 365)),
                'renewal' => $faker->randomElement(['1 month', '1 year', '2 months']),
                'status' => $faker->randomElement(['pending', 'completed', 'failed']),
            ]);
        }
    }
}
