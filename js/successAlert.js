        // Add an event listener to the button
// Add an event listener to the form
        document.getElementById('myForm').addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();
            // Simulate a successful registration
            // You can replace this with your actual registration logic
            var registrationSuccessful = true;

            if (registrationSuccessful) {
                // Show SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your account update was successful.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Redirect to success.php
                    document.getElementById('myForm').submit();
                });
            }
        });