/************************************************************************************************************************/

/* 
 *
 * Survey View Table
 * 
 */
$(document).on('click', '.view-survey-btn', function () {
    var surveyId = $(this).data('survey-view-id');
    $.ajax({
        url: '/surveys/view/' + surveyId, // Create a route to handle this request
        method: 'GET'
        , success: function (response) {
            $('#survey_title').text(response.survey_title);
            $('#survey_description').text(response.survey_description);
            $('#created_at').text(moment(response.created_at).format('MMMM DD, YYYY'));
            $('#distribute_position').text(response.distribute_position);
            if (response.distribute_type === 'Schedule') {
                $('#distribute_type').text(response.start_date + ' to ' + response.end_date);
            } else {
                $('#distribute_type').text(response.distribute_type);
            }

            var questionsHtml = '';
            response.questions.forEach(function (question) {
                questionsHtml += '<div class="card">';
                questionsHtml += '<div class="card-header bg-primary text-white border-0">';
                questionsHtml += '<h3 class="card-title">' + question.question + '</h3>';
                questionsHtml += '</div>';
                questionsHtml += '<div class="card-body">';
                if (question.type === 'text') {
                    questionsHtml += '<input type="text" class="form-control" name="' + question.id + '" placeholder="Show textfield" disabled />';
                } else if (question.type === 'textarea') {
                    questionsHtml += '<textarea class="form-control elastic" name="' + question.id + '" placeholder="Show textarea" disabled></textarea>';
                } else {
                    question.options.forEach(function (option) {
                        questionsHtml += '<div class="form-check mb-3">';
                        if (question.type === 'radio') {
                            questionsHtml += '<input class="form-check-input" type="radio" name="' + question.id + '[]" disabled />';
                            questionsHtml += '<label>' + option.value + '</label>';
                        } else if (question.type === 'checkbox') {
                            questionsHtml += '<input class="form-check-input" type="checkbox" name="' + question.id + '[]" disabled />';
                            questionsHtml += '<label>' + option.value + '</label>';
                        } else {
                            questionsHtml += '<p>Option is not recognized</p>';
                        }
                        questionsHtml += '</div>';
                    });
                }
                questionsHtml += '</div>';
                questionsHtml += '</div>';
            });

            $('#questions_container').html(questionsHtml);
        }
        , error: function () {
            alert('Failed to load survey details.');
        }
    });
});

/************************************************************************************************************************/

/* 
 *
 * Survey Edit Table
 * 
 */

// Function to validate the survey form
function validateSurveyForm() {
    const editsurveyTitle = document.getElementById('editSurveyTitle');
    const editdistributeType = document.getElementById('edit_distributeType');
    const editdistributePosition = document.getElementById('edit_distribute_position');
    const editstartDate = document.getElementById('edit_start_date');
    const editendDate = document.getElementById('edit_end_date');

    let isValid = true;

    // Check required fields
    if (editsurveyTitle.value.trim() === '') {
        console.log('Survey Title is null');
        Swal.fire({
            icon: 'warning',
            title: 'Survey Title',
            text: 'Survey Title is required',
            allowOutsideClick: false,
        });
        editsurveyTitle.focus();
        isValid = false;
    }

    if (editdistributePosition.value.trim() === '') {
        console.log('Type of Employee Distribution is null');
        Swal.fire({
            icon: 'warning',
            title: 'Type of Employee Distribution',
            text: 'Type of Employee Distribution is required',
            allowOutsideClick: false,
        });
        editdistributePosition.focus();
        isValid = false;
    }

    if (editdistributeType.value.trim() === '') {
        console.log('Type of Survey Distribution is null');
        Swal.fire({
            icon: 'warning',
            title: 'Type of Survey Distribution',
            text: 'Type of Survey Distribution is required',
            allowOutsideClick: false,
        });
        editdistributeType.focus();
        isValid = false;
    }

    if (editdistributeType.value === 'schedule') {
        if (editstartDate.value === '') {
            console.log('Start Date of Schedule Survey is null');
            Swal.fire({
                icon: 'warning',
                title: 'Start Date of Schedule Survey',
                text: 'Start Date of Schedule Survey is required',
                allowOutsideClick: false,
            });
            editstartDate.focus();
            isValid = false;
        } else if (editendDate.value === '') {
            console.log('Start Date of Schedule Survey is null');
            Swal.fire({
                icon: 'warning',
                title: 'End Date of Schedule Survey',
                text: 'End Date of Schedule Survey is required',
                allowOutsideClick: false,
            });
            editendDate.focus();
            isValid = false;
        }
    }

    // Additional validation for start_date and end_date
    if (editstartDate.value && editendDate.value) {
        const start = new Date(editstartDate.value);
        const end = new Date(editendDate.value);

        if (start > end) {
            console.log('End date is earlier than start date');
            Swal.fire({
                icon: 'error',
                title: 'Invalid Date Range',
                text: 'End date cannot be earlier than start date.',
                allowOutsideClick: false,
            });
            editendDate.focus();
            isValid = false;
        }
    }

    // Check required fields for questions
    const questionInputs = document.querySelectorAll('.question-input');
    questionInputs.forEach(input => {
        if (!input.value.trim()) {
            console.log('Question Input field is null');
            Swal.fire({
                icon: 'warning',
                title: 'Question Input Field',
                text: 'Question Input Field is required',
                allowOutsideClick: false,
            });
            input.focus();
            isValid = false;
            return false; // Note: Returning false in forEach does not break out of the loop, consider using a for loop if you need to break early.
        }
    });

    return isValid;
}

