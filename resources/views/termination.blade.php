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

