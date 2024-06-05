<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recruit>
 */
class RecruitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'company_id' => Company::factory()
        ];
    }
}
