<?php

namespace App\Rules;

use Closure;
use App\Models\Employee;
use Illuminate\Contracts\Validation\ValidationRule;

class phone2CkechRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $phone2Exists = Employee::where('phone1','=',$value)->exists();
        if($phone2Exists){

            $fail('Your phone number 2 is already exists');

        }
    }
}
