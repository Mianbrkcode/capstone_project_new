<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = '2023-10-10';
        $endDate = '2024-01-10';

        return [
        'uid' => fake()->numberBetween('1' , '100'),
        'dateandTime' => fake()->dateTimeBetween($startDate, $endDate)->format('Y-m-d'),
        'emergency_type' => fake()->randomElement(['Medical','Fire','Crime','Accident']),
        'resident_name' => fake()->name(),
        'locationName' => fake()->address(),
        'LocationLink' => fake()->url(),
        'phoneNumber' => fake()->phoneNumber(),
        'message' => fake()->paragraph(),
        'imageEvidence' => fake()->imageUrl('https://picsum.photos/200'),
        'status' => fake()->randomElement(['1','0']),
        'responder_name' => fake()->name(),
        'userfrom' => fake()->randomElement(['MDRRMO','PNP','CAY POMBO','BFP']),
        'residentProfile' => fake()->imageUrl('https://picsum.photos/200')
        ];
    }
}
