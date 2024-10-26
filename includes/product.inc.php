<?php
    //Get all product info
    require_once "dbh.inc.php";

    $query = "SELECT * FROM products";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["products"] = $products;
    //Handle POST request
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        if(isset($_POST["add"])){
            #Get specific atribute
            $product_name = $_POST["product_name"];
            $price = $_POST["price"];
            $stock_quantity = $_POST["stock_quantity"];
            $description = $_POST["description"];
            #Handle picture
            $image_name = $_FILES["image"]["name"];
            $target_dir = "../image_products/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true); // Tạo thư mục
            }
            $target_file = $target_dir . basename($image_name);
            #Check file is image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                echo "<script>alert('File is not an image.');</script>";
                exit(); // Dừng thực thi nếu không phải hình ảnh
            }

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Stored data in database
                try {
                    $add_query = "INSERT INTO products (category_id, product_name, description, price, stock_quantity, image_name) VALUES (?, ?, ?, ?, ?, ?)";
                    $add_stmt = $pdo->prepare($add_query);
                    $add_stmt->execute([0, $product_name, $description, $price, $stock_quantity, $image_name]);
                    
                    $_SESSION["success_message_add"] = "Added successfully product";
                    header("Location: /admin_product");
                    exit();
                } catch (PDOException $e) {
                    die("Query failed: " . $e->getMessage());
                }
            } else {
                echo "<script>alert('Error uploading image.');</script>";
                exit();
            }
        }
    }
?>