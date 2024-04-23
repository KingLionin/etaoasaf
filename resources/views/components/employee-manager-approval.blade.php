<!-- Vertical form to manager approval modal -->
@foreach($newOffboardingRequests as $request)
    <div id="modal_form_forward_manager_vertical_{{ $request->id }}" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary bg-text border-0 d-flex justify-content-center align-content-center">
                    <h3 class="modal-title">APPROVAL FORM</h3>
                </div>

                <form
                    action="{{ route('submit-manager-approval', ['request' => $request->id]) }}"
                    method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="flex-1 mb-3">
                                <div class="fs-md text-muted mt-1">REQUESTED BY</div>
                            </div>
                            <div class="row">
                              <input type="hidden" name="employee_id" value="{{ $request->employee_id }}">
                                <div class="col-sm-4">
                                    <label class="form-label">Firstname</label>
                                    <input id="firstNameInput" type="text" placeholder="John" class="form-control"
                                        value="{{ $request->employee->first_name }}" disabled>
                                </div>

                                <div class="col-sm-4">
                                    <label class="form-label">Middlename</label>
                                    <input id="middleNameInput" type="text" placeholder="Katarina" class="form-control"
                                        value="{{ $request->employee->middle_name }}" disabled>
                                </div>

                                <div class="col-sm-4">
                                    <label class="form-label">Lastname</label>
                                    <input id="lastNameInput" type="text" placeholder="Doe" class="form-control"
                                        value="{{ $request->employee->last_name }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label">Department</label>
                                    <input type="text" placeholder="Department" class="form-control"
                                        value="{{ $request->employee->hrJob->hrJobCategory->department->name }}" disabled>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Position</label>
                                    <input id="positionInput" type="text" placeholder="Enter your position"
                                        value="{{ $request->employee->hrJob->name }}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Request Type</label>
                            <input id="requestInput" type="text" placeholder="Enter your position"
                                value="{{ $request->type_of_request }}" class="form-control" disabled>
                            <input type="hidden" name="type_of_request" value="{{ $request->type_of_request }}">
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea id="descriptionInput" rows="3" cols="3" class="form-control elastic"
                                placeholder="Describe the Request" disabled>{{ $request->description }}</textarea>
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="sweet_success">Submit Manager Approval</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- /Vertical form to manager approval modal -->
