<!--- Modals from requests.blade.php ---->

 <!-- Vertical form construct request modal -->
 <div id="modal_form_construct_request_vertical" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">REQUEST FORM</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="#">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label">Firstname</label>
                                        <input type="text" placeholder="John" class="form-control" value="{{ auth()->user()->employee->first_name }}" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label">Middlename</label>
                                        <input type="text" placeholder="Katarina" class="form-control" value="{{ auth()->user()->employee->middle_name }}" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label">Lastname</label>
                                        <input type="text" placeholder="Doe" class="form-control" value="{{ auth()->user()->employee->last_name }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label">Department</label>
                                        <input type="text" placeholder="Enter your Department" class="form-control" value="{{ auth()->user()->employee->job_role->department->name }}" readonly>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label">Position</label>
                                        <input type="text" placeholder="Enter your position" class="form-control" value="{{ auth()->user()->employee->job_role->name }}" readonly>
                                    </div>
                                </div>
                            </div>
                                    

                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee</label>
                                <select class="form-select">
                                    <option value="">Select Employee</option>
                                    <option value="John Doe">John Doe</option>
                                    <option value="Jane Smith">Jane Smith</option>
                                    <option value="Alice Johnson">Alice Johnson</option>
                                    <option value="Bob Wilson">Bob Wilson</option>
                                </select>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Description</label>
                                <textarea rows="3" cols="3" class="form-control elastic" placeholder="Describe the Request"></textarea>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Files</label>
                                <input type="file" class="file-input" multiple="multiple">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- /Vertical form construct request modal -->