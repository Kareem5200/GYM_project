<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;
    protected $table="about_us";
    protected $fillable = [
        'facebook',
        'instgram',
        'youtube',
        'X',
        'logo',
        'address',
        'phone1',
        'phone2',
        'admins_key',
        'trainers_key',
    ];
}
