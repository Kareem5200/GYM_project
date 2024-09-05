<?php

namespace App\Http\Requests\EmployeeRequests\MembershipRequests;

use App\Rules\userExists;
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
            'user_id'=>['required','numeric','min:1',new userExists],
            'department_id'=>['required'],
            'category_id'=>['required'],
            'start_date'=>['required','date','after_or_equal:'.now()->subDays(10),'before_or_equal:'.now()],
        ];
    }
}
