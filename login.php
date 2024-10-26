<?php
    session_start();
    if (isset($_SESSION['error_message'])) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const errorSpans = document.querySelectorAll(".text_field span");
                const errorLabels = document.querySelectorAll(".text_field label");

                errorSpans.forEach((span) => {
                    span.classList.add("error"); // Add error class
                });
                errorLabels.forEach((label) => {
                    label.classList.add("error"); // Add error class
                });

                setTimeout(() => {
                    errorSpans.forEach((span) => {
                        span.classList.remove("error");
                    });
                    errorLabels.forEach((label) => {
                        label.classList.remove("error");
                    });
                }, 700);
            });
        </script>';
    }
    //Handle if register successful
    if (isset($_SESSION['error_message'])) {
        $messageType = "error"; // Show error message
        $errorMessage = $_SESSION['error_message'];
        unset($_SESSION['error_message']); // Clear the session message after using it
    } elseif (isset($_SESSION['success_message'])) {
        $messageType = "success"; // Show success message
        $successMessage = $_SESSION['success_message'];
        unset($_SESSION['success_message']);
    } elseif (isset($_SESSION['warning_message'])) {
        $messageType = "warn"; // Show warning message
        $warningMessage = $_SESSION['warning_message'];
        unset($_SESSION['warning_message']);
    } elseif (isset($_SESSION['info_message'])) {
        $messageType = "info"; // Show info message
        $infoMessage = $_SESSION['info_message'];
        unset($_SESSION['info_message']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/alert.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'alert.php' ?>
    <div class="center">
        <h1>Login</h1>
        <form method='POST' action="includes/formhandler.inc.php">
            <div class="text_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="text_field">
                <input type="text" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="forgot_pass">Forgot Password?</div>
            <input type="submit" name="login_handle" value="Login">
            <div class="signup_link">
                Not a member? <a href="/register">Register</a>
            </div>
            <div class="signup_link">
                Go to dashboard? <a href="/dashboard">Dashboard</a>
            </div>
        </form>
    </div>
</body>
</html>