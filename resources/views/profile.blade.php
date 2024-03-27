@extends('layouts.master')
@section('title', 'Profile')
@section('content')

<!-- Content area -->
<div class="content">

    <!-- Inner container -->
    <div class="d-lg-flex align-items-lg-start">

        <!-- Left sidebar component -->
        <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Navigation -->
                <div class="card">
                    <div class="sidebar-section-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            @if(auth()->user()->image)
                                <img class="img-fluid rounded-circle" src="{{ asset('storage/' . auth()->user()->image) }}" width="150" height="150" alt="Profile_Image">
                            @else
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('images/default-profile-picture.jpg') }}" width="150" height="150" alt="Default_Profile_Image">
                            @endif
                        </div>

                        <h6 class="mb-0">{{ auth()->user()->employee->employee_firstname }} {{ auth()->user()->employee->employee_middlename }} {{ auth()->user()->employee->employee_lastname }} </h6>
                        <span class="text-muted">{{ auth()->user()->employee->department }} {{ auth()->user()->employee->position }}</span>
                    </div>

                    <ul class="nav nav-sidebar">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                                <i class="ph-user me-2"></i>
                                My profile
                            </a>
                        </li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item">
                            <a href="login_advanced" class="nav-link" data-bs-toggle="tab">
                                <i class="ph-sign-out me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /left sidebar component -->


        <!-- Right content -->
        <div class="tab-content flex-fill">
            <div class="tab-pane fade active show" id="profile">

                <!-- Profile info -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Profile information</h4>
                    </div>

                    <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->address }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="form-label">Birthdate</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <i class="ph-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control datepicker-basic" placeholder="Pick a date" value="{{ auth()->user()->employee->date_of_birth }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Civil Status</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->civil_status }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Age</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->age }} years old" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->contact_number }}" readonly>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /profile info -->

            </div>
        </div>
        <!-- /right content -->

    </div>
    <!-- /inner container -->

</div>
<!-- /content area -->

@endsection
@section('center-scripts')
<script src="{{URL::asset('assets/js/vendor/ui/fullcalendar/main.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/ui/moment/moment.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/pickers/daterangepicker.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/pickers/datepicker.min.js')}}"></script>
@endsection
@section('scripts')
<script src="{{URL::asset('assets/demo/pages/user_pages_profile.js')}}"></script>
<script src="{{URL::asset('assets/demo/pages/picker_date.js')}}"></script>
@endsection
