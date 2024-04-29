@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

<div class="content">
    <div class="row mt-3">
        <div class="col-sm-2 col-md-3 col-xl-3">
            <div class="card card-body" style="transition: all 0.3s ease-in-out;"
                onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <a href="{{ route('offboarding.page') }}" class="d-flex align-items-center"
                    style="text-decoration: none; color: inherit;">
                    <i class="ph-users-three ph-2x text-warning me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0 text-body">0</h4>
                        <span class="text-muted">OFFBOARD</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-sm-2 col-md-3 col-xl-3">
            <div class="card card-body" style="transition: all 0.3s ease-in-out;"
                onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <a href="{{ route('termination.page') }}" class="d-flex align-items-center"
                    style="text-decoration: none; color: inherit;">
                    <i class="ph-users-three ph-2x text-danger me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0 text-body">0</h4>
                        <span class="text-muted">TERMINATED</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-sm-2 col-md-3 col-xl-3">
            <div class="card card-body" style="transition: all 0.3s ease-in-out;"
                onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <a href="{{ route('survey.page') }}" class="d-flex align-items-center"
                    style="text-decoration: none; color: inherit;">
                    <i class="ph-clipboard ph-2x text-primary me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0 text-body">0</h4>
                        <span class="text-muted">SURVEYS</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-sm-2 col-md-3 col-xl-3">
            <div class="card card-body" style="transition: all 0.3s ease-in-out;"
                onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <a href="{{ route('employeeresponse.page') }}" class="d-flex align-items-center"
                    style="text-decoration: none; color: inherit;">
                    <i class="ph-clipboard-text ph-2x text-success me-3"></i>

                    <div class="flex-fill text-end">
                        <h4 class="mb-0 text-body">0</h4>
                        <span class="text-muted">SURVEY RESPONSE</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Basic pie charts -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Employee Offboarding and Termination Chart</h5>
                </div>

                <div class="card-body">
                    <div class="chart-container text-center">
                        <div class="d-inline-block" id="google-pie"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Survey and Survey Response Donut Chart</h5>
                </div>

                <div class="card-body">
                    <div class="chart-container text-center">
                        <div class="d-inline-block" id="google-donut"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /basic pie charts -->
</div>

@endsection

@section('center-scripts')
<!-- Theme JS files -->
<script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3.min.js') }}">
</script>
<script src="{{ URL::asset('assets/js/vendor/visualization/d3/d3_tooltip.js') }}">
</script>
<script src = "https://www.gstatic.com/charts/loader.js" ></script>
@endsection

@section('scripts')
<script src="{{URL::asset('assets/demo/charts/google/pies/pie.js')}}"></script>
<script src="{{URL::asset('assets/demo/charts/google/pies/donut.js')}}"></script>
@endsection
