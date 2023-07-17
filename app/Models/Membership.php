<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Jetstream\Membership as JetstreamMembership;

final class Membership extends JetstreamMembership
{
    use HasUlids;

    public $incrementing = true;
}
