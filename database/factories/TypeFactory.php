<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Team;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

final class TypeFactory extends Factory
{
    protected $model = Type::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'team_id' => Team::factory(),
        ];
    }
}
