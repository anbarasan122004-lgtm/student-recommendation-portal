/* =========================================
   DEPARTMENT PORTAL
   JavaScript Functions
   ========================================= */


/* =========================================
   REGISTRATION VALIDATION
   ========================================= */

const registerForm = document.getElementById("registerForm");

if (registerForm) {

    registerForm.addEventListener("submit", function (event) {

        event.preventDefault();

        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value;
        const confirmPassword =
            document.getElementById("confirmPassword").value;

        const terms = document.getElementById("terms").checked;


        /* Clear previous errors */

        document.getElementById("nameError").textContent = "";
        document.getElementById("emailError").textContent = "";
        document.getElementById("passwordError").textContent = "";
        document.getElementById("confirmPasswordError").textContent = "";
        document.getElementById("termsError").textContent = "";


        let valid = true;


        /* Name validation */

        if (name === "") {

            document.getElementById("nameError").textContent =
                "Please enter your full name.";

            valid = false;

        } else if (name.length < 3) {

            document.getElementById("nameError").textContent =
                "Name must contain at least 3 characters.";

            valid = false;
        }


        /* Email validation */

        const emailPattern =
            /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {

            document.getElementById("emailError").textContent =
                "Please enter your email address.";

            valid = false;

        } else if (!emailPattern.test(email)) {

            document.getElementById("emailError").textContent =
                "Please enter a valid email address.";

            valid = false;
        }


        /* Password validation */

        if (password === "") {

            document.getElementById("passwordError").textContent =
                "Please create a password.";

            valid = false;

        } else if (password.length < 6) {

            document.getElementById("passwordError").textContent =
                "Password must contain at least 6 characters.";

            valid = false;
        }


        /* Confirm password */

        if (confirmPassword === "") {

            document.getElementById("confirmPasswordError").textContent =
                "Please confirm your password.";

            valid = false;

        } else if (password !== confirmPassword) {

            document.getElementById("confirmPasswordError").textContent =
                "Passwords do not match.";

            valid = false;
        }


        /* Terms */

        if (!terms) {

            document.getElementById("termsError").textContent =
                "Please accept the terms to continue.";

            valid = false;
        }


        /* Success */

        if (valid) {
            
             registerForm.submit();

        }

    });

}
/* =========================================
   LOGIN VALIDATION
   ========================================= */

const loginForm = document.getElementById("loginForm");

if (loginForm) {

    loginForm.addEventListener("submit", function (event) {

        const email =
            document.getElementById("loginEmail").value.trim();

        const password =
            document.getElementById("loginPassword").value;

        const emailError =
            document.getElementById("loginEmailError");

        const passwordError =
            document.getElementById("loginPasswordError");


        emailError.textContent = "";
        passwordError.textContent = "";


        let valid = true;


        const emailPattern =
            /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


        if (email === "") {

            emailError.textContent =
                "Please enter your email address.";

            valid = false;

        } else if (!emailPattern.test(email)) {

            emailError.textContent =
                "Please enter a valid email address.";

            valid = false;
        }


        if (password === "") {

            passwordError.textContent =
                "Please enter your password.";

            valid = false;

        } else if (password.length < 6) {

            passwordError.textContent =
                "Password must contain at least 6 characters.";

            valid = false;
        }


        if (!valid) {

            event.preventDefault();

        }

    });

}