<?php
    session_start();
    // $user_id = $_SESSION['user_id'];
    // if(!isset($user_id)){
    //     header('Location: /login');
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <?php include'includes/dbh.inc.php'?>
    <?php include'user_header.php'?>

    <div class="home-bg">
        <section class="home">
            <div class="content">
                <span>don't panic, go organice</span>
                <h3>Reach For A Healthier You With Organic Foods</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto natus culpa officia quasi, accusantium explicabo?</p>
                <a href="about.php" class="btn">about us</a>
            </div>
        </section>
    </div>

    <section class="home-category">
        <h1 class="title">shop by category</h1>
        <div class="box-container">
            <div class="box">
                <img src="images/cat-1.png" alt="">
                <h3>fruits</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                <a href="category.php?category=fruits" class="btn">fruits</a>
            </div>
            <div class="box">
                <img src="images/cat-2.png" alt="">
                <h3>meat</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                <a href="category.php?category=meat" class="btn">meat</a>
            </div>
            <div class="box">
                <img src="images/cat-3.png" alt="">
                <h3>vegitables</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                <a href="category.php?category=vegitables" class="btn">vegitables</a>
            </div>
            <div class="box">
                <img src="images/cat-4.png" alt="">
                <h3>fish</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                <a href="category.php?category=fish" class="btn">fish</a>
            </div>
        </div>
    </section>

    <!-- <section class="products">
        <h1 class="title">latest products</h1>
        <div class="box-container">
            <?php
                $select_products = $pdo->prepare("SELECT * FROM `products` LIMIT 6");
                $select_products->execute();
                if($select_products->rowCount() > 0){
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
            ?>
            <form action="" class="box" method="POST">
                <div class="price">$<span><?= $fetch_products['price']; ?></span>/-</div>
                <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                <div class="name"><?= $fetch_products['name']; ?></div>
                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="p_name" value="<?= $fetch_products['product_name']; ?>">
                <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
                <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
                <input type="number" min="1" value="1" name="p_qty" class="qty">
                <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                <input type="submit" value="add to cart" class="btn" name="add_to_cart">
            </form>
            <?php
                }
            }else{
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section> -->
</body>
<script src="js/script.js"></script>
</html>