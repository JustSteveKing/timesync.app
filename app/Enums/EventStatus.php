<?php

declare(strict_types=1);

namespace App\Enums;

enum EventStatus: string
{
    case CONFIRMED = 'confirmed';
    case CANCELED = 'canceled';
    case TENTATIVE = 'tentative';
}
