<?php

namespace App\Models\Main;

use App\Models\User;
use App\Models\OffboardingRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $connection = 'main';
    protected $table = 'employees';

    protected $fillable = ['code', 'first_name', 'middle_name', 'last_name', 'email', 'status', 'job_role_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function job_role()
    {
        return $this->belongsTo(JobRole::class, 'job_role_id');
    }
}

