@isset($survey)
<div class="modal fade" id="view_modal_full" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header bg-primary text-white border-0">
                                <h3 class="card-title">Survey Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <h5 class="mb-1">Survey Title:</h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <h6 id="survey_title"></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <h5 class="mb-1">Description:</h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 style="word-wrap: break-word;" id="survey_description"></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <h5 class="mb-1">Date Created:</h5>
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 id="created_at"></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <h5 class="mb-1">Distribute To:</h5>
                                    </div>
                                    @if($survey->distribute_position == "all")
                                    <div class="col-lg-8">
                                        <h5>All Employees</h5>
                                    </div>
                                    @else
                                    <div class="col-lg-8">
                                        <h5 class="text-capitalize" id="distribute_position"></h5>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <h5 class="mb-1">Distribute Type:</h5>
                                    </div>
                                    @if($survey->distribute_type == 'Schedule')
                                    <div class="col-lg-8">
                                        <h5 id="distribute_type" style="word-wrap: break-word;"></h5>
                                    </div>
                                    @else
                                    <div class="col-lg-8 text-capitalize">
                                        <h5 id="distribute_type"></h5>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                       <div id="questions_container"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endisset
