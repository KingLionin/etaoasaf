<!-- Vertical modal form request View -->
@foreach($newOffboardingRequests as $request)
    <div id="modal_form_request_employee_view_{{ $request->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div
                    class="modal-header bg-primary text-white border-0 d-flex justify-content-center align-content-center">
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
                                    <span>{{ $request->employee->hrJob->hrJobCategory->department->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Position:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->hrJob->name }}</< /span>
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
                                        @if(!empty($request->files))
                                            @php
                                                $fileNames = explode(',', $request->files);
                                            @endphp
                                            @foreach($fileNames as $fileName)
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
                    <button type="button" class="btn btn-primary" id="requestManagerApprovalBtn" data-bs-toggle="modal"
                        data-bs-target="#modal_form_forward_manager_vertical_{{ $request->id }}">Request
                        {{ $request->employee->hrJob->hrJobCategory->department->name }} Manager Approval</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- /vertical form modal -->

<!-- Vertical modal form request View -->
@foreach($pendingOffboardingRequests as $request)
    <div id="modal_form_pending_view_{{ $request->id }}" class="modal fade" tabindex="-1">
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
                                    <span>{{ $request->employee->hrJob->hrJobCategory->department->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Position:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->hrJob->name }}</span>
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
                                        @if(!empty($request->files))
                                            @php
                                                $fileNames = explode(',', $request->files);
                                            @endphp
                                            @foreach($fileNames as $fileName)
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

                            <hr />

                            <div class="row">
                                <h3 class="mb-3">Assigned Manager Approval Status</h3>
                                <label class="col-lg-4">Manager Name:</label>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        <span>
                                        @if($request->employee && $request->employee->hrJobs && $request->employee->hrJobs->hrJobCategory->department && $request->employee->hrJobs->hrJobCategory->department->managers)  
                                            {{ $request->employee->hrJobs->department->managers->first_name }}
                                            {{ $request->employee->hrJobs->department->managers->middle_name }}
                                            {{ $request->employee->hrJobs->department->managers->last_name }}
                                        @else
                                            Department Manager Not Found
                                        @endif
                                        </span>
                                    </div>
                                </div>
                                <label class="col-lg-4">Status:</label>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        <span>
                                            @if($request->status == 'Approved')
                                                Approved
                                            @elseif($request->status == 'Denied')
                                                Denied
                                            @else
                                                Pending
                                            @endif
                                        </span>
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
@foreach($oldOffboardingRequests as $request)
    <div id="modal_form_old_view_{{ $request->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                @if($request->status == 'Approved')
                    <div class="modal-header bg-success text-white border-0">
                        <h1 class="modal-title">MANAGER RESPONSE: APPROVED</h1>
                    </div>
                @elseif($request->status == 'Denied')
                    <div class="modal-header bg-danger text-white border-0">
                        <h1 class="modal-title">MANAGER RESPONSE: DENIED</h1>
                    </div>
                @else
                    <div class="modal-header bg-info text-white border-0">
                        <h1 class="modal-title">MANAGER APPROVAL: UNKNOWN</h1>
                    </div>
                @endif

                <div class="modal-body">
                    <div class="mb-3">
                        <h3 class="mb-3">DEPARTMENT MANAGER</h3>
                        <div class="row">
                            <label class="col-lg-4">Manager Name:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>
                                        @if($request->employee && $request->employee->hrJobs && $request->employee->hrJobs->hrJobCategory->department && $request->employee->hrJobs->hrJobCategory->department->managers)  
                                            {{ $request->employee->hrJobs->department->managers->first_name }}
                                            {{ $request->employee->hrJobs->department->managers->middle_name }}
                                            {{ $request->employee->hrJobs->department->managers->last_name }}
                                        @else
                                            Department Manager Not Found
                                        @endif
                                    </span>
                                </div>
                            </div>

                            
                            <label class="col-lg-4">Position:</label>
                              <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>
                                        @if($request->employee && $request->employee->hrJobs && $request->employee->hrJobs->hrJobCategory->department)  
                                            @if(strpos($request->employee->hrJobs->hrJobCategory->department->name, 'Manager'))
                                                Manager
                                            @else
                                                {{ $request->employee->hrJobs->name }}
                                            @endif
                                        @else
                                          NO POSITION
                                        @endif
                                    </span>
                                </div>
                              </div>
                        </div>
                    </div>

                    <hr />

                    <div class="mb-3">
                        <div class="flex-1 mb-3">
                            <h3 class="mb-3">EMPLOYEE REQUEST</h3>
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
                                    <span>{{ $request->employee->hrJob->hrJobCategory->department->name }}</span>
                                </div>
                            </div>
                            <label class="col-lg-4">Position:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <span>{{ $request->employee->hrJob->name }}</span>
                                </div>
                            </div>
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
                        </div>
                        <div class="row">
                            <label class="col-lg-4">Files:</label>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    @if(!empty($request->files))
                                        @php
                                            $fileNames = explode(',', $request->files);
                                        @endphp
                                        @foreach($fileNames as $fileName)
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

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endforeach
<!-- /Vertical modal form approval view -->
