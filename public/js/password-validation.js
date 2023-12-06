function validatePassword() {
    var password = document.getElementById("password").value;
    var errorMessage = "";

    if (password.length < 6) {
        errorMessage += "Heslo musí mať aspoň 6 znakov<br>";
    }

    if (!/[A-Z]/.test(password)) {
        errorMessage += "Heslo musí obsahovať aspoň jedno veľké písmeno<br>";
    }

    if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        errorMessage += "Heslo musí obsahovať aspoň jeden špeciálny znak<br>";
    }

    if (!/\d/.test(password)) {
        errorMessage += "Heslo musí obsahovať aspoň jednu číslicu<br>";
    }

    if (errorMessage !== "") {
        document.getElementById("error-message").innerHTML = errorMessage;
        return false;
    } else {
        document.getElementById("error-message").innerHTML = "";
        return true;
    }
}
