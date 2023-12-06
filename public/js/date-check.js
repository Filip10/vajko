document.getElementById('myForm').addEventListener('submit', function(event) {
    // Validate the date before submitting the form
    if (!validateDate()) {
        // If the date is not valid, prevent the form submission
        event.preventDefault();
        console.log('Form submission prevented due to an invalid date');
    }
});
document.getElementById('post-date').addEventListener('blur', function() {
    validateDate();
});

function validateDate() {
    var inputDate = document.getElementById('post-date').value;
    var currentDate = new Date().toISOString().split('T')[0];
    var validationMessage = document.getElementById('date-validation-message');

    if (inputDate < currentDate) {
        validationMessage.textContent = '';
        console.log('Valid date');
        return true;
    } else {
        validationMessage.textContent = 'Zadal si zlý dátum, dátum nemôže byť v budúcnosti!';
        console.log('Invalid date');
        return false;
    }
}