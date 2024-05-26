@extends('layouts.master')
@section('title', 'Survey Table')
@section('content')

<div class="content">
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Survey Table</h5>
            <a href="{{ route('createsurvey.page') }}" class="btn btn-primary ml-3">
                Construct New Survey
            </a>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th class="text-center">Survey Title</th>
                    <th class="text-center">Survey Description</th>
                    <th class="text-center">Position Distributed</th>
                    <th class="text-center">Type of Distribution</th>
                    <th class="text-center">Start Date Schedule</th>
                    <th class="text=center">End Date Schedule</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            @foreach($surveys as $survey)
            <tbody>
                <tr>
                    <td>{{ $survey->survey_title }}</td>
                    <td class="col-4 text-wrap text-break">{{ $survey->survey_description }}</td>
                    @if($survey->distribute_position == 'all')
                    <td class="text-center">All Employees</td>
                    @else
                    <td class="text-capitalize text-center">{{ $survey->distribute_position }}</td>
                    @endif
                    <td class="text-capitalize text-center">{{ $survey->distribute_type }}</td>
                    @if($survey->start_date == NULL)
                    <td class="text-center">This Survey is not Scheduled.</td>
                    @else
                    <td class="text-center">{{ $survey->start_date }}</td>
                    @endif
                    @if($survey->end_date == NULL)
                    <td class="text-center">This Survey is not Scheduled.</td>
                    @else
                    <td class="text-center">{{ $survey->end_date }}</td>
                    @endif
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item view-survey-btn" data-survey-view-id="{{ $survey->id }}" data-bs-toggle="modal" data-bs-target="#view_modal_full">
                                        <i class="ph-eye me-2"></i>
                                        View
                                    </a>
                                    <a href="#" class="dropdown-item edit-survey-btn" data-survey-edit-id="{{ $survey->id }}" data-bs-toggle="modal" data-bs-target="#edit_modal_full">
                                        <i class="ph-pencil-line me-2"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-survey-form-{{ $survey->id }}').submit();">
                                        <i class="ph-trash me-2"></i>
                                        Delete
                                    </a>

                                    <!-- Add a hidden form to trigger the delete action -->
                                    <form id="delete-survey-form-{{ $survey->id }}" action="{{ route('surveys.delete', $survey->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <!-- /basic datatable -->

    @include('components.survey-view-modal')
    @include('components.survey-edit-modal')

</div>
<!-- /content area -->

@endsection

@section('center-scripts')
<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/ui/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/pickers/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/pickers/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/autofill.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/select.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/col_reorder.min.js')}}"></script>
@endsection

@section('scripts')
<script src="{{ URL::asset('assets/js/survey-table.js') }}"></script>
<script src="{{ URL::asset('assets/demo/pages/picker_date.js') }}"></script>
<script src="{{ URL::asset('assets/demo/pages/datatables_basic.js') }}"></script>
@endsection

