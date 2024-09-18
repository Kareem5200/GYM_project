<?php

namespace App\Http\Requests\EmployeeRequests\TrainerRequests\WorkoutPlanRequests;

use App\Rules\daysCheck;
use App\Rules\muscleCheck;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'muscle'=>['required',new muscleCheck],
            'days'=>['required',new daysCheck],
            'plan'=>['required','string'],
            'start_date'=>['required','date','after_or_equal:'.now(),'before_or_equal:'.now()->addDays(10)],
            'end_date'=>['required','date','after:start_date'],
        ];
    }
}
