@extends('layouts.master')
@section('title', 'Terminations')
@section('content')

<div class="content">

 <!-- Basic datatable -->
 <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Termination Table</h5>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

</div>
<!-- /content area -->

</div>

<!-- Vertical form modal View -->
<div id="modal_form_data_view" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title">EMPLOYEE DATA</h1>
            </div>
            <div class="modal-body">
                <!-- Employee Details Section -->
                <div class="modal-section employee-details-section">
                 <div class="mb-3">
                    <!-- Display Employee Details Here -->
                    <h3 class="mb-3">EMPLOYEE INFORMATION</h3>
                    <div class="row">
                     <label class="col-lg-4">Lastname:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Marth</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Firstname:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Enright</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Middlename:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Vonks</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Birthdate:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>March 17, 2001</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Age: </label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>23 years old</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Gender:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Male</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Email:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>enrightvonksmarth@gmail.com</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Contact Number:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>+1 (555) 123-4567</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Address:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>123 Main Street, Citytown, ST 12345, Country.</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Civil Status:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Single</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Position:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Office Staff</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Department:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Human Resource</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Work Status:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Day Shift</span>
                        </div>
                     </div>
                     <label class="col-lg-4">Work Type:</label>
                     <div class="col-lg-7">
                        <div class="mb-3">
                            <span>Full Time</span>
                        </div>
                     </div>
                    </div>
                </div>
              </div>
                <!-- Time and Attendance Section (Initially Hidden) -->
                <div class="modal-section time-attendance-section" style="display: none;">
                    <!-- Display Time and Attendance Details Here -->
                    <p>Attendance Date: 2024-03-17</p>
                    <p>Time In: 08:00 AM</p>
                    <p>Time Out: 05:00 PM</p>
                    <!-- Add more time and attendance details here -->
                </div>
            </div>
            <div class="modal-footer">
                <!-- Previous Button -->
                <button type="button" class="btn btn-secondary" id="btn_previous">Previous</button>
                <!-- Next Button -->
                <button type="button" class="btn btn-primary" id="btn_next">Next</button>
            </div>
        </div>
        <!-- /basic setup -->
    </div>
    <!-- /vertical form modal -->

@endsection

@section('center-scripts')
<script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/datatables.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/select.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/col_reorder.min.js')}}"></script>
@endsection

@section('scripts')
<script src="{{URL::asset('assets/demo/pages/datatables_basic.js')}}"></script>
@endsection


