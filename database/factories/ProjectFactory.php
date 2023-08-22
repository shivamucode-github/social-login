<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->lastName(),
            'created_by' => 1,
            'modified_by' => 1,
            'slug' => Random::generate(6,'a-z'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
