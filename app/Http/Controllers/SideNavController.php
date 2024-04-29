<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Survey;
use App\Models\OffboardingRequest;
use App\Models\Recruitment\Hr_job;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployeeInfo\Employee;

class SideNavController extends Controller
{
    private function getOffboardingRequests()
    {
        $newOffboardingRequests = OffboardingRequest::where('status', 'New')->get();
        $pendingOffboardingRequests = OffboardingRequest::where('status', 'Pending')->get();
        $oldOffboardingRequests = OffboardingRequest::whereNotIn('status', ['New', 'Pending'])->get();

        return [
            'newOffboardingRequests' => $newOffboardingRequests,
            'pendingOffboardingRequests' => $pendingOffboardingRequests,
            'oldOffboardingRequests' => $oldOffboardingRequests,
        ];
    }

    // For Dashboard
    public function dashboard()
    {
        return view('dashboard', $this->getOffboardingRequests());
    }
    public function offboardingpage()
    { 
        $employees = Employee::with('hrJob.hrJobCategory.department')->get();
        return view('offboarding', array_merge($this->getOffboardingRequests(), compact('employees')));
    }

    public function terminationpage()
    {
        return view('termination', $this->getOffboardingRequests());
    }

    public function profilepage()
    {
        return view('profile', $this->getOffboardingRequests());
    }

    public function requestspage()
    {
        // Retrieve all offboarding requests
        $notifications = OffboardingRequest::all();

        $employees = Employee::with('hrJob.hrJobCategory.department')->get();

        // Return the view with notifications and employees in HR
        return view('requests', array_merge($this->getOffboardingRequests(), compact('notifications', 'employees')));
    }

    public function surveypage()
    {
        $surveys = Survey::all();
        return view('survey-table', array_merge($this->getOffboardingRequests(), compact('surveys')));
    }
    
    public function createsurveyforms()
    {
        $jobRoles = Hr_job::whereNotIn('name', ['Manager', 'Staff'])->get();
        return view('create-survey', $this->getOffboardingRequests(), compact('jobRoles'));
    }

    public function employeeresponse()
    {
        return view('employee-response', $this->getOffboardingRequests());
    }

    // For Signout
    public function logoutprocess()
    {
        Session::flush();
        Auth::logout();
        return redirect('/etaoasaf/login');
    }
}
