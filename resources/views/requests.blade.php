@extends('layouts.master')
@section('title', 'Requests')
@section('content')

<div class="content">

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0">Requests Table</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_form_construct_request_vertical">
                <i class="ph-pencil"></i>
                <span class="d-none d-xl-inline-block ms-2">Construct Request</span>
            </button>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Received Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notifications as $notification)
                    <tr>
                        <td>{{ $notification->employee->last_name }}, {{ $notification->employee->first_name }}
                            {{ $notification->employee->middle_name }}</td>
                        <td>{{ $notification->employee->job_role->department->name }}</td>
                        <td>{{ $notification->employee->job_role->job_position }}</td>
                        <td>
                        @php
                            $statusClass = '';
                            switch ($notification->status) {
                            case 'Approved':
                            $statusClass = 'badge bg-success bg-opacity-50 text-body';
                            break;
                            case 'New':
                            $statusClass = 'badge bg-primary bg-opacity-50 text-body';
                            break;
                            case 'Pending':
                            $statusClass = 'badge bg-warning bg-opacity-50 text-body';
                            break;
                            case 'Denied':
                            $statusClass = 'badge bg-danger bg-opacity-50 text-body';
                            break;
                            default:
                            $statusClass = 'badge bg-primary bg-opacity-50 text-body';
                            break;
                            }
                        @endphp
                        <span class="badge {{ $statusClass }}">{{ $notification->status }}</span>
                        </td>
                <td>{{ $notification->created_at }}</td>
                <td class="text-center">
                    <div class="d-inline-flex">
                        <div class="dropdown">
                            <a href="#" class="text-body" data-bs-toggle="dropdown">
                                <i class="ph-list"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#modal_form_message_view">
                                    <i class="ph-arrows-out me-2"></i>
                                    View
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
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

    <!--- Modal components --->
    @include('components.construct-request-modal')
</div>
<!-- /content area -->

@endsection

@section('center-scripts')
<script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/tables/datatables/datatables.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/buttons.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/responsive.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/select.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/tables/datatables/extensions/col_reorder.min.js') }}">
</script>
<script src="{{ URL::asset('assets/js/vendor/notifications/bootbox.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/forms/inputs/imask.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/forms/inputs/autosize.min.js') }}">
</script>
<script src="{{ URL::asset('assets/js/vendor/forms/inputs/passy.js') }}"></script>
<script src="{{ URL::asset('assets/js/vendor/forms/inputs/maxlength.min.js') }}">
</script>
<script src="{{ URL::asset('assets/js/vendor/uploaders/fileinput/fileinput.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/uploaders/fileinput/plugins/sortable.min.js') }}">
</script>
@endsection

@section('scripts')
<script src="{{ URL::asset('assets/demo/pages/datatables_basic.js') }}"></script>
<script src="{{ URL::asset('assets/demo/pages/components_modals.js') }}"></script>
<script src="{{ URL::asset('assets/demo/pages/form_controls_extended.js') }}"></script>
<script src="{{ URL::asset('assets/demo/pages/uploader_bootstrap.js') }}"></script>
@endsection
