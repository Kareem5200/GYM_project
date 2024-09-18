<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class muscleCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $muscles = ['chest','back','biceps','triceps','shoulders','legs','arms','back_biceps','back_triceps','chest_biceps','chest_triceps','chest_back','shoulder_legs','chest_triceps_shoulder','back_biceps_shoulder'];
        if(!in_array($value,$muscles)){
            $fail('Invalid muscle');
        }
    }
}
