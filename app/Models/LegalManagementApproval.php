<?php

namespace App\Models;

use App\Models\OffboardingRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LegalManagementApproval extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'legal_management_approvals';

    protected $fillable = [
       'offboard_request_id',
       'status',
    ];

    public function offboardingrequest()
    {
        return $this->belongsTo(OffboardingRequest::class);
    }
}
