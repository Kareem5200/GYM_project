<?php

namespace App\Http\Requests\AdminRequests;

use App\Rules\phoneCkechRule;
use App\Rules\phone2CkechRule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255','unique:employees'],
            'password'=>['required','confirmed',Password::min(8)->mixedCase()->numbers()],
            'image'=>['required','image','mimes:png,jpg,jpeg','max:2048'],
            'secret_key'=>['required','string','max:255'],
            'phone1'=>['required','string','regex:/^01[0125]{1}[0-9]{8}$/','unique:employees',new phoneCkechRule],
            'phone2'=>['nullable','string','regex:/^01[0125]{1}[0-9]{8}$/','unique:employees',new phone2CkechRule],
            'gender'=>['required'],
            'birth_date'=>['required','date'],
            'department-id'=>['nullable'],
        ];
    }
}
