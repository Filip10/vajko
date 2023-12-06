<?php

/** @var \App\Core\IAuthenticator $auth */
?>
<script src="../../../public/js/password-validation.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <form onsubmit="return validatePassword()">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <input type="submit" value="Submit">

                <!-- Display error messages here -->
                <div id="error-message" style="color: red;"></div>
            </form>
        </div>
    </div>
</div>