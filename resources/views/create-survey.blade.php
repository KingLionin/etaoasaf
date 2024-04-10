@extends('layouts.master')

@section('title', 'Create Survey')

@section('content')
<div class="content">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Survey Information</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <input type="text" placeholder="Enter Survey Title" class="form-control" />
            </div>
            <div class="mb-3">
                <textarea placeholder="Enter Survey Description" class="form-control elastic"></textarea>
            </div>
        </div>
    </div>

    <div class="card question-card mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Question 1</h5>
            <div class="question-card-actions g-3">
                <div class="d-flex align-items-center me-2">
                    <a href="#" class="me-2 delete-question" data-bs-popup="tooltip" title="Delete"
                        data-bs-placement="top">
                        <i class="text-white ph-trash"></i>
                    </a>
                    <div class="me-2" style="border-left: 1px solid rgba(255,255,255,0.5); height: 30px; margin-right: 5px;"></div>
                    <div class="form-check form-switch text-white d-flex align-items-center">
                        <input type="checkbox" class="form-check-input form-check-input-white me-2" id="dc_rss_u">
                        <label class="form-check-label" for="dc_rss_u">Required</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 mb-3">
                    <input type="text" placeholder="Enter your Question" class="form-control" />
                </div>
                <div class="col-md-2 mb-3">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="inputTypeDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Input Types
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="inputTypeDropdown">
                            <li><a class="dropdown-item" href="#" data-input-type="text"><i class="ph ph-text-align-left me-2"></i>Textfield</a></li>
                            <li><a class="dropdown-item" href="#" data-input-type="textarea"><i class="ph ph-text-align-justify me-2"></i>Textarea</a></li>
                            <hr />
                            <li><a class="dropdown-item" href="#" data-input-type="radio"><i class="ph ph-radio-button me-2"></i>Radio Button</a></li>
                            <li><a class="dropdown-item" href="#" data-input-type="checkbox"><i class="ph ph-check-square me-2"></i>Checkboxes</a></li>
                            <li><a class="dropdown-item" href="#" data-input-type="dropdown"><i class="ph ph-caret-down me-2"></i>Dropdown</a></li>
                            <li><a class="dropdown-item" href="#" data-input-type="scale"><i class="ph ph-dots-three-outline me-2"></i>Linear Scale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="input-fields" id="questionConstructor">
                        <!-- This is where the dynamically shown input field will be placed -->
                        <!-- Default input field (textfield) -->
                        <input type="text" placeholder="Enter answer" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="question-cards-container">
         <!-- Existing question cards go here -->
    </div>

</div>

@section('survey-footer-content')
@include('components.survey-footer')
@endsection
@endsection

@section('center-scripts')

@endsection

@section('scripts')
 <script src="{{URL::asset('assets/demo/pages/components_tooltips.js')}}"></script>
@endsection