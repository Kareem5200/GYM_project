<?php

namespace App\Http\Requests\AdminRequests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransformationRequest extends FormRequest
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
            'image_before'=>['required','image','mimes:png,jpg,jpeg'],
            'image_after'=>['required','image','mimes:png,jpg,jpeg'],
            'period'=>['required','string','max:255','regex:/^[1-9][0-9]? (Months|Month)$/'],
        ];
    }
}
