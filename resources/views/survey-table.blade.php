@extends('layouts.master')
@section('title', 'Survey Table')
@section('content')

<div class="content">
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Survey Table</h5>
            <a href="{{ route('createsurvey.page') }}" class="btn btn-primary ml-3">Construct New
                Survey</a>
        </div>


        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>Survey Title</th>
                    <th>Survey Description</th>
                    <th>Date Created</th>
                    <th>Position Distributed</th>
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
@endsection

@section('scripts')
<script src="{{ URL::asset('assets/demo/pages/datatables_basic.js') }}"></script>
@endsection
