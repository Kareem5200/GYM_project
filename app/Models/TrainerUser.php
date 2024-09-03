<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerUser extends Model
{
    use HasFactory;
    protected $table="trainer_user";
    protected $primaryKey=['trainer_id','user_id'];


    protected $fillable = [
        'trainer_id',
        'user_id',
    ];
}
