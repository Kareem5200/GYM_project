<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone1',
        'phone2',
        'gender',
        'birth_date',
        'status',
        'type',
        'department_id',
    ];

    protected $casts = [
        'password' => 'hashed',
        // 'email_verified_at' => 'datetime',
    ];




    public function memberships(){
        return $this->hasMany(Membership::class,'trainer_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function qualifications(){
        return $this->hasMany(Qualification::class,'trainer_id');
    }

    public function nutrationPlans(){
        return $this->hasMany(NutrationPlan::class,'trainer_id');
    }

    public function workoutPlans(){
        return $this->hasMany(WorkoutPlan::class,'trainer_id');
    }

    public function transformations(){
        return $this->hasMany(Transformation::class,'trainer_id');
    }


    public function scopeActive($query){
       return  $query->whereStatus('active');
    }
}
