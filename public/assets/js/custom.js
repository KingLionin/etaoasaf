/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

/************************************************************************************************************************/

/* 
 *
 * Create Survey page
 * 
 */

//For the dropdown options functions
document.addEventListener("DOMContentLoaded", function () {

    let optionCounter = 1; // Initialize option counter

    // Event listener for dropdown menu options
    const dropdownItems = document.querySelectorAll('#inputTypeDropdown');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            const inputType = this.value;
            if (inputType === "text") {
                updateQuestionConstructorForText();
            } else if (inputType === "textarea") {
                updateQuestionConstructorForTextarea();
            } else if (inputType === "radio") {
                updateQuestionConstructorForRadio();
            } else if (inputType === "checkbox") {
                updateQuestionConstructorForCheckbox();
            } else {
                throw new Error('Invalid input type');
            }
        });
    });

    // Function to update question constructor for textfield
    function updateQuestionConstructorForText() {
        const questionConstructor = document.getElementById('questionConstructor');
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create textfield
        const textField = createTextField();
        textField.placeholder = "Show textfield";
        textField.disabled = true;
        questionConstructor.appendChild(textField);
    }

    // Function to update question constructor for textarea
    function updateQuestionConstructorForTextarea() {
        const questionConstructor = document.getElementById('questionConstructor');
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create textarea
        const textarea = createTextarea();
        textarea.placeholder = "Show textarea";
        textarea.disabled = true;
        questionConstructor.appendChild(textarea);
    }

    // Function to create a radio button option
    function createRadioButtonOption() {
        const optionWrapperRadio = document.createElement('div');
        optionWrapperRadio.classList.add('radio-option-wrapper', 'mb-2', 'd-flex', 'align-items-center');

        // Create radio button
        const radioButton = document.createElement('input');
        radioButton.type = "radio";
        radioButton.classList.add('form-check-input');
        radioButton.style.marginRight = '10px';
        radioButton.disabled = true;
        optionWrapperRadio.appendChild(radioButton);

        // Create corresponding textfield
        const textField = createTextField();
        textField.placeholder = "Option";
        optionWrapperRadio.appendChild(textField);

        // Create delete button
        const deleteButton = createDeleteButton();
        deleteButton.addEventListener('click', function () {
            optionWrapperRadio.remove();
        });
        optionWrapperRadio.appendChild(deleteButton);

        return optionWrapperRadio;
    }

    // Function to create 'Add Option' button
    function createAddOptionButton() {
        const addOptionButton = document.createElement('button');
        addOptionButton.innerHTML = 'Add Option';
        addOptionButton.classList.add('btn', 'btn-secondary');
        return addOptionButton;
    }

    // Function to update question constructor for radio button
    function updateQuestionConstructorForRadio() {
        const questionConstructor = document.getElementById('questionConstructor');
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create default radio button option
        const defaultOption = createRadioButtonOption();
        questionConstructor.appendChild(defaultOption);

        // Create 'Add Option' button
        const addOptionButton = createAddOptionButton();
        questionConstructor.appendChild(addOptionButton);

        // Event listener for 'Add Option' button
        addOptionButton.addEventListener('click', function () {
            const newOption = createRadioButtonOption();
            questionConstructor.insertBefore(newOption, this);
        });
    }

    // Function to create a checkbox option
    function createCheckboxOption() {
        const optionWrapperCheckbox = document.createElement('div');
        optionWrapperCheckbox.classList.add('checkbox-option-wrapper', 'mb-2', 'd-flex', 'align-items-center');

        // Create checkbox
        const checkBox = document.createElement('input');
        checkBox.type = "checkbox";
        checkBox.classList.add('form-check-input');
        checkBox.style.marginRight = '10px';
        checkBox.disabled = true;
        optionWrapperCheckbox.appendChild(checkBox);

        // Create corresponding textfield
        const textField = createTextField();
        textField.placeholder = "Option";
        optionWrapperCheckbox.appendChild(textField);

        // Create delete button
        const deleteButton = createDeleteButton();
        deleteButton.addEventListener('click', function () {
            optionWrapperCheckbox.remove();
        });
        optionWrapperCheckbox.appendChild(deleteButton);

        return optionWrapperCheckbox;
    }

    // Function to update question constructor for Checkbox
    function updateQuestionConstructorForCheckbox() {
        const questionConstructor = document.getElementById('questionConstructor');
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create default Checkbox option
        const defaultOption = createCheckboxOption();
        questionConstructor.appendChild(defaultOption);

        // Create 'Add Option' button
        const addOptionButton = createAddOptionButton();
        questionConstructor.appendChild(addOptionButton);

        // Event listener for 'Add Option' button
        addOptionButton.addEventListener('click', function () {
            const newOption = createCheckboxOption();
            questionConstructor.insertBefore(newOption, this);
        });
    }

    // Function to create a text field
    function createTextField() {
        const textField = document.createElement('input');
        textField.type = "text";
        textField.classList.add('form-control' ,'option-input');
        return textField;
    }

    // Function to create a textarea
    function createTextarea() {
        const textarea = document.createElement('textarea');
        textarea.classList.add('form-control', 'option-input');
        return textarea;
    }

    // Function to create a delete button
    function createDeleteButton() {
        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = 'X';
        deleteButton.classList.add('btn', 'btn-danger', 'ms-2');
        return deleteButton;
    }
});


