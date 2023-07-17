<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use JustSteveKing\Tools\Http\Enums\Status;

final class MessageResponse implements Responsable
{
    public function __construct(
        private readonly string $message,
        private readonly Status $status = Status::OK,
    ) {}

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: [
                'message' => $this->message,
            ],
            status: $this->status->value,
            headers: [
                'Content-Type' => 'application/vnd.api+json',
            ],
        );
    }
}
