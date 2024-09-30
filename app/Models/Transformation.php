<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    use HasFactory;

    protected $fillable= [
        'image_before',
        'image_after',
        'period',
        'trainer_id',
    ];



    public function trainer(){
        $this->belongsTo(Employee::class,'trainer_id');
    }
}
