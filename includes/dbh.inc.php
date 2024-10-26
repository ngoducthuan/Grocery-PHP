<?php
    $dsn = "mysql:host=localhost;dbname=grocery;charset=utf8"; // name source
    $username_db = "root"; // username
    $password_db = ""; // password

    try {
        // create connection
        $pdo = new PDO($dsn, $username_db, $password_db);
        // handle error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>