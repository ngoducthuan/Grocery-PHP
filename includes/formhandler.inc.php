<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Retrieve and sanitive user input
        if (isset($_POST['login_handle'])) {
        
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            if(empty($username) || empty($password)){
                echo "<script>alert('All fields are required')</script>";
            }else{
                try {
                    require_once "dbh.inc.php"; //require_one stop at here if command hava a error
                    
                    $query = "SELECT * FROM users WHERE username = ? AND pass = ?;";
                    $stmt = $pdo->prepare($query);
                    $stmt -> execute([$username, $password]);

                    //Handle if user existing
                    $count = $stmt->rowCount();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);  
                    if($count > 0)  
                    {  
                        $_SESSION['user_data'] = $row;
                        $_SESSION['success_message'] = 'Login successfully!';
                        if($row['role'] == 'admin'){
                            $_SESSION['admin_id'] = $row['user_id'];
                            header('Location: ../admin_page');
                        }elseif($row['role'] == 'customer'){
                            $_SESSION['user_id'] = $row['user_id'];
                            header('Location: ../dashboard');
                        }                        
                    }
                    else  
                    {
                        $_SESSION['error_message'] = 'Username or password is not correct'; // Stored message error to session
                        header("Location: ../login");
                        exit();
                    }
                } catch (PDOException $e) {
                    die("Query failed: " . $e->getMessage());
                }
            }
        }
        if(isset($_POST["register_handle"])){
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            $full_name = trim($_POST["full_name"]);
            $phone = trim($_POST["phone"]);
            $email = trim($_POST["email"]);
            $location = trim($_POST["location"]);

            if(empty($username) || empty($password) || empty($full_name) || empty($phone) || empty($email) || empty($location)){
                echo"<script>alert('All field is required.');</script>";
            }else{
                try {
                    require_once "dbh.inc.php";
                    $query = "INSERT INTO users (username, pass, email, full_name, phone_number, address, role, state) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$username,$password,$email,$full_name,$phone,$location,"customer","active"]);
                    // echo"<script>
                    //         alert('You are registerd. Click Oke to Login.');
                    //         window.location.href = '/login';
                    //     </script>";
                    $_SESSION["success_message"] = "You are registed sucessfully";
                    header("Location: /login");
                    exit();
                } catch (PDOException $e) {
                    $_SESSION["register_info"] = [
                        'username' => $username,
                        'password' => $password,
                        'full_name' => $full_name,
                        'phone'=> $phone,
                        'email'=> $email,
                        'location'=> $location
                    ];
                    // echo"<script>
                    //         alert('Username or email is existed.');
                    //         window.location.href = '/register';
                    //     </script>";
                    //header('Location: /register');
                    // Store the error message
                    $_SESSION['error_message'] = "Username or email already exists.";
                    header("Location: /register");
                    exit();
                    //die("Query failed: ". $e->getMessage());
                }
            }
        }
    }else{
        header("Location: ../dashboard");
    }
?>