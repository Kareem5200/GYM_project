<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'certification',
        'certification_date',
        'image',
        'trainer_id ',
    ];
    public function trainer(){
        return $this->belongsTo(Employee::class,'trainer_id');
    }
}
