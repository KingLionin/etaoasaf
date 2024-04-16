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
                            <td>{{ $employee->job_role->department->name }}</td> <!--- department->department_name --->
                            <td>{{ $employee->job_role->name }}</td> <!--- position->position_name --->
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    @if($employee->offboardingrequest && $employee->offboardingrequest->status === 'Approved')
                                      <button class="text-body btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form_clearance_view">
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
    <div id="modal_form_clearance_view" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white border-0">
                    <h1 class="modal-title">CLEARANCE</h1>
                </div>

                <form class="wizard-form steps-basic" action="#">
                    <h6>Knowledge Transfer</h6>
                    <fieldset>
                       <div class="mb-3">
                         <label class="form-label">Manager Approval</label>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="manager_approval"
                                name="manager_approval">
                            <label class="form-check-label" for="manager_approval">Approve for knowledge transfer</label>
                          </div>
                        </div>
                    </fieldset>

                    <h6>Survey</h6>
                    <fieldset>

                    </fieldset>

                    <h6>Returned Assets</h6>
                    <fieldset>
                        
                    </fieldset>

                    <h6>Loans</h6>
                    <fieldset>
                        
                    </fieldset>
                </form>
            </div>
            <!-- /basic setup -->
        </div>
        <!-- /vertical form modal -->
    </div>

@endsection


@section('center-scripts')
    <script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/select.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/tables/datatables/extensions/col_reorder.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/forms/wizards/steps.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/vendor/forms/validation/validate.min.js')}}"></script>
@endsection

@section('scripts')
    <script src="{{URL::asset('assets/demo/pages/datatables_basic.js')}}"></script>
    <script src="{{URL::asset('assets/demo/pages/form_wizard.js')}}"></script>
@endsection
