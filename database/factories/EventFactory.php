<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\EventStatus;
use App\Models\Event;
use App\Models\Team;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'status' => EventStatus::TENTATIVE,
            'summary' => $this->faker->paragraphs(nb: 160),
            'meeting' => $this->faker->url(),
            'timezone' => $this->faker->timezone(),
            'agenda' => $this->faker->paragraphs(asText: true),
            'user_id' => User::factory(),
            'team_id' => Team::factory(),
            'type_id' => Type::factory(),
            'starts_at' => $start = Carbon::parse($this->faker->dateTime()),
            'ends_at' => $start->addHours($this->faker->numberBetween(1, 6)),
        ];
    }
}
