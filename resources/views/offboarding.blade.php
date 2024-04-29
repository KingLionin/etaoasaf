@extends('layouts.master')
@section('title', 'Offboarding')
@section('content')
   
    <div class="content">

        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Offboarding Table</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>Employee Code</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->code }}</td>
                            <td>{{ $employee->last_name }}</td> <!--- employee_lastname  --->
                            <td>{{ $employee->first_name }}</td>  <!--- employee_firstname  --->
                            <td>{{ $employee->middle_name }}</td> <!--- employee_middlename  ---> 
                            <td>{{ $employee->hrJob->hrJobCategory->department->name }}</td>
                            <td>{{ $employee->hrJob->name }}</td> <!--- position->position_name --->
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    @if($employee->offboardingrequest && $employee->offboardingrequest->status === 'Approved')
                                      <button class="text-body btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form_clearance_view_{{ $employee->offboardingrequest->id}}">
                                        <i class="ph-user-circle-minus"></i>
                                      </button>
                                    @else
                                      <button class="text-body btn btn-primary" disabled>
                                        <i class="ph-user-circle-minus"></i>
                                      </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->

    <!-- Vertical form modal View -->
    @foreach($employees as $employee)
        @if($employee->offboardingrequest)
            <div id="modal_form_clearance_view_{{ $employee->offboardingrequest->id }}" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white border-0">
                            <h1 class="modal-title">CLEARANCE STEP 1: APPROVAL</h1>
                        </div>

                        <div class="modal-body">
                            <h6 class="mb-3">Legal Management Approval</h6>
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <i class="ph ph-user-circle-minus mb-3" style="font-size: 100px;"></i>
                                <p class="mb-3" style="font-size: 50px;">
                                    @if($employee->offboardingrequest->legalmanagementapproval)
                                        @if($employee->offboardingrequest->legalmanagementapproval->status === 'Approved')
                                            <span class="text-success fw-bold">APPROVED</span>
                                        @elseif($employee->offboardingrequest->legalmanagementapproval->status === 'Pending')
                                            <span class="text-warning fw-bold">PENDING</span>
                                        @elseif($employee->offboardingrequest->legalmanagementapproval->status === 'Denied')
                                            <span class="text-danger fw-bold">DENIED</span>
                                        @else
                                            REQUEST APPROVAL
                                        @endif
                                    @else
                                        REQUEST APPROVAL
                                    @endif
                                </p>
        
                                <form action="{{ route('legal-management-approval.send') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="legal_approval_id" value="{{ $employee->offboardingrequest->id }}">
                                    @if($employee->offboardingrequest->legalmanagementapproval)
                                        @if($employee->offboardingrequest->legalmanagementapproval->status === 'Approved')
                                            <button type="submit" class="btn btn-primary btn-sm mb-3" disabled>Request is Approved</button>
                                        @elseif($employee->offboardingrequest->legalmanagementapproval->status === 'Pending')
                                            <button type="submit" class="btn btn-primary btn-sm mb-3" disabled>Request is Pending</button>
                                        @elseif($employee->offboardingrequest->legalmanagementapproval->status === 'Denied')
                                            <button type="submit" class="btn btn-primary btn-sm mb-3" disabled>Request is Denied</button>
                                        @else
                                            <button type="submit" class="btn btn-primary btn-sm mb-3">Request is Legal Management Approval</button>
                                        @endif
                                    @else
                                        <button type="submit" class="btn btn-primary btn-sm mb-3">Request is Legal Management Approval</button>
                                    @endif
                                </form>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            @if($employee->offboardingrequest->legalmanagementapproval)
                                @if($employee->offboardingrequest->legalmanagementapproval->status === 'Pending' || $employee->offboardingrequest->legalmanagementapproval->status === 'Denied')
                                  <button type="button" class="btn btn-primary" disabled>Next</button>
                                @elseif($employee->offboardingrequest->legalmanagementapproval->status === 'Approved')
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form_clearance_view_step2">Next</button>
                                @else
                                  <button type="button" class="btn btn-primary" disabled>Next Step</button>
                                @endif
                            @else
                                <button type="button" class="btn btn-primary" disabled>Next Step</button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /vertical form modal -->
            </div>
        @endif
    @endforeach

    <div id="modal_form_clearance_view_step2" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white border-0">
                    <h1 class="modal-title">CLEARANCE STEP 2: Survey</h1>
                </div>

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Next Step</button>
                </div>
            </div>
        </div>
    </div>
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
