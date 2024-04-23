<?php

namespace App\Models\Recruitment;

use App\Models\EmployeeInfo\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr_job_categorie extends Model
{
    use HasFactory;

    protected $connection = 'recruitment';

    protected $table = 'hr_job_categories';

    protected $fillable = [
        'name',
        'description',
        'department_id',
    ];

    public function hrJobs()
    {
        return $this->hasMany(Hr_job::class, 'category_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
