<?php

namespace App\Models\Recruitment;

use App\Models\EmployeeInfo\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_job extends Model
{
    use HasFactory;

    protected $connection = 'recruitment';

    protected $table = 'hr_jobs';

    protected $fillable = ['name'];
    
    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_role_id');
    }

    public function hrJobCategory()
    {
        return $this->belongsTo(Hr_job_categorie::class, 'category_id');
    }
}