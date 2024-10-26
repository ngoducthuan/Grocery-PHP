<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('Location: /login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Contact</title>
</head>
<body>
    <?php include'includes/dbh.inc.php'?>
    <?php include'user_header.php'?>

    <section class="contact">
    <div class="content"> 
        <h2>CONTACT WITH US</h2>    
            <div class="container">
                <form>
                    <div class="form-group">
                        <input type="text" id="username" name="username" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <input type="text" id="email" name="last-name" placeholder="Enter your email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div>
                                <input type="address" id="address" name="address" placeholder="Enter your address">
                            </div>
                            <div>
                                <input type="address" id="phone" name="phone" placeholder="Enter your phone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea type="box" id="user-contact" name="contact" placeholder="Enter your contact"></textarea>
                    </div>
                    <div class="btn-box">
                        <button class="btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>

</body>
<script src="js/script.js"></script>
</html>