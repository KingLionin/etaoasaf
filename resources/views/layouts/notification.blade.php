<!-- Notifications -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
    <div class="offcanvas-header py-0">
        <h5 class="offcanvas-title py-3">OFFBOARDING REQUESTS</h5>
        <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill" data-bs-dismiss="offcanvas">
            <i class="ph-x"></i>
        </button>
    </div>

    <div class="offcanvas-body p-0">
        <div class="bg-light fw-medium py-2 px-3">New offboarding requests</div>
        <div class="p-3">
            @forelse ($newOffboardingRequests as $request)
                <a href="#" class="notification-item" data-bs-toggle="modal" data-bs-target="#modal_form_request_view_{{ $request->id }}">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <div class="bg-primary bg-opacity-10 text-white rounded-pill">
                                <i class="ph-envelope-simple p-2"></i>
                            </div>
                        </div>
                        <div class="flex-1 mb-3">
                            {{ $request->employee->employee_lastname }}, {{ $request->employee->employee_firstname }} {{ $request->employee->employee_middlename }}
                            <div class="fs-sm text-muted mt-1">{{ $request->employee->department }}, {{ $request->employee->position}}</div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center muted">No New Requests Found</div>
            @endforelse
        </div>

        <div class="bg-light fw-medium py-2 px-3">Pending offboarding requests</div>
        <div class="p-3">
            @forelse ($pendingOffboardingRequests as $request)
                <!-- Your existing code for displaying requests -->
            @empty
                <div class="text-center muted">No Pending Requests Found</div>
            @endforelse
        </div>

        <div class="bg-light fw-medium py-2 px-3">Old offboarding requests</div>
        <div class="p-3">
            @forelse ($oldOffboardingRequests as $request)
                <!-- Your existing code for displaying requests -->
            @empty
                <div class="text-center muted">No Old Requests Found</div>
            @endforelse
        </div>
    </div>
</div>
<!-- /notifications -->

@include('components.request-modals')
