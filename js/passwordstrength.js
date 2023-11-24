        function checkPasswordStrength() {
            var password = document.getElementById("password").value;
            var strengthBadge = document.getElementById("passwordStrength");

            // Default colors
            var strengthColors = ["#DC3545", "#FFC107", "#28A745", "#007BFF"];
            var strengthWords = ["Weak", "Fair", "Good", "Strong"];

            // Display strength
            var strength = 0;
            if (password.length >= 8) {
                strength++;
            }
            if (password.match(/[a-z]+/)) {
                strength++;
            }
            if (password.match(/[A-Z]+/)) {
                strength++;
            }
            if (password.match(/[0-9]+/)) {
                strength++;
            }
            if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) {
                strength++;
            }

            // Update the text based on the strength
            if (password !== "") {
                strengthBadge.style.color = strengthColors[strength - 1];
                strengthBadge.textContent = strengthWords[strength - 1];
            } else {
                strengthBadge.style.color = "";
                strengthBadge.textContent = "";
            }
        }