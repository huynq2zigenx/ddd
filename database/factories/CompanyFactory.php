<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'industry' => $this->faker->word(),
            'logo' => $this->faker->imageUrl(),
            'description' => $this->faker->realText(maxNbChars: 1_500),
            'urls' => null,
            'user_id' => User::factory(),
        ];
    }
}
