<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentEquipment extends Model
{
    use HasFactory;

    protected $table="department_equipment";
    protected $primaryKey=['department_id','equipment_id'];
    protected $incrementing = false ;

    protected $fillable = [
        'department_id ',
        'equipment_id ',
    ];
}
