<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
        header('Location: /login');
    }
    //Get all users
    if (isset($_SESSION["users"])) {
        $users = $_SESSION["users"]; 
    } else {
        $users = [];
    }
    //Hadle alert
    if (isset($_SESSION['error_message'])) {
        $messageType = "error"; // Show error message
        $errorMessage = $_SESSION['error_message']; // Get the error message
        unset($_SESSION['error_message']); // Clear the session message after using it
    } elseif (isset($_SESSION['success_message_user_add'])) {
        $messageType = "success"; // Show success message
        $successMessage = $_SESSION['success_message_user_add'];
        unset($_SESSION['success_message_user_add']);
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
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Admin add user</title>
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/alert.css">
</head>
<body>
    <?php include'includes/user.inc.php';?>
    <?php include'admin_header.php';?>
    <h1 class="title">ADD NEW USER</h1>
    <?php include 'alert.php' ?>
    <!-- Form to add new product-->
    <div class="add-product">
        <form action="includes/user.inc.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="inputEmail4">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Full name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="inputCity">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="inputCity">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <label for="inputCity">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                </div>
                <!-- <div class="form-group">
                    <label for="inputCity">State</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="State">
                </div> -->
            </div>
            <div class="btn-box">
                <button type="submit" name="add-user" class="btn btn-primary">Add new User</button>
                <button type="submit" name="update-user" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- Table show all user information-->
    <div class="table">
        <table style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data for demonstration -->
                <?php foreach(array_reverse($users) as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['phone_number']); ?></td>
                        <td><?php echo htmlspecialchars($user['address']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td>
                        <td>
                            <div class="btn-box">
                                <button type="submit" class="btn btn-primary">Remove</button>
                            </div>
                            <div class="btn-box">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="js/script.js"></script>
</body>
</html>