/************************************************************************************************************************/

/* 
 *
 * Survey-footer
 * 
 */

document.addEventListener("DOMContentLoaded", function () {

    // Function to update save button based on the number of question cards
    function updateSaveButton() {
        const questionCardsCount = document.querySelectorAll('.question-card').length;
        const saveButton = document.querySelector('.save-survey-button');
        if (questionCardsCount >= 2) {
            saveButton.removeAttribute('disabled');
        } else {
            saveButton.setAttribute('disabled', 'disabled');
        }
    }

    // Function to update question constructor for textfield
    function updateQuestionConstructorForText(questionConstructor) {
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Enter answer";
        textField.classList.add('form-control');
        textField.disabled = true;
        questionConstructor.appendChild(textField);
    }

    // Function to update question constructor for textarea
    function updateQuestionConstructorForTextarea(questionConstructor) {
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create textarea
        const textarea = document.createElement('textarea');
        textarea.placeholder = "Enter answer";
        textarea.classList.add('form-control');
        textarea.disabled = true;
        questionConstructor.appendChild(textarea);
    }

    // Function to create a radio button option
    function createRadioButtonOption() {
        const optionWrapperRadio = document.createElement('div');
        optionWrapperRadio.classList.add('radio-option-wrapper', 'mb-2', 'd-flex', 'align-items-center');

        // Create radio button
        const radioButton = document.createElement('input');
        radioButton.type = "radio";
        radioButton.classList.add('form-check-input');
        radioButton.style.marginRight = '10px';
        radioButton.disabled = true;
        optionWrapperRadio.appendChild(radioButton);

        // Create corresponding textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Option";
        textField.classList.add('form-control', 'flex-grow-1', 'option-input');
        optionWrapperRadio.appendChild(textField);

        // Create delete button
        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = 'X';
        deleteButton.classList.add('btn', 'btn-danger', 'ms-2');
        deleteButton.addEventListener('click', function () {
            optionWrapperRadio.remove();
        });
        optionWrapperRadio.appendChild(deleteButton);

        return optionWrapperRadio;
    }

    // Function to create 'Add Option' button
    function createAddOptionButton() {
        const addOptionButton = document.createElement('button');
        addOptionButton.innerHTML = 'Add Option';
        addOptionButton.classList.add('btn', 'btn-secondary');
        return addOptionButton;
    }

    // Function to update question constructor for radio button
    function updateQuestionConstructorForRadio(questionConstructor) {
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create default radio button option
        const defaultOption = createRadioButtonOption();
        questionConstructor.appendChild(defaultOption);

        // Create 'Add Option' button
        const addOptionButton = createAddOptionButton();
        questionConstructor.appendChild(addOptionButton);

        // Event listener for 'Add Option' button
        addOptionButton.addEventListener('click', function () {
            const newOption = createRadioButtonOption();
            questionConstructor.insertBefore(newOption, this);
        });
    }

    // Function to create a checkbox option
    function createCheckboxOption() {
        const optionWrapperCheckbox = document.createElement('div');
        optionWrapperCheckbox.classList.add('checkbox-option-wrapper', 'mb-2', 'd-flex', 'align-items-center');

        // Create radio button
        const checkBox = document.createElement('input');
        checkBox.type = "checkbox";
        checkBox.classList.add('form-check-input');
        checkBox.style.marginRight = '10px';
        checkBox.disabled = true;
        optionWrapperCheckbox.appendChild(checkBox);

        // Create corresponding textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Option";
        textField.classList.add('form-control', 'flex-grow-1', 'option-input');
        optionWrapperCheckbox.appendChild(textField);

        // Create delete button
        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = 'X';
        deleteButton.classList.add('btn', 'btn-danger', 'ms-2');
        deleteButton.addEventListener('click', function () {
            optionWrapperCheckbox.remove();
        });
        optionWrapperCheckbox.appendChild(deleteButton);

        return optionWrapperCheckbox;
    }

    // Function to update question constructor for Checkbox
    function updateQuestionConstructorForCheckbox(questionConstructor) {
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create default Checkbox option
        const defaultOption = createCheckboxOption();
        questionConstructor.appendChild(defaultOption);

        // Create 'Add Option' button
        const addOptionButton = createAddOptionButton();
        questionConstructor.appendChild(addOptionButton);

        // Event listener for 'Add Option' button
        addOptionButton.addEventListener('click', function () {
            const newOption = createCheckboxOption();
            questionConstructor.insertBefore(newOption, this);
        });
    }

    let questionCounter = document.querySelectorAll('.question-card').length; // Counter for question numbers

    // Function to add a new question card
    function addQuestionCard() {
        const questionCardsContainer = document.querySelector('.question-cards-container');

        // Create a new question card
        const newQuestionCard = document.createElement('div');
        newQuestionCard.classList.add('card', 'question-card', 'mb-4');

        // Increment question counter for this card
        questionCounter++;

        // Generate unique IDs for dropdown elements within this card
        const inputTypeDropdownId = `inputTypeDropdown${questionCounter}`;
        const inputFieldsId = `inputFields${questionCounter}`;
        const questionId = `question${questionCounter}`;

        // Create header for the question card
        const cardHeader = document.createElement('div');
        cardHeader.classList.add('card-header', 'bg-primary', 'text-white', 'd-flex', 'justify-content-between', 'align-items-center');
        cardHeader.innerHTML = `<h5 class="mb-0">Question ${questionCounter}</h5>
                            <div class="question-card-actions g-3">
                                <div class="d-flex align-items-center me-2">
                                    <a href="#" class="me-2 delete-question" data-bs-toggle="tooltip" title="Delete" data-bs-placement="top">
                                        <i class="text-white ph-trash"></i>
                                    </a>
                                </div>
                            </div>`;

        // Append header to the question card
        newQuestionCard.appendChild(cardHeader);

        // Create body for the question card
        const cardBody = document.createElement('div');
        cardBody.classList.add('card-body');
        cardBody.innerHTML = `<div class="row">
                            <div class="col-md-9 mb-3">
                                <input type="text" placeholder="Enter your Question" class="form-control" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="col-md-12">
                                    <select class="form-select dropdown-toggle" id="${inputTypeDropdownId}">
                                        <option class="dropdown-item" name="text" value="text">Textfield</option>
                                        <option class="dropdown-item" name="textarea" value="textarea">Textarea</option>
                                        <option class="dropdown-item" name="radio" value="radio">Radio Button</option>
                                        <option class="dropdown-item" name="checkbox" value="checkbox">Checkboxes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-fields" id="${inputFieldsId}" data-question-number="${questionCounter}">
                                    <!-- This is where the dynamically shown input field will be placed -->
                                    <!-- Default input field (textfield) -->
                                    <input type="text" placeholder="Show Textfield" id="${questionId}" name="question" class="form-control" disabled/>
                                </div>
                            </div>
                        </div>`;

        // Append body to the question card
        newQuestionCard.appendChild(cardBody);

        // Append the new question card to the container
        questionCardsContainer.appendChild(newQuestionCard);

        // Enable tooltips for newly created delete icons
        const newDeleteIcon = newQuestionCard.querySelector('.delete-question');
        const tooltip = new bootstrap.Tooltip(newDeleteIcon);
        newDeleteIcon.addEventListener('click', function (event) {
            deleteQuestionCard(newQuestionCard);
            tooltip.hide();
            updateQuestionNumbers(); // Update question numbers after deletion
        });

        // Event listener for dropdown menu options
        const dropdownItems = newQuestionCard.querySelectorAll(`#${inputTypeDropdownId}`);
        dropdownItems.forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                const inputType = this.value;
                const questionCard = this.closest('.question-card');
                let questionConstructor = null;
                if (questionCard) {
                    questionConstructor = questionCard.querySelector('.input-fields');
                }
                if (!questionConstructor) {
                    questionConstructor = document.getElementById('questionConstructor');
                }
                if (inputType === "text") {
                    updateQuestionConstructorForText(questionConstructor);
                } else if (inputType === "textarea") {
                    updateQuestionConstructorForTextarea(questionConstructor);
                } else if (inputType === "radio") {
                    updateQuestionConstructorForRadio(questionConstructor);
                } else if (inputType === "checkbox") {
                    updateQuestionConstructorForCheckbox(questionConstructor);
                } else {
                    console.log('error');
                }
            });
        });

        // Call updateSaveButton after adding a question card
        updateSaveButton();
        // Call updateQuestionNumbers after adding a question card
        updateQuestionNumbers();
    }

    // Function to delete the question card
    function deleteQuestionCard(questionCard) {
        questionCard.remove();
        // Call updateQuestionNumbers after deleting a question card
        updateQuestionNumbers();
    }

    // Function to update question numbers
    function updateQuestionNumbers() {
        const questionHeaders = document.querySelectorAll('.question-card .card-header h5');
        questionHeaders.forEach((header, index) => {
            const questionNumber = index + 1;
            header.textContent = `Question ${questionNumber}`;
        });
        // Update questionCounter to match the number of question cards
        questionCounter = document.querySelectorAll('.question-card').length;
    }

    // Event listener for Add Question button
    const addQuestionButton = document.querySelector('.add-question-button');
    addQuestionButton.addEventListener('click', addQuestionCard);

    // Function to enable/disable save button when the page loads
    updateSaveButton();

    // Event listener to hide tooltip when delete icon is clicked
    const questionCardsContainer = document.querySelector('.question-cards-container');
    questionCardsContainer.addEventListener('click', function (event) {
        const deleteIcon = event.target.closest('.delete-question');
        if (deleteIcon) {
            const tooltip = bootstrap.Tooltip.getInstance(deleteIcon);
            if (tooltip) {
                tooltip.hide();
            }
        }
    });
});

