<?php
    require_once "dbh.inc.php";

    $user_query = "SELECT * FROM users";
    $stmt = $pdo->prepare($user_query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['users'] = $users;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        echo "<script>alert('oke')</script>";
        if(isset($_POST["add-user"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            echo "<script>alert('oke1')</script>";
            try{
                $add_user_query = "INSERT INTO users(username, pass, email, full_name, phone_number, address, role, state) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($add_user_query);
                $stmt->execute([$username, $password, $email, $fullname, $phone, $address, 'customer', 'active']);

                $_SESSION["success_message_user_add"] = "Added successfully a user";
                header("Location: /admin_user");
                exit();
            }catch(PDOException $e){
                echo "<script>alert('Query failed: " . $e->getMessage() . "');</script>";
                die("Query failed: " . $e->getMessage());
            }
        }
    }
?>