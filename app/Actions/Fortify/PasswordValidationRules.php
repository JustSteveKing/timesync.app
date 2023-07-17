<?php

declare(strict_types=1);

namespace App\Actions\Fortify;

use Illuminate\Contracts\Validation\ValidationRule;
use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * @return array<int, ValidationRule|array|string>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password(), 'confirmed'];
    }
}