$(document).ready(function () {
    $('#edit_modal_full').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var surveyId = button.data('survey-edit-id');
        var modal = $(this);

        // Fetch the survey data using AJAX
        $.get('/surveys/edit/' + surveyId, function (data) {
            // Populate the modal fields with the survey data
            $('#surveyIds').val(surveyId);
            $('#editSurveyTitle').val(data.survey_title);
            $('#editSurveyDescription').val(data.survey_description);
            $('#edit_created_at').text(moment(data.created_at).format('MMMM DD, YYYY')); // Corrected this line
            // Populate distribute_position field
            $('#edit_distribute_position').val(data.distribute_position);

            // Populate distributeType field
            $('#edit_distributeType').val(data.distribute_type).trigger('change');

            // Populate start_date field
            $('#edit_start_date').val(data.start_date);

            // Populate end_date field
            $('#edit_end_date').val(data.end_date);

            // Populate the questions and options
            var questionsContainer = $('#questions_container_edit');
            questionsContainer.empty();

            data.questions.forEach(function (question, index) {
                var questionHtml = generateQuestionCard(question, index);
                questionsContainer.append(questionHtml);
            });
        });

    });
});

$('#editSurveyForm').submit(function (event) {
    event.preventDefault();
    var formData = new FormData(this);

    if (!validateSurveyForm()) {
        return; // Exit if validation fails
    }

    // Debug: Log FormData contents
    for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }


    // Fetch the questions data and append it to the FormData
    var questionsData = getQuestionsData();
    questionsData.forEach((question, index) => {
        formData.append(`questions[${index}][question]`, question.question);
        formData.append(`questions[${index}][type]`, question.type);
        question.options.forEach((option, optionIndex) => {
            formData.append(`questions[${index}][options][${optionIndex}]`, option);
        });
    });

    // Include the CSRF token in the headers
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Send AJAX request to update the edited survey data
    $.ajax({
        url: '/surveys/update'
        , method: 'POST'
        , data: formData
        , contentType: false
        , processData: false
        , headers: {
            'X-CSRF-TOKEN': csrfToken
        }
        , success: function (response) {
            // Handle successful response from server
            console.log(response);
        }
        , error: function (xhr, status, error) {
            // Handle error response from server
            console.error(xhr.responseText);
        }
    });
});

// Function to retrieve the questions data from the DOM
function getQuestionsData() {
    var questionsData = [];
    $('.question-card').each(function () {
        var question = $(this).find('input[name="question"]').val();
        var type = $(this).find('select[name="type"]').val();
        var options = [];

        // Retrieve options if available
        $(this).find('input[name="option"]').each(function () {
            var optionValue = $(this).val();
            if (optionValue.trim() !== '') {
                options.push(optionValue);
            }
        });

        // Add question data to the array
        questionsData.push({
            question: question
            , type: type
            , options: options
        });
    });
    return questionsData;
}

$('#addQuestionButton').click(function () {
    var questionsContainer = $('#questions_container_edit');
    var newQuestionIndex = questionsContainer.children('.question-card').length;
    var newQuestionHtml = generateQuestionCard({
        type: 'text'
        , question: ''
        , options: []
    }, newQuestionIndex);
    questionsContainer.append(newQuestionHtml);
});

