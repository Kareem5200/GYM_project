<?php

namespace App\Http\Requests\AdminRequests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'facebook'=>['nullable','url'],
            'instgram'=>['nullable','url'],
            'youtube'=>['nullable','url'],
            'X'=>['nullable','url'],
            'address'=>['required','string','max:255'],
            'phone1'=>['required','regex:/^01[0125]{1}[0-9]{8}$/'],
            'admins_key'=>['required','string'],
            'trainers_key'=>['required','string'],
        ];
    }
}