/************************************************************************************************************************/

/* 
 *
 * Survey-modal
 * 
 */

$(document).ready(function () {
    // Function to show/hide the datepicker when "Schedule" is selected
    $('#distributeType').change(function () {
        var selectedOption = $(this).val();
        if (selectedOption === 'Schedule') {
            $('#scheduleInput').show();
        } else {
            $('#scheduleInput').hide();
        }
    });
});

/************************************************************************************************************************/

/* 
 *
 * Survey-footer save function
 * 
 */

// Function to retrieve survey data from the form
function getSurveyData() {
    const surveyTitle = document.getElementById('survey_title').value;
    const surveyDescription = document.getElementById('survey_description').value;
    
    const questions = [];
    const questionCards = document.querySelectorAll('.question-card');
    questionCards.forEach(questionCard => {
        const questionTitleInput = questionCard.querySelector('.card-body input[type="text"]');
        const questionTitle = questionTitleInput.value;
        const questionTypeSelect = questionCard.querySelector('.card-body select');
        const questionType = questionTypeSelect.value;

        const options = [];
        const optionIds = []; // Initialize option IDs array

        const optionInputs = questionCard.querySelectorAll('.card-body input[type="text"].option-input');
        optionInputs.forEach((optionInput, index) => {
            options.push(optionInput.value);
            // Assign option ID based on index (assuming options are added sequentially)
            optionIds.push(index + 1);
        });

        const questionId = questionCard.dataset.questionId; // Add this line to get the question ID

        // Push question data along with options and IDs
        questions.push({
            id: questionId, // Add question ID
            question: questionTitle,
            type: questionType,
            options: options,
            option_ids: optionIds // Add option IDs
        });
    });

    return {
        survey_title: surveyTitle,
        survey_description: surveyDescription,
        questions: questions
    };
}

