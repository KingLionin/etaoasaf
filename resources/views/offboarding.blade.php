@extends('layouts.master')
@section('content')
    @component('components.breadcrumb')
        @slot('title') EMPLOYEE OFFBOARDING @endslot
    @endcomponent

    <div class="content">

        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Offboarding Table</h5>
            </div>

            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->employee_lastname }}</td>
                            <td>{{ $employee->employee_firstname }}</td>
                            <td>{{ $employee->employee_middlename }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->position }}</td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <button class="text-body btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_form_clearance_view">
                                        <i class="ph-user-circle-minus"></i>
                                    </button>
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
                    <h6>Manager Approval</h6>
                    <fieldset>
                        
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