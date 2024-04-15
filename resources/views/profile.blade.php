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

                        <h6 class="mb-0">{{ auth()->user()->employee->first_name }} {{ auth()->user()->employee->middle_name }} {{ auth()->user()->employee->last_name }} </h6>
                    </div>
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
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Department</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->job_role->department->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Position</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->job_role->name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Work Status</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->status }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" style="resize:none;" readonly>{{ auth()->user()->employee->address }}</textarea>
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
                                        <label class="form-label">Work Setup</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->employee->work_setup }}" readonly>
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

@endsection

@section('scripts')
<script src="{{URL::asset('assets/demo/pages/user_pages_profile.js')}}"></script>
@endsection
