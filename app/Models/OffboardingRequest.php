<?php

namespace App\Models;

use App\Models\Main\Employee;
use App\Models\LegalManagementApproval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OffboardingRequest extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'offboarding_requests';
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

    public function legalmanagementapproval()
    {
       return $this->hasOne(LegalManagementApproval::class, 'offboard_request_id');
    }
}
