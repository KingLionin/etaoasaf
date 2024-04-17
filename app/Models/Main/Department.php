<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $connection = 'main';
    protected $table = 'departments';

    protected $fillable = ['name', 'description'];

    public function job_role()
    {
        return $this->hasMany(JobRole::class);
    }

    public function manager()
    {
        return $this->hasOne(Employee::class, 'job_role_id')->whereHas('job_role', function ($query) {
                $query->where('name', 'HR manager');
            });
    }
}
