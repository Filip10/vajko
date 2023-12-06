function validateNumber() {
    var numericInput = document.getElementById("numericInput").value;
    var errorMessage = "";

    // Check if the entered value is not negative
    if (parseFloat(numericInput) < 0) {
        errorMessage = "Please enter a non-negative number.";
    }

    // Display error message or submit the form
    if (errorMessage !== "") {
        document.getElementById("error-message").innerHTML = errorMessage;
        return false;
    } else {
        document.getElementById("error-message").innerHTML = "";
        return true;
    }
}