<?php

namespace App\Http\Requests\TrainersRequests;

use App\Models\Qualification;
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
            'certification'=>['required','string'],
            'certification_date'=>['required','date','before_or_equal:'.now()],
            'image'=>['required','image','mimes:png,jpg,jpeg','max:2048'],
        ];
    }

    public function withValidator($validator){

        $validator->after(function($validator){
            $trainer_id = $this->route('trainer_id');
            $qualification_exists = Qualification::where(['trainer_id'=>$trainer_id,'certification'=>$this->certification])->exists();

            if($qualification_exists){

                 return $validator->errors()->add('certification','The certification exists');
            }
        });

    }
}
