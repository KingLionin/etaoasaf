<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\OffboardingRequest;
use App\Models\Employee; // Add Employee model
use App\Http\Controllers\Controller;

class OffboardingRequestsController extends Controller
{
    public function receive(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'portal_type' => 'required|in:Employee Self-Service Portal,Manager Self-Service Portal',
                'type_of_request' => 'required|in:Resignation,Retirement,Contractual Breach,Offload,Involuntary Resignation',
                'status' => 'required|in:New,Approved,Pending,Denied',
                'description' => 'nullable|string',
                'files' => 'nullable|array',
                'files.*' => 'file|max:104857600',
            ]);

            $employee = Employee::findOrFail($validatedData['employee_id']);

            $fileNames = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('offboarding_files');
                    $fileNames[] = $file->getClientOriginalName();
                }
                $validatedData['files'] = implode(',', $fileNames);
            }

            // Add employee details to validated data
            $validatedData['employee_lastname'] = $employee->employee_lastname;
            $validatedData['employee_firstname'] = $employee->employee_firstname;
            $validatedData['employee_middlename'] = $employee->employee_middlename;
            $validatedData['department'] = $employee->department;
            $validatedData['position'] = $employee->position;

            // Create offboarding request
            OffboardingRequest::create($validatedData);

            return response()->json(['message' => 'Offboarding request received successfully'], 200);
        } catch (\Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }
    }

    public function count()
    {
        try {
            $count = OffboardingRequest::where('status', 'New')->count();
            return response()->json(['count' => $count], 200);
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
