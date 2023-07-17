<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Event extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'title',
        'status',
        'summary',
        'meeting',
        'timezone',
        'agenda',
        'user_id',
        'team_id',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'status' => EventStatus::class,
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function host(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(
            related: Team::class,
            foreignKey: 'team_id',
        );
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Participant::class,
            table: 'event_participant',
        );
    }
}
