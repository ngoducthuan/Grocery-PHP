<?php
    session_start();
    $admin_id = $_SESSION['admin_id'];
    if(!isset($admin_id)){
        header('Location: /login');
    }
    //Get all products info
    $products = isset($_SESSION['products']) ? $_SESSION['products'] : [];
    //Handle alert
    // Set the message type based on some conditions (for example, based on an error)
    if (isset($_SESSION['error_message'])) {
        $messageType = "error"; // Show error message
        $errorMessage = $_SESSION['error_message']; // Get the error message
        unset($_SESSION['error_message']); // Clear the session message after using it
    } elseif (isset($_SESSION['success_message_add'])) {
        $messageType = "success"; // Show success message
        $successMessage = $_SESSION['success_message_add'];
        unset($_SESSION['success_message_add']);
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
    <title>Admin add product</title>
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/component.css">
</head>
<body>
    <?php include'includes/product.inc.php';?>
    <?php include'admin_header.php';?>
    <h1 class="title">ADD NEW PRODUCT</h1>
    <?php include 'alert.php'; ?>
    <!-- Form to add new product-->
    <div class="add-product">
        <form method="POST" action="includes/product.inc.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="inputEmail4">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="0">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Stock Quantity</label>
                    <input type="number" step="0.01" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="0">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="inputCity">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="inputImage">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" style="padding:7.2px;">
                </div>
            </div>
            <div class="btn-box">
                <button type="submit" name="add" class="btn btn-primary">Add new Product</button>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- Table show all product-->
    <div class="table">
        <table style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Description</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data for demonstration -->
                <?php foreach (array_reverse($products) as $product ): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($product['price']); ?></td>
                        <td><?php echo htmlspecialchars($product['stock_quantity']); ?></td>
                        <td><?php echo htmlspecialchars($product['description']); ?></td>
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