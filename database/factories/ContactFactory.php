<?php

namespace Database\Factories;

use App\DataObjects\Name;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        $userName = $this->faker->userName();

        return [
            'name' => [
                'first ' => $this->faker->firstName(),
                'middle ' => $this->faker->firstName(),
                'last ' => $this->faker->lastName()
            ],
            'gender' => null,
            'email' => $this->faker->email(),
            'socials' => [
                'twiiter' => $userName,
                'youtube' => $userName
            ],
            'user_id' => User::factory(),
            'company_id' => null
        ];
    }
}
