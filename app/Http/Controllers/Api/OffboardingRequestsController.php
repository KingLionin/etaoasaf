<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\OffboardingRequest;
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
                $fileNames[] = $file->getClientOriginalName();
            }
        }

        return $fileNames;
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
