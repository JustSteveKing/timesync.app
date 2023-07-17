<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Health;

use App\Http\Responses\MessageResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

final class CheckController
{
    public function __invoke(Request $request): Responsable
    {
        return new MessageResponse(
            message: 'Service Online.',
        );
    }
}
