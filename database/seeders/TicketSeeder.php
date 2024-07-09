<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('tickets')->insert([
                'customer_name' => $faker->name,
                'problem_description' => $faker->paragraph,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'reference_number' => Str::uuid()->toString(),
                'status' => $faker->randomElement(['open', 'closed']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
