<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
        header('Location: /login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Admin page</title>
    <link rel="stylesheet" href="css/component.css">
</head>
<body>
    <?php include'includes/dbh.inc.php';?>
    <?php include'admin_header.php';?>
    <h1 class="title">DASHBOARD</h1>
    
    <script src="js/script.js"></script>
</body>
</html>