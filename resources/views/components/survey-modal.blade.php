<div id="survey_modal_form" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-white border-0">
                <h1 class="modal-title">SURVEY DISTRIBUTION</h1>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="col-form-label col-lg-3 mt-3">Distribute To (By Position):</label>
                    <select class="form-control select" data-minimum-results-for-search="Infinity">
                        <option>Managerial</option>
                        <option>Supervisory</option>
                        <option>Rank and File</option>
                        <option>All</option>
                    </select>
                    <label class="col-form-label col-lg-3">Distribute Type</label>
                    <select id="distributeType" class="form-control select" data-minimum-results-for-search="Infinity">
                        <optgroup label="Human Resource Events">
                            <option>Offboarding</option>
                            <option>Payroll</option>
                        </optgroup>
                        <option>Schedule</option>
                        <option>Distribute Now</option>
                    </select>
                    <div id="scheduleInput" class="input-group" style="display: none;">
                        <label class="col-form-label col-lg-3 mt-3">Schedule</label>
                        <span class="input-group-text"><i class="ph-calendar"></i></span>
                        <input type="text" class="form-control daterange-weeknumbers" value="03/18/2024 - 03/23/2024">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save Survey</button>
            </div>
        </div>
    </div>
</div>

