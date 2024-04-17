<?php

namespace App\Http\Controllers;

use App\Models\OffboardingRequest;
use Illuminate\Http\Request;
use App\Models\LegalManagementApproval;

class LegalManagementController extends Controller
{
    public function sendApproval(Request $request)
    {
        // Get the old notification request by ID
        $notification = OffboardingRequest::find($request->input('legal_approval_id'));

        // Create a new legal management approval record
        $approval = new LegalManagementApproval();
        $approval->offboard_request_id = $notification->id;
        $approval->status = 'Pending'; // Set the status to pending
        $approval->save();

        // Optionally, you can notify the legal management team about the new approval request

        return redirect()->back()->with('success', 'Legal management approval request sent successfully.');
    }

    public function approveRequest(Request $request)
    {
        // Retrieve request parameters
        $legalApprovalId = $request->input('legal_approval_id');
        $status = $request->input('status');

        // Find the legal management approval record by ID
        $approval = LegalManagementApproval::find($legalApprovalId);

        // Check if the approval record exists
        if ($approval) {
            // Update the status
            $approval->status = $status;
            $approval->save();

            return response()->json(['message' => 'Legal management approval status updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Legal management approval record not found'], 404);
        }
    }
}
