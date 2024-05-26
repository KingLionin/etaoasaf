<div class="navbar border border-top-0 rounded-bottom">
    <div class="container-fluid flex-column flex-sm-row justify-content-between">
        <a href="{{ url()->previous() }}" class=" btn btn-primary btn-block">
            Back
        </a>
        <button class="save-survey-button btn btn-primary btn-block me-3" data-bs-toggle="modal" data-bs-target="#survey_modal_form" disabled>
            Save Survey
        </button>
        <button class="add-question-button btn btn-primary btn-block">
            Add Question
        </button>
    </div>
</div>

@include('components.survey-distribute-modal')