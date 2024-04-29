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
                <input type="text" id="survey_title" name="survey_title" placeholder="Enter Survey Title" class="form-control" required/>
            </div>
            <div class="mb-3">
                <textarea placeholder="Enter Survey Description" name="survey_description" id="survey_description" class="form-control elastic" required></textarea>
            </div>
        </div>
    </div>

    <div class="card question-card mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Question 1</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 mb-3">
                    <input type="text" placeholder="Enter your Question" class="form-control" />
                </div>
                <div class="col-md-3 mb-3">
                    <div class="col-md-12">
                        <select class="form-select dropdown-toggle" id="inputTypeDropdown">
                            <option class="dropdown-item" name="text" value="text">Textfield</option>
                            <option class="dropdown-item" name="textarea" value="textarea">Textarea</option>
                            <option class="dropdown-item" name="radio" value="radio">Radio Button</option>
                            <option class="dropdown-item" name="checkbox" value="checkbox">Checkboxes</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="input-fields" id="questionConstructor">
                        <!-- This is where the dynamically shown input field will be placed -->
                        <!-- Default input field (textfield) -->
                        <input type="text" placeholder="Show textfield" id="question" name="question" class="form-control" disabled/>
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
<script src="{{URL::asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/forms/selects/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/ui/moment/moment.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/pickers/daterangepicker.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/pickers/datepicker.min.js')}}"></script>
@endsection

@section('scripts')
 <script src="{{URL::asset('assets/js/custom.js')}}"></script>
 <script src="{{URL::asset('assets/demo/pages/components_tooltips.js')}}"></script>
 <script src="{{URL::asset('assets/demo/pages/form_select2.js')}}"></script>
 <script src="{{URL::asset('assets/demo/pages/picker_date.js')}}"></script>
@endsection