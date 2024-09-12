<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDepartment extends Model
{
    use HasFactory;

    protected $table="category_department";
    protected $primaryKey=['category_id','department_id'];
    protected $incrementing = false ; 


    protected $fillable = [
        'category_id ',
        'department_id ',
        'price',
        'status'
    ];
}
