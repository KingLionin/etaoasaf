@isset($survey)
<!-- components/survey-edit-modal.blade.php -->
<div class="modal fade" id="edit_modal_full" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <form id="editSurveyForm" method="POST" action="{{ route('surveys.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" id="surveyIds">
                                <div class="card-header bg-primary text-white border-0">
                                    <h3 class="card-title">Survey Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-lg-4">
                                            <h5 class="mb-0">Survey Title:</h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="editSurveyTitle" id="editSurveyTitle" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-lg-4">
                                            <h5 class="mb-0">Description:</h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <textarea name="editSurveyDescription" id="editSurveyDescription" class="form-control elastic"></textarea>
                                        </div>
                                    </div>
                                    <div class="row align-items-center align-content-center mb-3">
                                        <div class="col-lg-4">
                                            <h5 class="mb-0">Date Created:</h5>
                                        </div>
                                        <div class="col-lg-8 mt-2">
                                            <h2 id="edit_created_at"></h2>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-lg-4">
                                            <h5 class="mb-0">Distribute To:</h5>
                                        </div>
                                        <div class="col-lg-8 my-2">
                                            <select class="form-select" id="edit_distribute_position" name="edit_distribute_position">
                                                <option value=""> -- Select Position to Distribute -- </option>
                                                @foreach($jobRoles as $jobRole)
                                                <option value="{{ $jobRole->name }}">{{ $jobRole->name }}</option>
                                                @endforeach
                                                <option value="all">All Employees</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-lg-4">
                                            <h5 class="mb-0">Distribute Type:</h5>
                                        </div>
                                        <div class="col-lg-8 my-2">
                                            <select id="edit_distributeType" name="edit_distributeType" class="form-select">
                                                <option value=""> -- Select Distribute Type -- </option>
                                                <optgroup label="Human Resource Events">
                                                    <option value="offboarding">Offboarding</option>
                                                    <option value="payroll">Payroll</option>
                                                </optgroup>
                                                <option value="schedule">Schedule</option>
                                                <option value="now">Immediate Distribute</option>
                                            </select>
                                        </div>
                                        <div id="scheduleInput_edit" class="input-group my-2" style="display: none;">
                                            <span class="input-group-text">
                                                <i class="ph-calendar"></i>
                                            </span>
                                            <input type="date" id="edit_start_date" name="edit_start_date" class="form-control">
                                            <input type="date" id="edit_end_date" name="edit_end_date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div id="questions_container_edit"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-primary" id="addQuestionButton">Add Question</button>
                <div>
                    <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endisset

