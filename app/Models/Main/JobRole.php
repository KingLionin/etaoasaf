<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    use HasFactory;

    protected $connection = 'main';

    protected $table = 'job_roles';

    protected $fillable = ['name', 'description', 'department_id', 'job_position'];
    
    public function employee()
    {
        return $this->hasMany(Employee::class, 'employee_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}