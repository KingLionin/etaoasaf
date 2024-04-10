<!-- Vertical modal form request View -->
@foreach ($newOffboardingRequests as $request)
    <div id="modal_form_request_employee_view_{{ $request->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white border-0 d-flex justify-content-center align-content-center">
                    <h1 class="modal-title">REQUEST</h1>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <h3 class="mb-3">Sent from {{ $request->portal_type }}</h3>
                        <div class="row">
                            <label class="col-lg-4">Employee Name:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->last_name }},
                                        {{ $request->employee->first_name }}
                                        {{ $request->employee->middle_name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Department:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->department->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Position:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->name }}</</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="mb-3">
                        <div class="row">
                            <label class="col-lg-4">Request Type:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->type_of_request }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Description:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->description }}</span>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <label class="col-lg-4">Files:</label>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        @if (!empty($request->files))
                                            @php
                                                $fileNames = explode(',', $request->files);
                                            @endphp
                                            @foreach ($fileNames as $fileName)
                                                <div><span><a
                                                            href="{{ asset('storage/offboarding_files/' . $fileName) }}"
                                                            download>{{ $fileName }}</a></span></div>
                                            @endforeach
                                        @else
                                            <div>No files attached</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="requestManagerApprovalBtn" data-bs-toggle="modal" data-bs-target="#modal_form_forward_manager_vertical_{{ $request->id }}">Request {{ $request->employee->job_role->department->name }} Manager Approval</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- /vertical form modal -->


<!---Vertical modal form request View -->
@foreach ($newOffboardingRequests as $request)
    <div id="modal_form_request_manager_view_{{ $request->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white border-0 d-flex justify-content-center align-content-center">
                    <h1 class="modal-title">REQUEST</h1>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <h3 class="mb-3">Sent from {{ $request->portal_type }}</h3>
                        <div class="row">
                            <label class="col-lg-4">Employee Name:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->last_name }},
                                        {{ $request->employee->first_name }}
                                        {{ $request->employee->middle_name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Department:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->department->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Position:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->name }}</</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="mb-3">
                        <div class="row">
                            <label class="col-lg-4">Request Type:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->type_of_request }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Description:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->description }}</span>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <label class="col-lg-4">Files:</label>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        @if (!empty($request->files))
                                            @php
                                                $fileNames = explode(',', $request->files);
                                            @endphp
                                            @foreach ($fileNames as $fileName)
                                                <div><span><a
                                                            href="{{ asset('storage/offboarding_files/' . $fileName) }}"
                                                            download>{{ $fileName }}</a></span></div>
                                            @endforeach
                                        @else
                                            <div>No files attached</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="requestManagerApprovalBtn" data-bs-toggle="modal" data-bs-target="#modal_form_forward_manager_vertical_{{ $request->id }}">Request Manager Approval</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- /vertical form modal -->

<!-- Vertical modal form request View -->
@foreach ($pendingOffboardingRequests as $request)
    <div id="modal_form_pending_legal_view_{{ $request->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white border-0">
                    <h1 class="modal-title">WAITING APPROVAL</h1>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <h3 class="mb-3">Sent from {{ $request->portal_type }}</h3>
                        <div class="row">
                            <label class="col-lg-4">Employee Name:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->last_name }},
                                        {{ $request->employee->first_name }}
                                        {{ $request->employee->middle_name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Department:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->department->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Position:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="mb-3">
                        <div class="row">
                            <label class="col-lg-4">Request Type:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->type_of_request }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Description:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->description }}</span>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <label class="col-lg-4">Files:</label>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        @if (!empty($request->files))
                                            @php
                                                $fileNames = explode(',', $request->files);
                                            @endphp
                                            @foreach ($fileNames as $fileName)
                                                <div><span><a
                                                            href="{{ asset('storage/offboarding_files/' . $fileName) }}"
                                                            download>{{ $fileName }}</a></span></div>
                                            @endforeach
                                        @else
                                            <div>No files attached</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- /vertical form modal -->

<!-- Vertical modal form approval view -->
@foreach ($oldOffboardingRequests as $request)
    <div id="modal_form_approval_view_{{ $request->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white border-0">
                    <h1 class="modal-title">MANAGER RESPONSE</h1>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <h3 class="mb-3">Sent from {{ $request->portal_type }}</h3>
                        <div class="row">
                            <label class="col-lg-4">Employee Name:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->last_name }},
                                        {{ $request->employee->first_name }}
                                        {{ $request->employee->middle_name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Department:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->department->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Position:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Description:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->description }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="mb-3">
                            <div class="flex-1 mb-3">
                                <div class="fs-md text-muted mt-1">EMPLOYEE REQUEST</div>
                            </div>
                        <div class="row">
                          <label class="col-lg-4">Employee Name:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->last_name }},
                                        {{ $request->employee->first_name }}
                                        {{ $request->employee->middle_name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Department:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->department->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Position:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->job_role->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Request Type:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->type_of_request }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- /Vertical modal form approval view -->
