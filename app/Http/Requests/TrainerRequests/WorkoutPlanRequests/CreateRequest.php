<?php

namespace App\Http\Requests\TrainerRequests\WorkoutPlanRequests;

use App\Rules\daysCheck;
use App\Models\Membership;
use App\Rules\muscleCheck;
use App\Models\WorkoutPlan;
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
            'muscle'=>['required',new muscleCheck],
            'days'=>['required',new daysCheck],
            'plan'=>['required','string'],
            'start_date'=>['required','date','after_or_equal:'.now(),'before_or_equal:'.now()->addDays(10)],
            'end_date'=>['required','date','after:start_date'],
        ];
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            $trainer_id = auth()->guard('employees')->id();
            $user_id=$this->route('user_id');

            //Check if plan exists
            $plan_Exists = WorkoutPlan::where(['trainer_id'=> $trainer_id,'user_id'=>$user_id,'days'=>$this->days])
                            ->where('end_date','>=',now())->exists();

            //To check the end date of plan not after the date of membership
            $membership = Membership::where(['trainer_id'=> $trainer_id,'user_id'=>$user_id])->activeMembership()
                              ->category('workoutPlan')->first();


            
            if($plan_Exists){
                return $validator->errors()->add('days','The user has plan at this day');

            }


            if($this->end_date > $membership->end_date){
                return $validator->errors()->add('end_date','End date is after user membership end date');
            }
        });

    }
}
