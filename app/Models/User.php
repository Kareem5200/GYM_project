<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use function PHPSTORM_META\map;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone1',
        'phone2',
        'weight',
        'height',
        'birth_date',
        'status',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function workoutPlans(){
        return $this->hasMany(WorkoutPlan::class,'user_id');
    }
    public function nutrationPlans(){
        return $this->hasMany(NutrationPlan::class,'user_id');
    }
    public function memberships(){
        return $this->hasMany(Membership::class,'user_id');
    }

    public function trainers(){
        return $this->belongsToMany(Employee::class,'trainer_user','user_id','trainer_id')->withPivot('status');
    }
}
