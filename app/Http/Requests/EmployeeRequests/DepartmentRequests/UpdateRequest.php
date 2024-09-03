<?php

namespace App\Http\Requests\EmployeeRequests\DepartmentRequests;

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
            'period'=>['required','string','max:255'],
            'image'=>['nullable','image','mimes:png,jpg,jpeg','max:2048'],
        ];
    }
}
