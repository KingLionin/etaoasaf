<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class OffboardingRequest extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'employee_id',
        'portal_type',
        'type_of_request',
        'status',
        'description',
        'files',
        'send_date',
        'receive_date',
    ];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
