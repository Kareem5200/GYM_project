<?php

namespace App\Http\Requests\TrainerRequests\WorkoutPlanRequests;

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
            'start_date'=>['nullable','date','after_or_equal:'.now()->toDateString(),'before_or_equal:'.now()->addDays(10)->toDateString()],
            'end_date'=>['nullable','date','after:start_date'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $nutration_plan = $this->route('nutrationPlan');
            if ($this->end_date && $this->end_date <= $nutration_plan->start_date) {
                $validator->errors()->add('end_date', 'The new end date is before or equal to the old start date');
            }
        });
    }
}
