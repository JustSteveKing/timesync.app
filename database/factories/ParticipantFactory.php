<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ParticipantFactory extends Factory
{
    protected $model = Participant::class;

    public function definition(): array
    {
        return [
            'first_name' => $name = $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'preferred_name' => $name,
            'pronouns' => $this->faker->randomElement([
                'he/him',
                'she/her',
                'they/them',
            ]),
            'email' => $this->faker->unique()->email(),
            'company' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
