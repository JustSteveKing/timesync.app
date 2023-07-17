<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Health\CheckController;
use Illuminate\Support\Facades\Route;

Route::get('/', CheckController::class)->name('health:check');
