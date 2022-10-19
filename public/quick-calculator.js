// @@@ EcoLife by Sean Trudel @@@
// Quick Calculator Questionnaire Form
// Question 1

//alert("you are connected!");//HTML page connection test

// Page load function:
window.onload = pageLoad;

function pageLoad() {

    //==== VARIABLES / OBJECTS ====

    // Variables for all DOM form elements:
    var formListener = document.forms.quickQuestionnaireForm;

    // Question 1 radio input choices variables:
    var validateQuestion1 = null;

    // Empty inputs validation form elements:
    var choiceError = document.getElementById("choiceError");
    
    // Delete localStorage stored info button:
    var btnDel = document.getElementById("btnDel");
    

    //==== LOGIC ====

    // Function for form submission/processing:
    function formProcess() {
        //alert("functionProcess TEST"); // Debug test to check function formProcess is working: comment-out upon successful debug.
        
        //---FORM VARIABLES---
        // DOM form elements variables for quick question 1:
        var in_Question1 = formListener.f__question1; // Form question 1 radio input.
        var in_home = document.getElementById("in_home"); // Form question 1 first radio input for form validation cursor focus.
        var q1_fieldset = document.getElementById("q1_fieldset"); // Fieldset element for form validation error display.
        
        //---FORM VALIDATION---
        // Quick question 1 options message and validation:
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
            console.error("User input: quick question 1: " + validateQuestion1 + ", " + in_Question1.value);
            return false;	// Prevent next page load.
        }

        //==== FORM SUBMISSION TASKS ====

        //---LOCAL STORAGE---
        // LocalStorage: Create/store values:
        localStorage.setItem("in_Question1", in_Question1.value); // Stores'quick question 1' user input.
        
        // LocalStorage: create variables using stored values:
        var LS_Q1 = localStorage.getItem("in_Question1"); // Local variable.
        
        // LocalStorage: validation:
        if (!LS_Q1){
            console.error("LocalStorage: Question 1 input is undefined/null.");
            console.error("LocalStorage: Question 1 input = " + LS_Q1);
        } else {
            console.log("LocalStorage: Question 1 input = " + LS_Q1);
        }

    } // End of function formProcess.

    // LocalStorage: Retrieve stored stored values:
    var LS_Q1 = localStorage.getItem("in_Question1"); // This is useful for when navigating back to home page and ensuring user input data persist, if needed.

    // Function: Delete local storage values:
    function localStorageDel() {
        // Local storage: delete specified items:
        localStorage.removeItem("in_Question1"); // localStorage.clear not used in case other local storage items needs to be kept.
    }


    // Event listener for button:
    formListener.onsubmit = formProcess;
    //alert("Form validation test before loading next page"); // Comment-out this line upon successful test.

    // LocalStorage: Delete storage data:
    btnDel.onclick = localStorageDel; // Delete localStorage stored info upon button click, resets page welcome text and background color to default.

} // End onload function.


