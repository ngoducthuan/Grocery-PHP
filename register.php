<?php
    session_start();
    $register_info = isset($_SESSION["register_info"]) ? $_SESSION["register_info"] : [
        'username'=>'',
        'password'=> '',
        'full_name'=> '',
        'phone'=> '',
        'email'=> '',
        'location'=> '',
    ];
    //Retrieve the error message
    unset($_SESSION['register_info']);

    // Set the message type based on some conditions (for example, based on an error)
    if (isset($_SESSION['error_message'])) {
        $messageType = "error"; // Show error message
        $errorMessage = $_SESSION['error_message']; // Get the error message
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
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/alert.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'alert.php' ?>
    <div class="center">
        <h1>Register</h1>
        <form method='POST' action="includes/formhandler.inc.php">
            <div class="text_field">
                <input type="text" name="username" value="<?php echo htmlspecialchars($register_info['username']); ?>" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="text_field">
                <input type="text" name="password" value="<?php echo htmlspecialchars($register_info['password']) ?>" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="text_field">
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($register_info['full_name']) ?>" required>
                <span></span>
                <label>Full Name</label>
            </div>
            <div class="text_field">
                <input type="text" name="phone" value="<?php echo htmlspecialchars($register_info['phone']) ?>" required>
                <span></span>
                <label>Phone</label>
            </div>
            <div class="text_field">
                <input type="text" name="location" value="<?php echo htmlspecialchars($register_info['location']) ?>" required>
                <span></span>
                <label>Location</label>
            </div>
            <div class="text_field">
                <input type="text" name="email" value="<?php echo htmlspecialchars($register_info['email']) ?>" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="forgot_pass">Forgot Password?</div>
            <input type="submit" name="register_handle" value="Register">
            <div class="login_link">
                Have account? <a href="/login">Login</a>
            </div>
            <div class="login_link">
                Go to dashboard? <a href="/dashboard">Dashboard</a>
            </div>
        </form>
    </div>
</body>
</html>