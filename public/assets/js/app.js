/* ------------------------------------------------------------------------------
 *
 *  # Template JS core
 *
 *  Includes minimum required JS code for proper template functioning
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

const App = function () {


    // Utils
    // -------------------------

    //
    // Transitions
    //

    // Disable all transitions
    const transitionsDisabled = function () {
        document.body.classList.add('no-transitions');
    };

    // Enable all transitions
    const transitionsEnabled = function () {
        document.body.classList.remove('no-transitions');
    };


    //
    // Detect OS to apply custom scrollbars
    //

    // Custom scrollbar style is controlled by CSS. This function is needed to keep default
    // scrollbars on MacOS and avoid usage of extra JS libraries
    const detectOS = function () {
        const platform = window.navigator.platform,
            windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
            customScrollbarsClass = 'custom-scrollbars';

        // Add class if OS is windows
        windowsPlatforms.indexOf(platform) != -1 && document.documentElement.classList.add(customScrollbarsClass);
    };



    // Sidebars
    // -------------------------

    //
    // On desktop
    //

    // Resize main sidebar
    const sidebarMainResize = function () {

        // Elements
        const sidebarMainElement = document.querySelector('.sidebar-main'),
            sidebarMainToggler = document.querySelectorAll('.sidebar-main-resize'),
            resizeClass = 'sidebar-main-resized',
            unfoldClass = 'sidebar-main-unfold';


        // Config
        if (sidebarMainElement) {

            // Define variables
            const unfoldDelay = 150;
            let timerStart,
                timerFinish;

            // Toggle classes on click
            sidebarMainToggler.forEach(function (toggler) {
                toggler.addEventListener('click', function (e) {
                    e.preventDefault();
                    sidebarMainElement.classList.toggle(resizeClass);
                    !sidebarMainElement.classList.contains(resizeClass) && sidebarMainElement.classList.remove(unfoldClass);
                });
            });
        }
    };

    // Toggle main sidebar
    const sidebarMainToggle = function () {

        // Elements
        const sidebarMainElement = document.querySelector('.sidebar-main'),
            sidebarMainRestElements = document.querySelectorAll('.sidebar:not(.sidebar-main):not(.sidebar-component)'),
            sidebarMainDesktopToggler = document.querySelectorAll('.sidebar-main-toggle'),
            sidebarMainMobileToggler = document.querySelectorAll('.sidebar-mobile-main-toggle'),
            sidebarCollapsedClass = 'sidebar-collapsed',
            sidebarMobileExpandedClass = 'sidebar-mobile-expanded';

        // On desktop
        sidebarMainDesktopToggler.forEach(function (toggler) {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                sidebarMainElement.classList.toggle(sidebarCollapsedClass);
            });
        });

        // On mobile
        sidebarMainMobileToggler.forEach(function (toggler) {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                sidebarMainElement.classList.toggle(sidebarMobileExpandedClass);

                sidebarMainRestElements.forEach(function (sidebars) {
                    sidebars.classList.remove(sidebarMobileExpandedClass);
                });
            });
        });
    };

    // Toggle secondary sidebar
    const sidebarSecondaryToggle = function () {

        // Elements
        const sidebarSecondaryElement = document.querySelector('.sidebar-secondary'),
            sidebarSecondaryRestElements = document.querySelectorAll('.sidebar:not(.sidebar-secondary):not(.sidebar-component)'),
            sidebarSecondaryDesktopToggler = document.querySelectorAll('.sidebar-secondary-toggle'),
            sidebarSecondaryMobileToggler = document.querySelectorAll('.sidebar-mobile-secondary-toggle'),
            sidebarCollapsedClass = 'sidebar-collapsed',
            sidebarMobileExpandedClass = 'sidebar-mobile-expanded';

        // On desktop
        sidebarSecondaryDesktopToggler.forEach(function (toggler) {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                sidebarSecondaryElement.classList.toggle(sidebarCollapsedClass);
            });
        });

        // On mobile
        sidebarSecondaryMobileToggler.forEach(function (toggler) {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                sidebarSecondaryElement.classList.toggle(sidebarMobileExpandedClass);

                sidebarSecondaryRestElements.forEach(function (sidebars) {
                    sidebars.classList.remove(sidebarMobileExpandedClass);
                });
            });
        });
    };

    // Toggle right sidebar
    const sidebarRightToggle = function () {

        // Elements
        const sidebarRightElement = document.querySelector('.sidebar-end'),
            sidebarRightRestElements = document.querySelectorAll('.sidebar:not(.sidebar-end):not(.sidebar-component)'),
            sidebarRightDesktopToggler = document.querySelectorAll('.sidebar-end-toggle'),
            sidebarRightMobileToggler = document.querySelectorAll('.sidebar-mobile-end-toggle'),
            sidebarCollapsedClass = 'sidebar-collapsed',
            sidebarMobileExpandedClass = 'sidebar-mobile-expanded';

        // On desktop
        sidebarRightDesktopToggler.forEach(function (toggler) {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                sidebarRightElement.classList.toggle(sidebarCollapsedClass);
            });
        });

        // On mobile
        sidebarRightMobileToggler.forEach(function (toggler) {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                sidebarRightElement.classList.toggle(sidebarMobileExpandedClass);

                sidebarRightRestElements.forEach(function (sidebars) {
                    sidebars.classList.remove(sidebarMobileExpandedClass);
                });
            });
        });
    };

    // Toggle component sidebar
    const sidebarComponentToggle = function () {

        // Elements
        const sidebarComponentElement = document.querySelector('.sidebar-component'),
            sidebarComponentMobileToggler = document.querySelectorAll('.sidebar-mobile-component-toggle'),
            sidebarMobileExpandedClass = 'sidebar-mobile-expanded';

        // Toggle classes
        sidebarComponentMobileToggler.forEach(function (toggler) {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                sidebarComponentElement.classList.toggle(sidebarMobileExpandedClass);
            });
        });
    };


    // Navigations
    // -------------------------

    // Sidebar navigation
    const navigationSidebar = function () {

        // Elements
        const navContainerClass = 'nav-sidebar',
            navItemOpenClass = 'nav-item-open',
            navLinkClass = 'nav-link',
            navLinkDisabledClass = 'disabled',
            navSubmenuContainerClass = 'nav-item-submenu',
            navSubmenuClass = 'nav-group-sub',
            navScrollSpyClass = 'nav-scrollspy',
            sidebarNavElement = document.querySelectorAll(`.${navContainerClass}:not(.${navScrollSpyClass})`);
        // Setup
        sidebarNavElement.forEach(function (nav) {
            nav.querySelectorAll(`.${navSubmenuContainerClass} > .${navLinkClass}:not(.${navLinkDisabledClass})`).forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const submenuContainer = link.closest(`.${navSubmenuContainerClass}`);
                    const submenu = link.closest(`.${navSubmenuContainerClass}`).querySelector(`:scope > .${navSubmenuClass}`);

                    // Collapsible
                    if (submenuContainer.classList.contains(navItemOpenClass)) {

                        new bootstrap.Collapse(submenu).hide();
                        submenuContainer.classList.remove(navItemOpenClass);
                    }
                    else {
                        new bootstrap.Collapse(submenu).show();
                        submenuContainer.classList.add(navItemOpenClass);
                    }

                    // Accordion
                    if (link.closest(`.${navContainerClass}`).getAttribute('data-nav-type') == 'accordion') {
                        for (let sibling of link.parentNode.parentNode.children) {
                            if (sibling != link.parentNode && sibling.classList.contains(navItemOpenClass)) {
                                sibling.querySelectorAll(`:scope > .${navSubmenuClass}`).forEach(function (submenu) {
                                    new bootstrap.Collapse(submenu).hide();
                                    sibling.classList.remove(navItemOpenClass);
                                });
                            }
                        }
                    }
                });
            });
        });
    };


    // Components
    // -------------------------

    // Tooltip
    const componentTooltip = function () {
        const tooltipSelector = document.querySelectorAll('[data-bs-popup="tooltip"]');

        tooltipSelector.forEach(function (popup) {
            new bootstrap.Tooltip(popup, {
                boundary: '.page-content'
            });
        });
    };

    // Popover
    const componentPopover = function () {
        const popoverSelector = document.querySelectorAll('[data-bs-popup="popover"]');

        popoverSelector.forEach(function (popup) {
            new bootstrap.Popover(popup, {
                boundary: '.page-content'
            });
        });
    };

    // "Go to top" button
    const componentToTopButton = function () {

        // Elements
        const toTopContainer = document.querySelector('.content-wrapper'),
            toTopElement = document.createElement('button'),
            toTopElementIcon = document.createElement('i'),
            toTopButtonContainer = document.createElement('div'),
            toTopButtonColorClass = 'btn-secondary',
            toTopButtonIconClass = 'ph-arrow-up',
            scrollableContainer = document.querySelector('.content-inner'),
            scrollableDistance = 250,
            footerContainer = document.querySelector('.navbar-footer');


        // Append only if container exists
        if (scrollableContainer) {

            // Create button container
            toTopContainer.appendChild(toTopButtonContainer);
            toTopButtonContainer.classList.add('btn-to-top');

            // Create button
            toTopElement.classList.add('btn', toTopButtonColorClass, 'btn-icon', 'rounded-pill');
            toTopElement.setAttribute('type', 'button');
            toTopButtonContainer.appendChild(toTopElement);
            toTopElementIcon.classList.add(toTopButtonIconClass);
            toTopElement.appendChild(toTopElementIcon);

            // Show and hide on scroll
            const to_top_button = document.querySelector('.btn-to-top'),
                add_class_on_scroll = () => to_top_button.classList.add('btn-to-top-visible'),
                remove_class_on_scroll = () => to_top_button.classList.remove('btn-to-top-visible');

            scrollableContainer.addEventListener('scroll', function () {
                const scrollpos = scrollableContainer.scrollTop;
                scrollpos >= scrollableDistance ? add_class_on_scroll() : remove_class_on_scroll();
                if (footerContainer) {
                    if (this.scrollHeight - this.scrollTop - this.clientHeight <= footerContainer.clientHeight) {
                        to_top_button.style.bottom = footerContainer.clientHeight + 20 + 'px';
                    }
                    else {
                        to_top_button.removeAttribute('style');
                    }
                }
            });

            // Scroll to top on click
            document.querySelector('.btn-to-top .btn').addEventListener('click', function () {
                scrollableContainer.scrollTo(0, 0);
            });
        }
    };


    // Card actions
    // -------------------------

    // Reload card (uses BlockUI extension)
    const cardActionReload = function () {

        // Elements
        const buttonClass = '[data-card-action=reload]',
            containerClass = 'card',
            overlayClass = 'card-overlay',
            spinnerClass = 'ph-circle-notch',
            overlayAnimationClass = 'card-overlay-fadeout';

        // Configure
        document.querySelectorAll(buttonClass).forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                // Elements
                const parentContainer = button.closest(`.${containerClass}`),
                    overlayElement = document.createElement('div'),
                    overlayElementIcon = document.createElement('i');

                // Append overlay with icon
                overlayElement.classList.add(overlayClass);
                parentContainer.appendChild(overlayElement);
                overlayElementIcon.classList.add(spinnerClass, 'spinner', 'text-body');
                overlayElement.appendChild(overlayElementIcon);

                // Remove overlay after 2.5s, for demo only
                setTimeout(function () {
                    overlayElement.classList.add(overlayAnimationClass);
                    ['animationend', 'animationcancel'].forEach(function (e) {
                        overlayElement.addEventListener(e, function () {
                            overlayElement.remove();
                        });
                    });
                }, 2500);
            });
        });
    };

    // Collapse card
    const cardActionCollapse = function () {

        // Elements
        const buttonClass = '[data-card-action=collapse]',
            cardCollapsedClass = 'card-collapsed';

        // Setup
        document.querySelectorAll(buttonClass).forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const parentContainer = button.closest('.card'),
                    collapsibleContainer = parentContainer.querySelectorAll(':scope > .collapse');

                if (parentContainer.classList.contains(cardCollapsedClass)) {
                    parentContainer.classList.remove(cardCollapsedClass);
                    collapsibleContainer.forEach(function (toggle) {
                        new bootstrap.Collapse(toggle, {
                            show: true
                        });
                    });
                }
                else {
                    parentContainer.classList.add(cardCollapsedClass);
                    collapsibleContainer.forEach(function (toggle) {
                        new bootstrap.Collapse(toggle, {
                            hide: true
                        });
                    });
                }
            });
        });
    };

    // Remove card
    const cardActionRemove = function () {

        // Elements
        const buttonClass = '[data-card-action=remove]',
            containerClass = 'card'

        // Config
        document.querySelectorAll(buttonClass).forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                button.closest(`.${containerClass}`).remove();
            });
        });
    };

    // Card fullscreen mode
    const cardActionFullscreen = function () {

        // Elements
        const buttonAttribute = '[data-card-action=fullscreen]',
            buttonClass = 'text-body',
            buttonContainerClass = 'd-inline-flex',
            cardFullscreenClass = 'card-fullscreen',
            collapsedClass = 'collapsed-in-fullscreen',
            scrollableContainerClass = 'content-inner',
            fullscreenAttr = 'data-fullscreen';

        // Configure
        document.querySelectorAll(buttonAttribute).forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                // Get closest card container
                const cardFullscreen = button.closest('.card');

                // Toggle required classes
                cardFullscreen.classList.toggle(cardFullscreenClass);

                // Toggle classes depending on state
                if (!cardFullscreen.classList.contains(cardFullscreenClass)) {
                    button.removeAttribute(fullscreenAttr);
                    cardFullscreen.querySelectorAll(`:scope > .${collapsedClass}`).forEach(function (collapsedElement) {
                        collapsedElement.classList.remove('show');
                    });
                    document.querySelector(`.${scrollableContainerClass}`).classList.remove('overflow-hidden');
                    button.closest(`.${buttonContainerClass}`).querySelectorAll(`:scope > .${buttonClass}:not(${buttonAttribute})`).forEach(function (actions) {
                        actions.classList.remove('d-none');
                    });
                }
                else {
                    button.setAttribute(fullscreenAttr, 'active');
                    cardFullscreen.removeAttribute('style');
                    cardFullscreen.querySelectorAll(`:scope > .collapse:not(.show)`).forEach(function (collapsedElement) {
                        collapsedElement.classList.add('show', `.${collapsedClass}`);
                    });
                    document.querySelector(`.${scrollableContainerClass}`).classList.add('overflow-hidden');
                    button.closest(`.${buttonContainerClass}`).querySelectorAll(`:scope > .${buttonClass}:not(${buttonAttribute})`).forEach(function (actions) {
                        actions.classList.add('d-none');
                    });
                }
            });
        });
    };


    // Misc
    // -------------------------

    // Dropdown submenus. Trigger on click
    const dropdownSubmenu = function () {

        // Classes
        const menuClass = 'dropdown-menu',
            submenuClass = 'dropdown-submenu',
            menuToggleClass = 'dropdown-toggle',
            disabledClass = 'disabled',
            showClass = 'show';

        if (submenuClass) {

            // Toggle submenus on all levels
            document.querySelectorAll(`.${menuClass} .${submenuClass}:not(.${disabledClass}) .${menuToggleClass}`).forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.stopPropagation();
                    e.preventDefault();

                    // Toggle classes
                    link.closest(`.${submenuClass}`).classList.toggle(showClass);
                    link.closest(`.${submenuClass}`).querySelectorAll(`:scope > .${menuClass}`).forEach(function (children) {
                        children.classList.toggle(showClass);
                    });

                    // When submenu is shown, hide others in all siblings
                    for (let sibling of link.parentNode.parentNode.children) {
                        if (sibling != link.parentNode) {
                            sibling.classList.remove(showClass);
                            sibling.querySelectorAll(`.${showClass}`).forEach(function (submenu) {
                                submenu.classList.remove(showClass);
                            });
                        }
                    }
                });
            });

            // Hide all levels when parent dropdown is closed
            document.querySelectorAll(`.${menuClass}`).forEach(function (link) {
                if (!link.parentElement.classList.contains(submenuClass)) {
                    link.parentElement.addEventListener('hidden.bs.dropdown', function (e) {
                        link.querySelectorAll(`.${menuClass}.${showClass}`).forEach(function (children) {
                            children.classList.remove(showClass);
                        });
                    });
                }
            });
        }
    };


    const initActiveMenu = function () {
        var currentPath = location.pathname == "/" ? "index" : location.pathname.substring(1);
        currentPath = currentPath.substring(currentPath.lastIndexOf("/") + 1);
        if (currentPath) {
            // navbar-nav
            var a = document.getElementById("navbar-nav").querySelector('[href="' + currentPath + '"]');
            if (a) {
                a.classList.add("active");
                var parentCollapseDiv = a.closest(".nav-group-sub");
                var navItemSubmenu = a.parentElement.closest('.nav-item-submenu');
                if (navItemSubmenu) {
                    var navItemSubmenugroup = navItemSubmenu.parentElement.parentElement.closest('.nav-item-submenu');
                }
                if (navItemSubmenugroup) {
                    var navItemSubmenuCollapse = navItemSubmenugroup.children[1];
                }

                if (parentCollapseDiv) {
                    navItemSubmenu.classList.add("nav-item-open");
                    if (navItemSubmenugroup && navItemSubmenuCollapse) {
                        navItemSubmenugroup.classList.add("nav-item-open");
                        navItemSubmenuCollapse.classList.add("show");
                    }
                    parentCollapseDiv.classList.add("show");

                }
            }
        }
    }

    const initMenuItemScroll = function () {
        setTimeout(function () {
            var sidebarMenu = document.getElementById("navbar-nav");
            if (sidebarMenu) {
                var activeMenu = sidebarMenu.querySelector(".nav-item .active");
                var offset = activeMenu ? activeMenu.offsetTop : 0;
                if (offset > 300) {
                    var verticalMenu = document.getElementsByClassName("sidebar-content") ? document.getElementsByClassName("sidebar-content")[0] : "";
                    if (verticalMenu) {
                        setTimeout(function () {
                            verticalMenu.scrollTop = offset - 100;
                        }, 0);
                    }
                }
            }
        }, 250);
    }

    //
    // Return objects assigned to module
    //

    return {

        // Disable transitions before page is fully loaded
        initBeforeLoad: function () {
            detectOS();
            transitionsDisabled();
        },

        // Enable transitions when page is fully loaded
        initAfterLoad: function () {
            transitionsEnabled();
        },
        // Initialize all components
        initComponents: function () {
            componentTooltip();
            componentPopover();
            componentToTopButton();
        },

        // Initialize all sidebars
        initSidebars: function () {
            sidebarMainResize();
            sidebarMainToggle();
            sidebarSecondaryToggle();
            sidebarRightToggle();
            sidebarComponentToggle();
            initActiveMenu();
            initMenuItemScroll();
        },

        // Initialize all navigations
        initNavigations: function () {
            navigationSidebar();
        },

        // Initialize all card actions
        initCardActions: function () {
            cardActionReload();
            cardActionCollapse();
            cardActionRemove();
            cardActionFullscreen();
        },

        // Dropdown submenu
        initDropdowns: function () {
            dropdownSubmenu();
        },

        // Initialize core
        initCore: function () {
            App.initBeforeLoad();
            App.initSidebars();
            App.initNavigations();
            App.initComponents();
            App.initCardActions();
            App.initDropdowns();
        }
    };
}();


// Initialize module
// ------------------------------

// When content is loaded
document.addEventListener('DOMContentLoaded', function () {
    App.initCore();
});

// When page is fully loaded
window.addEventListener('load', function () {
    App.initAfterLoad();
});

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
