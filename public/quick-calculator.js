// @@@ EcoLife by Sean Trudel @@@
// Quick Calculator Questionnaire Form
// Question 1

//alert("you are connected!");//HTML page connection test

// Page load function:
window.onload = pageLoad;

function pageLoad() {

    //==== VARIABLES / OBJECTS =========
    // Variables for all DOM form elements:
    var formListener = document.forms.quickQuestionnaireForm;

    // Question 1 radio input choices variables:
    var validateQuestion1 = null;

    // Empty inputs validation form elements:
    var choiceError = document.getElementById("choiceError");
    
    
    //==== LOGIC =============

    // Function for form submission/processing:
    function formProcess() {
        //alert("functionProcess TEST");    // Debug test to check function formProcess is working: comment-out upon successful debug.
        
        // DOM form elements variables for quick question 1:
        var in_Question1 = formListener.f__question1; // Form question 1 radio input.
        var in_home = document.getElementById("in_home"); // Form question 1 first radio input for form validation cursor focus.
        var q1_fieldset = document.getElementById("q1_fieldset"); // Fieldset element for form validation error display.
        
        // FORM VALIDATION: quick question 1 options message and validation:
        if (in_Question1.value === "home") {
            validateQuestion1 = true;    // Validates that input field was not left empty/unanswered.
            console.log("User input: quick question 1: " + validateQuestion1 + ", " + in_Question1.value);
        } else if (in_Question1.value === "workplace") {
            validateQuestion1 = true;    // Validates that input field was not left empty/unanswered.
            console.log("User input: quick question 1: " + validateQuestion1 + ", " + in_Question1.value);
        } else if (in_Question1.value === "travel") {
            validateQuestion1 = true;    // Validates that input field was not left empty/unanswered.
            console.log("User input: quick question 1: " + validateQuestion1 + ", " + in_Question1.value);
        }else {
            validateQuestion1 = false; // Validates that input field was not left empty/unanswered
            q1_fieldset.style.border = "solid red 4px"; // Modifies fieldset to display thick red border around the form to show users where the error is.
            choiceError.style.background = "red"; // Error message display settings.
            choiceError.style.color = "white"; // Error message display settings.
            choiceError.innerHTML = "Please select one option."; // Error message content.
            in_home.focus(); // Place cursor/tab-key-focus back into question input box.
            console.log("User input: quick question 1: " + validateQuestion1 + ", " + in_Question1.value);
            return false;	// Prevent next page load.
        }

    } // End of function formProcess.

    // Event listener for button:
    formListener.onsubmit = formProcess;
    //alert("Form validation test before loading next page"); // Comment-out this line upon successful test.

} // End onload function.


