document.getElementById('myForm').addEventListener('submit', function(event) {
    // Validate the date before submitting the form
    if (!validateDate() || !validateText() || !validateNazov() || !validateUrl()) {
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

function validateText() {
    var inputText = document.getElementById('post-popis').value;
    //var validationMessage = document.getElementById('text-validation-message');

    if (inputText.trim() !== '') {
        //validationMessage.style.display = 'none'; // Hide any previous error message
        console.log('Valid text');
        return true;
    } else {
        //validationMessage.style.display = 'block'; // Show error message
        console.log('Invalid text');
        return false;
    }
}

function validateNazov() {
    var inputText = document.getElementById('post-nazov').value;

    if (inputText.trim() !== '') {
        console.log('Valid nazov');
        return true;
    } else {
        console.log('Invalid nazov');
        return false;
    }
}

function validateUrl() {
    var inputText = document.getElementById('post-url').value;

    if (inputText.trim() !== '') {
        console.log('Valid url');
        return true;
    } else {
        console.log('Invalid url');
        return false;
    }
}