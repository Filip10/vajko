document.getElementById('myForm').addEventListener('submit', function(event) {
    // Track the overall form validity
    let isFormValid = true;

    // Run each validation function and update the overall validity
    if (!validateDate()) isFormValid = false;
    if (!validateText()) isFormValid = false;
    if (!validateNazov()) isFormValid = false;
    if (!validateUrl()) isFormValid = false;

    // If any validation fails, prevent form submission
    if (!isFormValid) {
        event.preventDefault();
        console.log('Form submission prevented due to invalid form fields');
    }
});

document.getElementById('post-date').addEventListener('blur', function() {
    validateDate();
});

function validateDate() {
    const inputDate = document.getElementById('post-date').value;
    const currentDate = new Date().toISOString().split('T')[0];
    const validationMessage = document.getElementById('date-validation-message');

    if (inputDate <= currentDate) {
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
    const inputText = document.getElementById('post-popis').value;
    const validationMessage = document.getElementById('text-validation-message');

    if (inputText.trim() !== '') {
        validationMessage.style.display = 'none'; // Hide any previous error message
        console.log('Valid text');
        return true;
    } else {
        validationMessage.textContent = 'Nezabudni zadať text!';
        validationMessage.style.display = 'block'; // Show error message
        console.log('Invalid text');
        return false;
    }
}

function validateNazov() {
    const inputText = document.getElementById('post-nazov').value;
    const validationMessage = document.getElementById('nazov-validation-message');

    if (inputText.trim() !== '') {
        validationMessage.style.display = 'none';
        console.log('Valid name');
        return true;
    } else {
        validationMessage.textContent = 'Nezabudni zadať názov!';
        validationMessage.style.display = 'block';
        console.log('Invalid name');
        return false;
    }
}

function validateUrl() {
    const inputText = document.getElementById('post-url').value;
    const validationMessage = document.getElementById('url-validation-message');

    if (inputText.trim() !== '') {
        validationMessage.style.display = 'none';
        console.log('Valid URL');
        return true;
    } else {
        validationMessage.textContent = 'Nezabudni zadať URL!';
        validationMessage.style.display = 'block';
        console.log('Invalid URL');
        return false;
    }
}
