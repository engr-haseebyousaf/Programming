/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

// "use strict";
var confirmPassControlBtn = document.getElementById("confirmPassControlBtn");
var volunteerConfirmPassword = document.getElementById("volunteerConfirmPassword");
var volunteerConfirmPasswordBtn = document.getElementById("volunteerConfirmPasswordBtn");
var passControlBtn = document.getElementById("PassControlBtn");
var volunteerPassword = document.getElementById("volunteerPassword");
var volunteerPasswordBtn = document.getElementById("volunteerPasswordBtn");
function togglePassword(inputField, toggleBtn) {
    if (inputField.type == "password") {
        inputField.type = "text";
        toggleBtn.classList.remove("fa-eye-slash");
        toggleBtn.classList.add("fa-eye");
    } else {
        inputField.type = "password";
        toggleBtn.classList.remove("fa-eye");
        toggleBtn.classList.add("fa-eye-slash");
    }
}
confirmPassControlBtn.addEventListener("click",(e) => {
    e.preventDefault();
    togglePassword(volunteerConfirmPassword, volunteerConfirmPasswordBtn)
});
passControlBtn.addEventListener("click",(e) => {
    e.preventDefault();
    togglePassword(volunteerPassword, volunteerPasswordBtn)
});
