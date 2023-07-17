<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Type extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'team_id',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(
            related: Team::class,
            foreignKey: 'team_id',
        );
    }
}
