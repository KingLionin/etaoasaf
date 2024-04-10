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
 * Navbar layout
 * 
 */


// For the notification count
function fetchNotificationCount() {
    // Make an AJAX request to fetch count
    $.get('/api/offboarding/requests/count', function (data) {
        // Check if count is greater than zero
        if (data.count > 0) {
            // Update the count in the badge
            $('#notification-badge').text(data.count);
        } else {
            // Hide the badge if count is zero
            $('#notification-badge').text('').hide();
        }
    });
}

// Call the function on page load
$(document).ready(function () {
    fetchNotificationCount();
});

/************************************************************************************************************************/

/* 
 *
 * Termination page
 * 
 */


/* Termination Modal View Form */
$(document).ready(function () {
    console.log("DOM Content Loaded");

    // Functionality for Next Button
    $('#btn_next').on('click', function () {
        var currentSection = $('.modal-body > .modal-section:not([style*="display: none"])');
        if (currentSection.length) {
            currentSection.hide();

            var nextSection = currentSection.next('.modal-section');
            if (!nextSection.length) {
                nextSection = $('.modal-body > .modal-section:first-child');
            }
            nextSection.show();
        } else {
            console.error("Current section not found.");
        }
    });

    // Functionality for Previous Button
    $('#btn_previous').on('click', function () {
        var currentSection = $('.modal-body > .modal-section:not([style*="display: none"])');
        if (currentSection.length) {
            currentSection.hide();

            var previousSection = currentSection.prev('.modal-section');
            if (!previousSection.length) {
                previousSection = $('.modal-body > .modal-section:last-child');
            }
            previousSection.show();
        } else {
            console.error("Current section not found.");
        }
    });
});

/************************************************************************************************************************/

/* 
 *
 * Create Survey page
 * 
 */

