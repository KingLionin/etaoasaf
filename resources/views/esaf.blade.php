@extends('layouts.master')
@section('content')

<div class="content">
<div class="row mt-3">
 <div class="col-sm-7 col-xl-4">
            <div class="card card-body">
                <div class="d-flex align-items-center">
                    <i class="ph-users-three ph-2x text-success me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0">0</h4>
                        <span class="text-muted">Total Surveys</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-7 col-xl-4">
            <div class="card card-body">
                <div class="d-flex align-items-center">
                    <i class="ph-users-three ph-2x text-warning me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0">0</h4>
                        <span class="text-muted">Total Surveys</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-7 col-xl-4">
            <div class="card card-body">
                <div class="d-flex align-items-center">
                    <i class="ph-users-three ph-2x text-danger me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0">0</h4>
                        <span class="text-muted">Total of Employee Responded</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


 <!-- Column chart -->
 <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Termination chart</h5>
        </div>

        <div class="card-body">

            <div class="chart-container">
                <div class="chart" id="google-column"></div>
            </div>
        </div>
 </div>
 <!-- /column chart -->

</div>

@endsection

@section('center-scripts')
<!-- Theme JS files -->
<script src="{{URL::asset('assets/js/vendor/visualization/d3/d3.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/visualization/d3/d3_tooltip.js')}}"></script>
@endsection

@section('scripts')
<script src="{{URL::asset('assets/demo/charts/google/bars/column.js')}}"></script>
@endsection
