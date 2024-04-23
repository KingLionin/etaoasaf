<!-- Notifications -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
    <div class="offcanvas-header py-0">
        <h5 class="offcanvas-title py-3">NOTIFICATIONS</h5>
        <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill"
            data-bs-dismiss="offcanvas">
            <i class="ph-x"></i>
        </button>
    </div>

    <div class="offcanvas-body p-0">
        <div class="bg-light fw-medium py-2 px-3">New Notifications</div>
        <div class="p-3">
            @forelse($newOffboardingRequests as $request)
                <a href="#" id="newrequestitem" class="notification-item" data-bs-toggle="modal"
                    data-bs-target="#modal_form_request_employee_view_{{ $request->id }}">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <div class="bg-primary bg-opacity-25 text-body rounded-pill">
                                <i class="ph-envelope-simple fw-bold p-2"></i>
                            </div>
                        </div>
                        <div class="flex-1 fw-bold mb-3">
                            {{ $request->employee->last_name }},
                            {{ $request->employee->first_name }}
                            {{ $request->employee->middle_name }}
                          <div class="fs-sm fw-bold text-muted mt-1">{{ $request->employee->hrJob->hrJobCategory->department->name }}, {{ $request->employee->hrJob->name}}</div>
                        </div>
                        <span class="badge bg-info ms-2">{{ $request->status }}</span>
                    </div>
                </a>
            @empty
                <div class="text-center fw-bold muted">No New Notifications Found</div>
            @endforelse
        </div>

        <div class="bg-light fw-medium py-2 px-3">Pending Notifications</div>
        <div class="p-3">
            @forelse($pendingOffboardingRequests as $request)
                <a href="#" id="newrequestitem" class="notification-item" data-bs-toggle="modal"
                    data-bs-target="#modal_form_pending_view_{{ $request->id }}">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <div class="bg-primary bg-opacity-25 text-body rounded-pill">
                                <i class="ph-envelope-simple fw-bold p-2"></i>
                            </div>
                        </div>
                        <div class="flex-1 fw-bold mb-3 justify-content-between">
                            {{ $request->employee->last_name }},
                            {{ $request->employee->first_name }}
                            {{ $request->employee->middle_name }}
                            <div class="fs-sm fw-bold text-muted mt-1">{{ $request->employee->hrJob->hrJobCategory->department->name }}, {{ $request->employee->hrJob->name}}</div>
                        </div>
                        <span class="badge bg-warning ms-2">{{ $request->status }}</span>
                    </div>
                </a>
            @empty
                <div class="text-center fw-bold muted">No Pending Notifications Found</div>
            @endforelse
        </div>

        <div class="bg-light fw-medium py-2 px-3">Old Notifications</div>
        <div class="p-3">
            @forelse($oldOffboardingRequests as $request)
                <a href="#" id="newrequestitem" class="notification-item" data-bs-toggle="modal"
                    data-bs-target="#modal_form_old_view_{{ $request->id }}">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <div class="bg-primary bg-opacity-25 text-body rounded-pill">
                                <i class="ph-envelope-simple fw-bold p-2"></i>
                            </div>
                        </div>
                        <div class="flex-1 fw-bold mb-3 justify-content-between">
                            {{ $request->employee->last_name }},
                            {{ $request->employee->first_name }}
                            {{ $request->employee->middle_name }}
                          <div class="fs-sm fw-bold text-muted mt-1">{{ $request->employee->hrJob->hrJobCategory->department->name }}, {{ $request->employee->hrJob->name}}</div>
                        </div>
                        @if ($request->status == 'Approved')
                            <span class="badge bg-success ms-2">{{ $request->status }}</span>
                        @elseif ($request->status == 'Denied')
                            <span class="badge bg-danger ms-2">{{ $request->status }}</span>
                        @else
                            <span class="badge bg-success ms-2">ERROR</span>
                        @endif
                    </div>
                </a>
            @empty
                <div class="text-center fw-bold muted">No Old Notifications Found</div>
            @endforelse
        </div>
    </div>
</div>
<!-- /notifications -->


@include('components.request-modals')
@include('components.employee-manager-approval')

