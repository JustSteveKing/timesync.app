<?php

declare(strict_types=1);

namespace App\Exceptions;

use Crell\ApiProblem\ApiProblem;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JustSteveKing\Tools\Http\Enums\Status;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

final class Handler extends ExceptionHandler
{
    /**
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {

        $this->renderable(
            renderUsing: function (NotFoundHttpException|RouteNotFoundException $exception, Request $request): JsonResponse {
                $problem = new ApiProblem(
                    title: 'Endpoint Not Found',
                    type: 'https://some-url.com/docs/problems/endpoint-not-found',
                );

                $problem->setInstance(
                    instance: $request->path(),
                )->setDetail(
                    detail: 'Could not find anything for the provided URL.',
                );

                return new JsonResponse(
                    data: $problem,
                    status: Status::NOT_FOUND->value,
                    headers: ['Content-Type' => 'application/problem+json']
                );
            },
        );

        $this->renderable(function (AuthenticationException $exception, Request $request): JsonResponse {
            $problem = new ApiProblem(
                title: 'Unauthorized',
                type: 'https://some-url.com/docs/problems/unauthorized',
            );

            $problem->setInstance(
                instance: $request->path(),
            )->setDetail(
                detail: 'Authorization tokens were either missing or invalid. Please refer to the API documentation to see how to use Authorization tokens.',
            );

            return new JsonResponse(
                data: $problem,
                status: Status::UNAUTHORIZED->value,
                headers: ['Content-Type' => 'application/problem+json'],
            );
        });

        $this->reportable(function (Throwable $e): void {

        });
    }
}
