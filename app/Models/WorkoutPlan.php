<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
