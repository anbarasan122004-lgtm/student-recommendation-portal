document.addEventListener("DOMContentLoaded", function () {

    const registerForm = document.getElementById("registerForm");

    if (registerForm) {

        registerForm.addEventListener("submit", function (event) {

            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value;
            const role = document.getElementById("role").value;
            const department = document.getElementById("department").value.trim();


    
            if (name.length < 3) {

                alert("Please enter a valid full name.");

                event.preventDefault();

                return;
            }


        
            const emailPattern =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {

                alert("Please enter a valid email address.");

                event.preventDefault();

                return;
            }


    
            if (password.length < 6) {

                alert("Password must contain at least 6 characters.");

                event.preventDefault();

                return;
            }


    
            if (role === "") {

                alert("Please select an account type.");

                event.preventDefault();

                return;
            }


            
            if (department.length < 2) {

                alert("Please enter your department.");

                event.preventDefault();

                return;
            }

        });

    }

});