//For the dropdown options functions
document.addEventListener("DOMContentLoaded", function () {
    // Event listener for dropdown menu options
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            const inputType = this.getAttribute('data-input-type');
            if (inputType === "text") {
                updateQuestionConstructorForText();
            } else if (inputType === "textarea") {
                updateQuestionConstructorForTextarea();
            } else if (inputType === "radio") {
                updateQuestionConstructorForRadio();
            } else if (inputType === "checkbox") {
                updateQuestionConstructorForCheckbox();
            } else if (inputType === "dropdown") {
                updateQuestionConstructorForDropdown();
            } else if (inputType === "scale") {
                updateQuestionConstructorForLinearScale();
            } else {
                console.log('error');
            }
        });
    });

    // Function to update question constructor for textfield
    function updateQuestionConstructorForText() {
        const questionConstructor = document.getElementById('questionConstructor');
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Enter answer";
        textField.classList.add('form-control');
        questionConstructor.appendChild(textField);
    }

    // Function to update question constructor for textarea
    function updateQuestionConstructorForTextarea() {
        const questionConstructor = document.getElementById('questionConstructor');
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create textarea
        const textarea = document.createElement('textarea');
        textarea.placeholder = "Enter answer";
        textarea.classList.add('form-control', 'elastic');
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
        optionWrapperRadio.appendChild(radioButton);

        // Create corresponding textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Option";
        textField.classList.add('form-control', 'flex-grow-1');
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

        // Create radio button
        const checkBox = document.createElement('input');
        checkBox.type = "checkbox";
        checkBox.classList.add('form-check-input');
        checkBox.style.marginRight = '10px';
        optionWrapperCheckbox.appendChild(checkBox);

        // Create corresponding textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Option";
        textField.classList.add('form-control', 'flex-grow-1');
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

    // Function to update the numbers of all options
    function updateOptionNumbers() {
        const options = document.querySelectorAll('.dropdown-option-wrapper');
        options.forEach((option, index) => {
            const number = option.querySelector('span');
            number.textContent = (index + 1).toString();
        });
    }

    // Function to create a dropdown option
    function createDropdownOption() {

        const optionWrapperDropdown = document.createElement('div');
        optionWrapperDropdown.classList.add('dropdown-option-wrapper', 'mb-2', 'd-flex', 'align-items-center');

        // Create number indication
        const number = document.createElement('span');
        number.textContent = optionCounter.toString();
        number.style.marginRight = '10px';
        optionWrapperDropdown.appendChild(number);

        // Create corresponding textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Option";
        textField.classList.add('form-control', 'flex-grow-1');
        optionWrapperDropdown.appendChild(textField);

        // Create delete button
        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = 'X';
        deleteButton.classList.add('btn', 'btn-danger', 'ms-2');
        deleteButton.addEventListener('click', function () {
            optionWrapperDropdown.remove();
            optionCounter--;
            updateOptionNumbers();
        });
        optionWrapperDropdown.appendChild(deleteButton);

        updateOptionNumbers(); // Update numbers after deletion

        return optionWrapperDropdown;
    }

    // Function to update question constructor for Checkbox
    function updateQuestionConstructorForDropdown() {
        const questionConstructor = document.getElementById('questionConstructor');
        questionConstructor.innerHTML = ""; // Clear previous content

        // Reset the counter when updating
        optionCounter = 1;

        // Create default Dropdown option
        const defaultOption = createDropdownOption();
        questionConstructor.appendChild(defaultOption);

        // Update option numbers after adding the default option
        updateOptionNumbers();


        // Create 'Add Option' button
        const addOptionButton = createAddOptionButton();
        questionConstructor.appendChild(addOptionButton);

        // Event listener for 'Add Option' button
        addOptionButton.addEventListener('click', function () {
            const newOption = createDropdownOption();
            questionConstructor.insertBefore(newOption, this);
            // Update option numbers after adding the default option
            updateOptionNumbers();
        });
    }


    // Function to update question constructor for linear scale
    function updateQuestionConstructorForLinearScale() {
        const questionConstructor = document.getElementById('questionConstructor');
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create row for minimum value
        const minRow = createRowWithDropdownAndTextField('Minimum:', 0, 1, 1);
        questionConstructor.appendChild(minRow);

        // Create row for maximum value
        const maxRow = createRowWithDropdownAndTextField('Maximum:', 1, 10, 5);
        questionConstructor.appendChild(maxRow);
    }

    // Function to create a row with dropdown and text field
    function createRowWithDropdownAndTextField(label, start, end, defaultValue) {
        const row = document.createElement('div');
        row.classList.add('row', 'mb-2');

        // Create column for minimum dropdown
        const minDropdownColumn = document.createElement('div');
        minDropdownColumn.classList.add('col');
        const minDropdown = createScaleDropdown(label, start, end, defaultValue);
        minDropdownColumn.appendChild(minDropdown);
        row.appendChild(minDropdownColumn);

        // Create column for minimum text field
        const minTextFieldColumn = document.createElement('div');
        minTextFieldColumn.classList.add('mt-4', 'col');
        const minTextField = createTextField();
        minTextFieldColumn.appendChild(minTextField);
        row.appendChild(minTextFieldColumn);

        return row;
    }

    // Function to create a dropdown for scale values
    function createScaleDropdown(label, start, end, defaultValue) {
        const dropdownWrapper = document.createElement('div');
        dropdownWrapper.classList.add('scale-dropdown-wrapper');

        // Create label for dropdown
        const dropdownLabel = document.createElement('label');
        dropdownLabel.classList.add('form-label');
        dropdownLabel.textContent = label;
        dropdownWrapper.appendChild(dropdownLabel);

        // Create dropdown
        const dropdown = document.createElement('select');
        dropdown.classList.add('form-select');
        for (let i = start; i <= end; i++) {
            const option = document.createElement('option');
            option.text = i;
            option.value = i;
            if (i === defaultValue) {
                option.selected = true;
            }
            dropdown.appendChild(option);
        }
        dropdownWrapper.appendChild(dropdown);

        return dropdownWrapper;
    }

    // Function to create a text field
    function createTextField() {
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Enter label";
        textField.classList.add('form-control');
        return textField;
    }
});

/************************************************************************************************************************/

/* 
 *
 * Survey-footer
 * 
 */

