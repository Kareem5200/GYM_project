<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkoutPlan extends Model
{
    use HasFactory;

    protected $table='workout_plan';

    protected $fillable = [
        'muscle',
        'days',
        'plan',
        'start_date',
        'end_date',
        'user_id',
        'trainer_id',
    ];



    public function user(){
        return  $this->belongsTo(User::class,'user_id');
    }
    public function trainer(){
        return $this->belongsTo(Employee::class,'trainer_id');
    }

    public function scopeActiveWorkoutPlan($query){
        return $query->where('end_date','>=',now()->toDateString());
    }
    public function scopeUserWorkoutPlans($query,$user_id){
        return $query->where(['user_id'=>$user_id,'trainer_id'=>Auth::guard('employees')->id()]);
    }
}
