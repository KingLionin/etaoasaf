<!-- Vertical form to manager approval modal -->
<div id="modal_form_forward_manager_vertical_{{ $request->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center align-content-center">
                <h5 class="modal-title">APPROVAL FORM</h5>
            </div>

            <form action="#">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="flex-1 mb-3">
                            <div class="fs-md text-muted mt-1">SEND BY</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label">Firstname</label>
                                <input type="text" placeholder="John" class="form-control"
                                    value="{{ auth()->user()->employee->employee_firstname }}" disabled />
                            </div>

                            <div class="col-sm-4">
                                <label class="form-label">Middlename</label>
                                <input type="text" placeholder="Katarina" class="form-control"
                                    value="{{ auth()->user()->employee->employee_middlename }}" disabled />
                            </div>

                            <div class="col-sm-4">
                                <label class="form-label">Lastname</label>
                                <input type="text" placeholder="Doe" class="form-control"
                                    value="{{ auth()->user()->employee->employee_lastname }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label">Department</label>
                                <input type="text" placeholder="Ring street 12" class="form-control"
                                    value="{{ auth()->user()->employee->department }}" disabled />
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Position</label>
                                <input type="text" placeholder="Enter your position" class="form-control"
                                    value="{{ auth()->user()->employee->position }}" disabled />
                            </div>
                        </div>
                    </div>

                    <hr />


                    <div class="mb-3">
                        <div class="flex-1 mb-3">
                            <div class="fs-md text-muted mt-1">REQUESTED BY</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label">Firstname</label>
                                <input id="firstNameInput" type="text" placeholder="John" class="form-control"
                                    value="{{ $request->employee->employee_firstname }}" disabled>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-label">Middlename</label>
                                <input id="middleNameInput" type="text" placeholder="Katarina" class="form-control"
                                    value="{{ $request->employee->employee_middlename }}" disabled>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-label">Lastname</label>
                                <input id="lastNameInput" type="text" placeholder="Doe" class="form-control"
                                    value="{{ $request->employee->employee_lastname }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-label">Department</label>
                                <input type="text" placeholder="Ring street 12" class="form-control"
                                    value="{{ $request->employee->department }}" disabled>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Position</label>
                                <input id="positionInput" type="text" placeholder="Enter your position"
                                    value="{{ $request->employee->position }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label class="form-label">Request Type</label>
                        <input id="positionInput" type="text" placeholder="Enter your position"
                            value="{{ $request->type_of_request }}" class="form-control" disabled>
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
                                @if (is_array($request->files) && count($request->files) > 0)
                                    @foreach($request->files as $file)
                                        <div><span><a
                                                    href="{{ asset('storage/offboarding_files/' . $file->getClientOriginalName()) }}"
                                                    download>{{ $file->getClientOriginalName() }}</a></span></div>
                                    @endforeach
                                @elseif (is_object($request->files) && $request->files instanceof \Illuminate\Support\Collection && $request->files->count() > 0)
                                    @foreach($request->files as $file)
                                        <div><span><a
                                                    href="{{ asset('storage/offboarding_files/' . $file->filename) }}"
                                                    download>{{ $file->filename }}</a></span></div>
                                    @endforeach
                                @else
                                    <div>No files attached</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Manager Approval</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Vertical form to manager approval modal -->
