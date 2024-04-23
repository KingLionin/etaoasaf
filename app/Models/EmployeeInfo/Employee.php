<?php

namespace App\Models\EmployeeInfo;

use App\Models\Recruitment\Hr_job;
use App\Models\OffboardingRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    use HasFactory;

    protected $connection = 'employeeinfo';
    protected $table = 'employees';

    protected $fillable = [
        'code', 
        'first_name', 
        'middle_name', 
        'last_name', 
        'email', 
        'status', 
        'work_setup', 
        'date_of_birth', 
        'place_birth',
        'age',
        'gender',
        'contact_no',
        'address',
        'civil_status',
        'job_role_id', 
    ];

    public function hrJob()
    {
        return $this->belongsTo(Hr_job::class, 'job_role_id');
    }

    public function offboardingRequest()
    {
        return $this->hasOne(OffboardingRequest::class, 'employee_id');
    }
}

