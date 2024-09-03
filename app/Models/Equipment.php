<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table='equipment';

    protected $fillable = [
        'name',
        'brand',
        'price',
        'image',
        'quantity',
        'buy_date',
        'status',
    ];


    public function departments(){
        return $this->belongsToMany(Department::class,'department_equipment','department_id','equipment_id');
    }
}