document.addEventListener("DOMContentLoaded", function () {

    // Function to update question constructor for textfield
    function updateQuestionConstructorForText(questionConstructor) {
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Enter answer";
        textField.classList.add('form-control');
        questionConstructor.appendChild(textField);
    }

    // Function to update question constructor for textarea
    function updateQuestionConstructorForTextarea(questionConstructor) {
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create textarea
        const textarea = document.createElement('textarea');
        textarea.placeholder = "Enter answer";
        textarea.classList.add('form-control', 'elastic');
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
        optionWrapperRadio.appendChild(radioButton);

        // Create corresponding textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Option";
        textField.classList.add('form-control', 'flex-grow-1');
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
        optionWrapperCheckbox.appendChild(checkBox);

        // Create corresponding textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Option";
        textField.classList.add('form-control', 'flex-grow-1');
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

    // Function to update the numbers of all options
    function updateOptionNumbers() {
        const options = document.querySelectorAll('.dropdown-option-wrapper');
        options.forEach((option, index) => {
            const number = option.querySelector('span');
            number.textContent = (index + 1).toString();
        });
    }

    // Function to create a dropdown option
    function createDropdownOption() {

        const optionWrapperDropdown = document.createElement('div');
        optionWrapperDropdown.classList.add('dropdown-option-wrapper', 'mb-2', 'd-flex', 'align-items-center');

        // Create number indication
        const number = document.createElement('span');
        number.textContent = optionCounter.toString();
        number.style.marginRight = '10px';
        optionWrapperDropdown.appendChild(number);

        // Create corresponding textfield
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Option";
        textField.classList.add('form-control', 'flex-grow-1');
        optionWrapperDropdown.appendChild(textField);

        // Create delete button
        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = 'X';
        deleteButton.classList.add('btn', 'btn-danger', 'ms-2');
        deleteButton.addEventListener('click', function () {
            optionWrapperDropdown.remove();
            optionCounter--;
            updateOptionNumbers();
        });
        optionWrapperDropdown.appendChild(deleteButton);

        updateOptionNumbers(); // Update numbers after deletion

        return optionWrapperDropdown;
    }

    // Function to update question constructor for Checkbox
    function updateQuestionConstructorForDropdown(questionConstructor) {
        questionConstructor.innerHTML = ""; // Clear previous content

        // Reset the counter when updating
        optionCounter = 1;

        // Create default Dropdown option
        const defaultOption = createDropdownOption();
        questionConstructor.appendChild(defaultOption);

        // Update option numbers after adding the default option
        updateOptionNumbers();


        // Create 'Add Option' button
        const addOptionButton = createAddOptionButton();
        questionConstructor.appendChild(addOptionButton);

        // Event listener for 'Add Option' button
        addOptionButton.addEventListener('click', function () {
            const newOption = createDropdownOption();
            questionConstructor.insertBefore(newOption, this);
            // Update option numbers after adding the default option
            updateOptionNumbers();
        });
    }


    // Function to update question constructor for linear scale
    function updateQuestionConstructorForLinearScale(questionConstructor) {
        questionConstructor.innerHTML = ""; // Clear previous content

        // Create row for minimum value
        const minRow = createRowWithDropdownAndTextField('Minimum:', 0, 1, 1);
        questionConstructor.appendChild(minRow);

        // Create row for maximum value
        const maxRow = createRowWithDropdownAndTextField('Maximum:', 1, 10, 5);
        questionConstructor.appendChild(maxRow);
    }

    // Function to create a row with dropdown and text field
    function createRowWithDropdownAndTextField(label, start, end, defaultValue) {
        const row = document.createElement('div');
        row.classList.add('row', 'mb-2');

        // Create column for minimum dropdown
        const minDropdownColumn = document.createElement('div');
        minDropdownColumn.classList.add('col');
        const minDropdown = createScaleDropdown(label, start, end, defaultValue);
        minDropdownColumn.appendChild(minDropdown);
        row.appendChild(minDropdownColumn);

        // Create column for minimum text field
        const minTextFieldColumn = document.createElement('div');
        minTextFieldColumn.classList.add('mt-4', 'col');
        const minTextField = createTextField();
        minTextFieldColumn.appendChild(minTextField);
        row.appendChild(minTextFieldColumn);

        return row;
    }

    // Function to create a dropdown for scale values
    function createScaleDropdown(label, start, end, defaultValue) {
        const dropdownWrapper = document.createElement('div');
        dropdownWrapper.classList.add('scale-dropdown-wrapper');

        // Create label for dropdown
        const dropdownLabel = document.createElement('label');
        dropdownLabel.classList.add('form-label');
        dropdownLabel.textContent = label;
        dropdownWrapper.appendChild(dropdownLabel);

        // Create dropdown
        const dropdown = document.createElement('select');
        dropdown.classList.add('form-select');
        for (let i = start; i <= end; i++) {
            const option = document.createElement('option');
            option.text = i;
            option.value = i;
            if (i === defaultValue) {
                option.selected = true;
            }
            dropdown.appendChild(option);
        }
        dropdownWrapper.appendChild(dropdown);

        return dropdownWrapper;
    }

    // Function to create a text field
    function createTextField() {
        const textField = document.createElement('input');
        textField.type = "text";
        textField.placeholder = "Enter label";
        textField.classList.add('form-control');
        return textField;
    }
    let questionCounter = document.querySelectorAll('.question-card').length; // Counter for question numbers

    // Function to add a new question card
    function addQuestionCard() {
        const questionCardsContainer = document.querySelector('.question-cards-container');

        // Create a new question card
        const newQuestionCard = document.createElement('div');
        newQuestionCard.classList.add('card', 'question-card', 'mb-4');

        // Increment question counter
        questionCounter++;

        // Create header for the question card
        const cardHeader = document.createElement('div');
        cardHeader.classList.add('card-header', 'bg-primary', 'text-white', 'd-flex', 'justify-content-between', 'align-items-center');
        cardHeader.innerHTML = `<h5 class="mb-0">Question ${questionCounter}</h5>
                                <div class="question-card-actions g-3">
                                    <div class="d-flex align-items-center me-2">
                                        <a href="#" class="me-2 delete-question" data-bs-toggle="tooltip" title="Delete" data-bs-placement="top">
                                            <i class="text-white ph-trash"></i>
                                        </a>
                                        <div class="me-2" style="border-left: 1px solid rgba(255,255,255,0.5); height: 30px; margin-right: 5px;"></div>
                                        <div class="form-check form-switch text-white d-flex align-items-center">
                                            <input type="checkbox" class="form-check-input form-check-input-white me-2" id="dc_rss_u">
                                            <label class="form-check-label" for="dc_rss_u">Required</label>
                                        </div>
                                    </div>
                                </div>`;

        // Append header to the question card
        newQuestionCard.appendChild(cardHeader);

        // Create body for the question card
        const cardBody = document.createElement('div');
        cardBody.classList.add('card-body');
        cardBody.innerHTML = `<div class="row">
                                <div class="col-md-10 mb-3">
                                    <input type="text" placeholder="Enter your Question" class="form-control" />
                                </div>
                                <div class="col-md-2 mb-3">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="inputTypeDropdown${questionCounter}"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Input Types
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="inputTypeDropdown${questionCounter}">
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
                                    <div class="input-fields" data-question-number="${questionCounter}">
                                        <!-- This is where the dynamically shown input field will be placed -->
                                        <!-- Default input field (textfield) -->
                                        <input type="text" placeholder="Enter answer" class="form-control" />
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
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                const inputType = this.getAttribute('data-input-type');
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
                } else if (inputType === "dropdown") {
                    updateQuestionConstructorForDropdown(questionConstructor);
                } else if (inputType === "scale") {
                    updateQuestionConstructorForLinearScale(questionConstructor);
                } else {
                    console.log('error');
                }
            });
        });
    }

    // Function to delete the question card
    function deleteQuestionCard(questionCard) {
        questionCounter--; // Decrement question counter
        questionCard.remove();
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


