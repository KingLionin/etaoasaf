<!-- Vertical form construct request modal -->
<div id="modal_form_construct_request_vertical" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary border-0 d-flex justify-content-center align-content-center">
                <h5 class="modal-title">REQUEST FORM</h5>
            </div>

            <form action="{{ route('submit.form') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Employee</label>
                            <select class="form-select" name="employee_id">
                                <option value="">-- Select an Employee --</option>
                                @foreach($employees->groupBy('job_role.department.name') as $department => $employeesInDepartment)
                                    <optgroup label="{{ $department }}">
                                        @foreach($employeesInDepartment as $employee)
                                            @if($employee->job_role->name == 'Manager')
                                                <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                                    {{ $employee->middle_name }} {{ $employee->last_name }} -
                                                    {{ $employee->job_role->name }}</option>
                                            @endif
                                        @endforeach
                                        @foreach($employeesInDepartment as $employee)
                                            @unless($employee->job_role->name == 'Manager')
                                                <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                                    {{ $employee->middle_name }} {{ $employee->last_name }}</option>
                                            @endunless
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Type of Request</label>
                            <select class="form-select" name="type_of_request">
                                <option value="Resignation">Resignation</option>
                                <option value="Retirement">Retirement</option>
                                <option value="Contractual Breach">Conctractual Breach</option>
                                <option value="Involuntary Resignation">Involuntary Resignation</option>
                                <option value="Offload">Offload</option>
                            </select>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea rows="3" cols="3" class="form-control elastic" placeholder="Describe the Request"
                                name="description"></textarea>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Files</label>
                            <input type="file" class="file-input" multiple="multiple" name="files[]">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Request Form</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Vertical form construct request modal -->