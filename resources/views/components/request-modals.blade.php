<!-- Vertical modal form request View -->
@foreach ($newOffboardingRequests as $request)
    <div id="modal_form_request_view_{{ $request->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white border-0">
                    <h1 class="modal-title">REQUEST</h1>
                </div>

                <form action="#">
                    <div class="modal-body">
                        <div class="mb-3">
                            <h3 class="mb-3">Sent from {{ $request->portal_type }}</h3>
                            <div class="row">
                                <label class="col-lg-4">Employee Name:</label>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        <span>{{ $request->employee->employee_lastname }},
                                            {{ $request->employee->employee_firstname }}
                                            {{ $request->employee->employee_middlename }}</span>
                                    </div>
                                </div>
                                <label class="col-lg-4">Department:</label>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        <span>{{ $request->employee->department }}</span>
                                    </div>
                                </div>
                                <label class="col-lg-4">Position:</label>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        <span>{{ $request->employee->position }}</span>
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

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="requestManagerApprovalBtn" data-bs-toggle="modal" data-bs-target="#modal_form_forward_manager_vertical_{{ $request->id }}">Request Manager Approval</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- /vertical form modal -->
