<header class="header">
   <div class="flex">
        <a href="dashboard.php" class="logo">Groco<span>.</span></a>
        <nav class="navbar">
            <a href="/dashboard">Home</a>
            <a href="/shop">Shop</a>
            <a href="/order">Orders</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <?php if(isset($_SESSION["user_id"])) : ?>
                <a href="search_page.php" class="fas fa-search"></a>
                <!-- <?php
                    // $count_cart_items = $pdo->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                    // $count_cart_items->execute([$user_id]);
                    // $count_wishlist_items = $pdo->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
                    // $count_wishlist_items->execute([$user_id]);
                ?> -->
                <a href="wishlist.php"><i class="fas fa-heart"></i></a>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <?php endif; ?>
        </div>
        <div class="profile">
            <?php if(isset($_SESSION["user_id"])) : ?>
                <?php
                    // $select_profile = $pdo->prepare("SELECT * FROM `users` WHERE user_id = ?");
                    // $select_profile->execute([$user_id]);
                    // $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                    $user_data = $_SESSION["user_data"];
                ?>
                <!-- <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt=""> -->
                <i class="fas fa-user-circle" style="font-size: 100px;"></i>
                <p><?= $user_data['full_name']; ?></p>
                <ul class="logout-options">
                    <li><a href="/user_update_profile"><i class="fas fa-user"></i> My Profile</a></li>
                    <li><a href="/use"><i class="fas fa-edit"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i> Inbox</a></li>
                    <li><a href="/login"><i class="fas fa-sign-in-alt"></i> Login </a></li>
                    <li><a href="/register"><i class="fas fa-id-card"></i> Register </a></li>
                    <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            <?php else: ?>
                <ul class="logout-options">
                    <i class="fas fa-user-circle" style="font-size: 100px;"></i>
                    <p>Not logged in</p>
                    <li><a href="/login"><i class="fas fa-sign-in-alt"></i> Login </a></li>
                    <li><a href="/register"><i class="fas fa-id-card"></i> Register </a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</header>