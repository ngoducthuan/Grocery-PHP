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
    <title>Shop</title>
</head>
<body>
    <?php include'includes/dbh.inc.php'?>
    <?php include'user_header.php'?>

    <section class="products">
        <h1 class="title">PRODUCTS</h1>
        <div class="box-container">
            <?php
                $select_products = $pdo->prepare("SELECT * FROM `products` LIMIT 6");
                $select_products->execute();
                if($select_products->rowCount() > 0){
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
            ?>
            <form action="" class="box" method="POST">
                <div class="price">$<span><?= $fetch_products['price']; ?></span>/-</div>
                <a href="view_page.php?pid=<?= $fetch_products['product_id']; ?>" class="fas fa-eye"></a>
                <img src="image_products/<?= $fetch_products['image_name']; ?>" alt="">
                <div class="name"><?= $fetch_products['product_name']; ?></div>
                <input type="hidden" name="pid" value="<?= $fetch_products['product_id']; ?>">
                <input type="hidden" name="p_name" value="<?= $fetch_products['product_name']; ?>">
                <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
                <input type="hidden" name="p_image" value="<?= $fetch_products['image_name']; ?>">
                <input type="number" min="1" value="1" name="p_qty" class="qty">
                <div class="flex-btn">
                    <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                    <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                </div>
            </form>
            <?php
                }
            }else{
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>
</body>
<script src="js/script.js"></script>
</html>