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
    <title>Admin add product</title>
    <link rel="stylesheet" href="css/component.css">
    <link rel="stylesheet" href="css/product_list.css">
</head>
<body>
    <?php include'includes/dbh.inc.php';?>
    <?php include'admin_header.php';?>
    <section class="show-products">
        <h1 class="title">LIST PRODUCTS</h1>
        <!-- Form to add new product-->
        <div class="box-container">
            <?php
                $show_products = $pdo->prepare("SELECT * FROM `products`");
                $show_products->execute();
                if($show_products->rowCount() > 0){
                    while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
                        ?>
                        <div class="wrapper">
                            <div class="box">
                                <div class="price">$<?= $fetch_products['price']; ?>/-</div>
                                <img src="image_products/<?= $fetch_products['image_name']; ?>" alt="">
                                <div class="name"><?= $fetch_products['product_name']; ?></div>
                                <div class="cat"><?= $fetch_products['category_id']; ?></div>
                                <div class="details"><?= $fetch_products['description']; ?></div>
                                <div class="flex-btn">
                                    <a href="admin_update_product.php?update=<?= $fetch_products['product_id']; ?>" class="option-btn">update</a>
                                    <a href="admin_products.php?delete=<?= $fetch_products['product_id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }else{
                    echo '<p class="empty">now products added yet!</p>';
                }
            ?>
        </div>
    </section>
</body>
<script src="js/script.js"></script>
</html>