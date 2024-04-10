<?php

namespace App\Http\Controllers\Api;

use App\Models\Main\Employee;
use App\Models\Main\Department;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\OffboardingRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OffboardingRequestsController extends Controller
{
    public function receive(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'employee_id' => 'required|exists:main.employees,id',
                'portal_type' => 'required|in:Employee Self-Service Portal, Manager Self-Service Portal',
                'type_of_request' => 'required|in:Resignation,Retirement,Contractual Breach,Offload,Involuntary Resignation',
                'status' => 'required|in:New,Approved,Pending,Denied',
                'description' => 'nullable|string',
                'files' => 'nullable|array',
                'files.*' => 'file|max:104857600',
            ]);

            // Check if files were uploaded
            if ($request->hasFile('files')) {
                // Handle file uploads
                $fileNames = $this->handleFileUploads($request->file('files'));
                // Convert file names to a comma-separated string
                $fileNamesString = implode(',', $fileNames);
            } else {
                $fileNamesString = ''; // Set empty string if no files were uploaded
            }

            // Remove 'files' key from validated data
            unset($validatedData['files']);

            // Create offboarding request with merged file names string
            OffboardingRequest::create(array_merge($validatedData, ['files' => $fileNamesString]));

            return response()->json(['message' => 'Offboarding request received successfully'], 200);
        } catch (\Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }
    }

    private function handleFileUploads($files): array
    {
        $fileNames = [];

        if (!empty($files)) {
            foreach ($files as $file) {
                $path = $file->store('offboarding_files');
                $fileName = $file->getClientOriginalName();
                Log::info('Uploaded file:', ['file_name' => $fileName]);
                $fileNames[] = $fileName;
            }
        } else {
            Log::info('No files uploaded.');
        }

        return $fileNames;
    }

    public function submitManagerApproval(Request $httpRequest, OffboardingRequest $request)
    {
        try {
            // Validate the request
            $validatedData = $httpRequest->validate([
                'employee_id' => 'required|exists:main.employees,id',
                'description' => 'nullable|string',
                'files' => 'nullable|array',
                'files.*' => 'file|max:104857600',
            ]);

            // Fetch the employee
            $employee = Employee::findOrFail($validatedData['employee_id']);

            // Fetch the department of the employee
            $jobRole = $employee->job_role->department;

            // Check if the job role exists
            if ($jobRole) {
            // Fetch the department of the job role
            $department = $jobRole->department;


            // Check if the department exists
            if ($department) {
                // Proceed with manager approval for the department
                // For example, send notification to the department manager
                // and perform other actions as required
                $departmentManager = $department->managerial;

                // Send notification or perform other actions for department manager
             // Send notification or perform other actions for department manager
            } else {
                // Handle the case where the employee's department is not found
                return response()->json(['error' => 'Employee department not found'], 404);
            }
            
        } else {
            // Handle the case where the employee's job role is not found
            return response()->json(['error' => 'Employee job role not found'], 404);
        }

            // Check if files were uploaded
            if ($httpRequest->hasFile('files')) {
                // Handle file uploads
                $fileNames = $this->handleFileUploads($httpRequest->file('files'));
                // Convert file names to a comma-separated string
                $fileNamesString = implode(',', $fileNames);
            } else {
                // If no files were uploaded, use the existing files from the database
                $fileNamesString = $request->files ?? '';
            }

            // Merge additional data into validated data
            $updatedData = array_merge($validatedData, ['status' => 'Pending', 'files' => $fileNamesString]);

            // Update offboarding request with merged data
            $request->update($updatedData);

            // Return success response
            return response()->json(['message' => 'Manager approval submitted successfully'], 200);
        } catch (\Exception $error) {
            // Return error response
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function managerResponse(Request $request, OffboardingRequest $offboardingRequest)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'status' => 'required|in:Approved, Denied',
            ]);
    
            // Update the status of the offboarding request to "New"
            $offboardingRequest->status = 'New';
            $offboardingRequest->portal_type = 'Manager Self-Service Portal';
            $offboardingRequest->save();
    
            // Optionally, you can perform additional actions here,
            // such as sending notifications or logging the manager's response.
    
            return response()->json(['message' => 'Offboarding request status updated to New'], 200);
        } catch (\Exception $error) {
            // Return error response
            return response()->json(['error' => $error->getMessage()], 500);
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
