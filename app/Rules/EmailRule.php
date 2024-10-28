<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Регулярное выражение для проверки формата email
        return preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $value);
    }

    public function message()
    {
        return 'The :attribute is not a valid email address.';
    }
}