// Function to save the survey data
function saveSurvey() {
    const surveyData = getSurveyData();

    const distribute_position = document.getElementById('distribute_position').value; // Retrieve selected position
    const distributeType = document.getElementById('distributeType').value; // Retrieve selected distribution type
    const start_date = document.getElementById('start_date').value; // Get the start_date schedule
    const end_date = document.getElementById('end_date').value; // Get the end_date schedule

    // Add distribution details to the survey data
    surveyData.distribute_position = distribute_position;
    surveyData.distributeType = distributeType;
    surveyData.start_date = start_date;
    surveyData.end_date = end_date;

    // Close the modal
    $('#survey_modal_form').modal('hide');

    // Show loading indicator
    Swal.fire({
        title: 'Saving Survey',
        html: 'Please wait...',
        allowOutsideClick: false,
        showConfirmButton: false, // Remove the confirm button
        willOpen: () => {
            Swal.showLoading();
        }
    });

    fetch('/api/save-survey', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(surveyData)
    })
    .then(response => {
        if (response.ok) {
            console.log('Survey saved successfully!');
            Swal.fire({
                icon: 'success',
                title: 'Survey Saved',
                text: 'Your survey has been saved successfully!',
                allowOutsideClick: false,
                didClose: () => {
                    window.location.href = '/etaoasaf/employee_survey_and_feedback/survey'; // Redirect to survey table
                }
            });
        } else {
            console.error('Failed to save survey');
            Swal.fire({
                icon: 'error',
                title: 'Failed to Save Survey',
                text: 'An error occurred while saving the survey. Please try again later.',
                allowOutsideClick: false,
                didClose: () => {
                    window.location.href = '/etaoasaf/employee_survey_and_feedback/survey'; // Redirect to survey table
                }
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while saving the survey. Please try again later.',
            allowOutsideClick: false,
            didClose: () => {
                window.location.href = '/etaoasaf/employee_survey_and_feedback/survey'; // Redirect to survey table
            }
        });
    });
}

// Event listener for the save survey button
document.getElementById('saveSurveyBtn').addEventListener('click', saveSurvey);