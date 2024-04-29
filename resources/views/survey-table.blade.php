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
                    <th>Survey Title</th>
                    <th>Survey Description</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            @foreach($surveys as $survey)
                <tbody>
                    <tr>
                        <td>{{ $survey->survey_title }}</td>
                        <td>{{ $survey->survey_description }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-eye me-2"></i>
                                            Preview
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-pencil-line me-2"></i>
                                            Edit
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-trash me-2"></i>
                                            Delete
                                        </a>
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
</div>
<!-- /content area -->

@endsection

@section('center-scripts')
<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/datatables.min.js') }}">
</script>
@endsection

@section('scripts')
<script src="{{ URL::asset('assets/demo/pages/datatables_basic.js') }}"></script>
@endsection
