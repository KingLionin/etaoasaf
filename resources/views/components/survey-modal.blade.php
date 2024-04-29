<div id="survey_modal_form" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-white border-0">
                <h1 class="modal-title">SURVEY DISTRIBUTION</h1>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="col-form-label col-lg-5">Distribute To (By Position):</label>
                    <select class="form-control select" id="distribute_position" name="distribute_position"
                        data-minimum-results-for-search="Infinity">
                        <option value=""> -- Select Position to Distribute -- </option>
                        @foreach($jobRoles as $jobRole)
                            <option value="{{ $jobRole->name }}">{{ $jobRole->name }}</option>
                        @endforeach
                        <option value="all">All</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label col-lg-3">Distribute Type</label>
                    <select id="distributeType" name="distributeType" class="form-control select" data-minimum-results-for-search="Infinity">
                        <option value=""> -- Select Distribute Type -- </option>
                        <optgroup label="Human Resource Events">
                            <option value="offboarding">Offboarding</option>
                            <option value="payroll">Payroll</option>
                        </optgroup>
                        <option value="schedule">Schedule</option>
                        <option value="now">Distribute Now</option>
                    </select>
                </div>
                <div id="scheduleInput" class="input-group" style="display: none;">
                    <div class="input-group datepicker-range-one-side">
                        <input type="text" id="start_date" name="start_date" class="form-control" placeholder="From">
                        <input type="text" id="end_date" name="end_date" class="form-control" placeholder="To">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="saveSurveyBtn" class="btn btn-success">Save Survey</button>
            </div>
        </div>
    </div>
</div>