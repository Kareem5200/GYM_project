<?php

namespace App\Http\Requests\AdminRequests;

use App\Rules\phone2CkechRule;
use App\Rules\phoneCkechRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'phone1'=>['required','regex:/^01[0125]{1}[0-9]{8}$/',Rule::unique('employees')->ignore($this->user()),new phoneCkechRule],
            'phone2'=>['nullable','regex:/^01[0125]{1}[0-9]{8}$/',Rule::unique('employees')->ignore($this->user()),new phone2CkechRule],
        ];
    }
}
