<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'image',
        'period',
    ];



    public function trainers(){
        return $this->hasMany(Employee::class,'department_id');
    }
    public function equipment(){
        return $this->belongsToMany(Equipment::class,'department_equipment','department_id','equipment_id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'category_department','department_id','category_id')->withPivot(['price','status']);
    }
    public function memberships(){
        return $this->hasMany(Membership::class,'department_id');
    }
}
