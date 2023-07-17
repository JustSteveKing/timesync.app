<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

final class Participant extends Model
{
    use HasFactory;
    use HasUlids;
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'preferred_name',
        'pronouns',
        'email',
        'company',
        'phone',
    ];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Event::class,
            table: 'event_participant',
        );
    }
}
