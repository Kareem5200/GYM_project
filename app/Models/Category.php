<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable = [
        'category',
        'plan',

    ];



    public function departments(){
        return $this->belongsToMany(Department::class,'category_department','category_id','department_id')->withPivot(['price','status']);
    }
    public function memberships(){
        return $this->hasMany(Membership::class,'category_id');
    }
}
