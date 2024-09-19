<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use function PHPSTORM_META\map;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


    //Scope the active memberships with auth trainer
    public function scopeWithActiveMemberships($user)
    {
        return $user->whereHas('memberships', function($query) {
            $query->where('trainer_id', Auth::guard('employees')->id())
              ->where('end_date', '>=', now());
        });
    }

    //Scope the active plans to specific user with auth trainer
    public function scopeWithActivePlans($user,$plan)
    {
        return $user->whereHas($plan, function($query) {
            $query->where('trainer_id',Auth::guard('employees')->id())
            ->where('end_date','>=',now());
        });
    }

     //Scope to check  plans to specific user with auth trainer
    public function scopeWithoutActivePlans($user,$plan)
    {
        return $user->whereDoesntHave($plan, function($query) {
            $query->where('trainer_id',Auth::guard('employees')->id())
            ->where('end_date','>=',now());
        });
    }

    //Scope tp check the membership category for specific user
    public function scopeCategoryPlan($user,$plan)
    {
        return $user->whereHas('memberships.category',function($query)use($plan){
            $query->wherePlan($plan);
        });
    }
}
