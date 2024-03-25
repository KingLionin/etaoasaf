<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Employee;
use App\Models\OffboardingRequest;
use Illuminate\Support\Facades\Auth;

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
    public function ETaODashboard()
    {
        return view('etao', $this->getOffboardingRequests());
    }

    public function ESAFDashboard()
    {
        return view('esaf', $this->getOffboardingRequests());
    }

    public function offboardingpage()
    {
        $employees = Employee::all();
        return view('offboarding', array_merge($this->getOffboardingRequests(), ['employees' => $employees]));
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
        return view('requests', $this->getOffboardingRequests());
    }

    // For Signout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
