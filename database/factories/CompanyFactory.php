<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'created_by' => User::all()->pluck('id')->random(),
            'modified_by' => User::all()->pluck('id')->random(),
            'slug' => Random::generate(6,'a-z'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
