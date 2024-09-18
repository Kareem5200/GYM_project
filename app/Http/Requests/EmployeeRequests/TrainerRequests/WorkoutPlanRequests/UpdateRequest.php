<?php

namespace App\Http\Requests\EmployeeRequests\TrainerRequests\WorkoutPlanRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'plan'=>['required','string'],
            'start_date'=>['nullable','date','after_or_equal:'.now(),'before_or_equal:'.now()->addDays(10)],
            'end_date'=>['nullable','date','after:start_date'],
        ];
    }
}
