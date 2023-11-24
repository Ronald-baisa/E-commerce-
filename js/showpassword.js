        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordToggle = document.querySelector(".password-toggle");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.textContent = "Hide Password";
            } else {
                passwordInput.type = "password";
                passwordToggle.textContent = "Show Password";
            }
        }