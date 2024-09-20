<?php

namespace App\Http\Requests\EmployeeRequests\TrainerRequests\NutrationPlanRequests;

use App\Rules\daysCheck;
use App\Rules\mealCheck;
use App\Models\Membership;
use App\Models\NutrationPlan;
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
            'meal'=>['required',new mealCheck],
            'days'=>['required',new daysCheck],
            'plan'=>['required','string'],
            'supplements'=>['nullable','string','max:255'],
            'start_date'=>['required','date','after_or_equal:'.now(),'before_or_equal:'.now()->addDays(10)],
            'end_date'=>['required','date','after:start_date'],
        ];
    }


    public function withValidator($validator){
        
        $validator->after(function($validator){

            //To cannot add the exists meal except snacks
            if($this->meal != 'snacks'){
                $user_id = $this->route('user_id');
                $meal_exists = NutrationPlan::activeNutrationPlan()->where(['user_id'=>$user_id,'days'=>$this->days,'meal'=>$this->meal])->exists();

                if($meal_exists){
                    return $validator->errors()->add('meal','Meal exists');
                }

            }

            //To check plan end date no be after membership date
            $membership = Membership::where(['trainer_id'=> auth()->guard('employees')->id(),'user_id'=>$user_id])->activeMembership()->category('nutrationPlan')->first();
            if($this->end_date > $membership->end_date){

                return $validator->errors()->add('end_date','End date is after user membership end date');
            }

        });
    }
}
