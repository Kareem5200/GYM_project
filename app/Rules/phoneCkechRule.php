<?php

namespace App\Rules;

use App\Models\Employee;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class phoneCkechRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {


        if($value == request()->phone2){
            $fail('Your phone numbers is same');
        }


        $phone1Exists = Employee::where('phone2','=',$value)->exists();
        if($phone1Exists){

                $fail('Your phone number 1 is already exists');

        }



     }
}
