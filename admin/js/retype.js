        function checkRetypePassword() {
            var password = document.getElementById("password").value;
            var retypePassword = document.getElementById("retypePassword").value;
            var retypePasswordStatus = document.getElementById("retypePasswordStatus");
            var submitBtn = document.getElementById("submitBtn");

            if (password === retypePassword) {
                retypePasswordStatus.style.color = "#28A745";
                retypePasswordStatus.textContent = "Passwords match!";
                submitBtn.disabled = false; 
            } else {
                retypePasswordStatus.style.color = "#DC3545";
                retypePasswordStatus.textContent = "Passwords do not match!";
                submitBtn.disabled = true;
            }
        }

        function checkPasswordStrength() {
            // Your existing password strength function
        }

        function validateForm() {
            var password = document.getElementById("password").value;
            var retypePassword = document.getElementById("retypePassword").value;

            if (password !== retypePassword) {
                alert("Passwords do not match!");
                return false;
            }

            // Add other validation logic here if needed

            return true;
        }
        function clearRetypePassword() {
            document.getElementById("retypePassword").value = "";
            document.getElementById("retypePasswordStatus").textContent = "";
            document.getElementById("submitBtn").disabled = true; // Disable the submit button
        }
    