var emailInput = document.getElementById('email');
var passwordInput = document.getElementById('password');

function validate(evt) {

    // Prevent the default form submission behavior until form validation is done 
    //in next lines
    evt.preventDefault();

    // Validating that Fields should not be Empty
    if (emailInput.value == "" || passwordInput.value == "") {
        alert("Input Fields are Empty");
    }

    // Validating that Password should have at least 8 characters
    else if (passwordInput.value.length < 8) {
        alert("Password must be at least 8 characters");
    }

    // If all validations pass, submit the form
    else {
        evt.target.submit(); // Use evt.target to submit the form
    }
}

