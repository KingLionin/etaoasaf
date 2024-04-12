@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

<div class="content">
    <div class="row mt-2">
        <div class="col-sm-8 col-xl-6">
            <div class="card card-body">
                <div class="d-flex align-items-center">
                    <i class="ph-users-three ph-2x text-success me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0">0</h4>
                        <span class="text-muted">OFFBOARD</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8 col-xl-6">
            <div class="card card-body">
                <div class="d-flex align-items-center">
                    <i class="ph-clipboard ph-2x text-warning me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0">0</h4>
                        <span class="text-muted">SURVEYS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-8 col-xl-6">
            <div class="card card-body">
                <div class="d-flex align-items-center">
                    <i class="ph-users-three ph-2x text-danger me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0">0</h4>
                        <span class="text-muted">TERMINATED</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-8 col-xl-6">
            <div class="card card-body">
                <div class="d-flex align-items-center">
                    <i class="ph-clipboard-text ph-2x text-success me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0">0</h4>
                        <span class="text-muted">SURVEY RESPONSE</span>
                    </div>
                </div>
            </div>
        </div>
    <div>
</div>

@endsection

@section('center-scripts')
<!-- Theme JS files -->
<script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3.min.js') }}">
</script>
<script
    src="{{ URL::asset('assets/js/vendor/visualization/d3/d3_tooltip.js') }}">
</script>
@endsection
