<?php

namespace App\Http\Requests\AdminRequests\MembershipRequests;

use App\Rules\userExists;
use App\Models\Membership;
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
    public function withValidator($validator){
        $validator->after(function($validator){

            $membership_exists = Membership::where(['user_id'=>$this->user_id,'department_id'=>$this->department_id])
                                ->activeMembership()->category('withoutPlans')->exists();

            if($membership_exists){
            return $validator->errors()->add('user_id','This user has active membership');
            }
        });
    }
}