function generateQuestionCard(question, index) {
    return `
        <div class="card mb-3 question-card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Question ${index + 1}</h5>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteQuestion(this)">Delete</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9 mb-3">
                        <input type="text" name="question" placeholder="Enter your Question" class="form-control question-input" value="${question.question}" required/>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select name="type" class="form-select dropdown-toggle" onchange="changeQuestionType(this)">
                            <option value="text" ${question.type === 'text' ? 'selected' : ''}>Textfield</option>
                            <option value="textarea" ${question.type === 'textarea' ? 'selected' : ''}>Textarea</option>
                            <option value="radio" ${question.type === 'radio' ? 'selected' : ''}>Radio Button</option>
                            <option value="checkbox" ${question.type === 'checkbox' ? 'selected' : ''}>Checkboxes</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="input-fields">${generateInputFields(question)}</div>
                    </div>
                </div>
            </div>
        </div>`;
}

function generateInputFields(question) {
    var inputFields = '';
    if (question.type === 'text') {
        // Check if question.value is an object and use question.value.value or a similar property
        var value = (typeof question.value === 'object' && question.value !== null) ? question.value.value : question.value || '';
        inputFields = `
        <div class="input-group mb-3 d-flex align-items-center">
            <input type="text" class="form-control" placeholder="Show Textfield" value="${value}" disabled/>
        </div>`;
    } else if (question.type === 'textarea') {
        // Similarly for textarea
        var value = (typeof question.value === 'object' && question.value !== null) ? question.value.value : question.value || '';
        inputFields = `<textarea class="form-control" placeholder="Show Textarea" disabled>${value}</textarea>`;
    } else if (question.type === 'radio' || question.type === 'checkbox') {
        if (question.options && question.options.length > 0) {
            question.options.forEach(function (option) {
                // Check if option is an object and use option.value or a similar property
                var optionValue = (typeof option === 'object' && option !== null) ? option.value : option;
                inputFields += `
                <div class="form-check mb-3 d-flex align-items-center">
                    <input class="form-check-input me-2" type="${question.type}" value="${optionValue}" disabled>
                    <input type="text" name="option" class="form-control" placeholder="Enter an option" value="${optionValue}">
                    <button class="btn btn-outline-danger ms-2" type="button" onclick="deleteOption(this)">X</button>
                </div>`;
            });
        } else {
            inputFields += `
            <div class="form-check mb-3 d-flex align-items-center">
                <input class="form-check-input me-2" type="${question.type}" disabled>
                <input type="text" name="option" class="form-control" placeholder="Enter an option">
                <button class="btn btn-outline-danger ms-2" type="button" onclick="deleteOption(this)">X</button>
            </div>`;
        }
        inputFields += `<button type="button" class="btn btn-outline-primary add-option" onclick="addOption(this)">Add Option</button>`;
    }
    return inputFields;
}

function addOption(button) {
    var container = $(button).closest('.card-body').find('.input-fields');
    var questionType = $(button).closest('.card-body').find('.form-select').val();
    var optionHtml = '<div class="form-check mb-3 d-flex align-items-center">' +
        '<input class="form-check-input me-2" type="' + questionType + '" value="">' +
        '<input type="text" name="option" class="form-control" placeholder="Enter an option">' +
        '<button class="btn btn-outline-danger ms-2" type="button" onclick="deleteOption(this)">X</button>' +
        '</div>';

    // Append the new option before the "Add Option" button
    $(button).before(optionHtml);
}

function deleteOption(button) {
    $(button).closest('.form-check').remove();
}

function deleteQuestion(button) {
    var card = $(button).closest('.card');
    card.remove();

    // Renumber the remaining questions
    $('.card.question-card').each(function (index) {
        $(this).find('.card-header h5').text('Question ' + (index + 1));
    });
}

function changeQuestionType(select) {
    var container = $(select).closest('.card').find('.input-fields');
    var type = $(select).val();
    var existingOptions = [];

    // Collect current options if the question has them
    container.find('.form-check').each(function () {
        var optionValue = $(this).find('input[type="text"]').val();
        existingOptions.push(optionValue);
    });

    var inputFields = generateInputFields({
        type: type
        , options: existingOptions
    });
    container.html(inputFields);
}

$(document).ready(function () {
    // Function to show/hide the datepicker when "Schedule" is selected
    $('#edit_distributeType').change(function () {
        var selectedOption = $(this).val();
        if (selectedOption === 'schedule') {
            $('#scheduleInput_edit').show();
        } else {
            $('#scheduleInput_edit').hide();
        }
    });
});
