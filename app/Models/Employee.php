<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_lastname',
        'employee_firstname',
        'employee_middlename',
        'date_of_birth',
        'age',
        'gender',
        'email',
        'contact_number',
        'address',
        'civil_status',
        'position',
        'department',
        'work_status',
        'work_type',
    ];

    public function userinfo()
    {
        return $this->hasOne(Employee::class);
    }

    public function offboardingrequest()
    {
        return $this->hasMany(Employee::class);
    }
}
