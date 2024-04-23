<?php

namespace App\Models\EmployeeInfo;

use App\Models\Recruitment\Hr_job;
use App\Models\EmployeeInfo\Employee;
use App\Models\Recruitment\Hr_job_categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $connection = 'employeeinfo';
    protected $table = 'departments';

    protected $fillable = ['name', 'description'];

    public function hrJobCategory()
    {
        return $this->hasMany(Hr_job_categorie::class, 'category_id');
    }

    public function managers()
    {
        return $this->hasMany(Employee::class, 'job_role_id')->whereHas('hrJob', function ($query) {
            $query->where('name', 'like', '%Manager%');
        });
    }
}
