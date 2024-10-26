<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
        header('Location: /login');
    }else{
        $user_data = $_SESSION['user_data'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Admin Update Profile </title>
    <link rel="stylesheet" href="css/component.css">
</head>
<body>
    <?php include'includes/dbh.inc.php';?>
    <?php include'admin_header.php';?>
    <!-- Start content -->
    <div class="content"> 
        <h2>UPDATE ADMIN ACCOUNT</h2>    
        <div class="container">
            <div class="profile-settings">
                
                <div class="account-details">
                    <form>
                        <div class="profile-user">
                            <!-- <img src="../../assets/pic/user1.jpg" alt="Profile Picture">             -->
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user_data['username']); ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div>
                                    <label for="full-name">Full name</label>
                                    <input type="text" id="full-name" name="last-name" value="<?php echo htmlspecialchars($user_data['full_name']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div>
                                    <label for="email">Email address</label>
                                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>">
                                </div>
                                <div>
                                    <label for="phone">Phone number</label>
                                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user_data['phone_number']); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($user_data['address']); ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div>
                                    <label for="phone">New password</label>
                                    <input type="password" id="phone" name="phone">
                                </div>
                                <div>
                                    <label for="phone">Confirm password</label>
                                    <input type="password" id="phone" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button class="save-btn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
    <script src="js/script.js"></script>
</body>
</html>