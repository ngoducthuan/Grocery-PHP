<header class="header">

    <div class="flex">

        <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

        <nav class="navbar">
            <a href="/admin_page">Home</a>
            <a href="/admin_product">Products Manage</a>
            <a href="/admin_product_list">Products List</a>
            <a href="/admin_user">Users</a>
            <a href="/admin_orders">Orders</a>
            <a href="/admin_contact">Messages</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
            <?php
                $select_profile = $pdo->prepare("SELECT * FROM `users` WHERE user_id = ?");
                $select_profile->execute([$admin_id]);
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <!-- <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt=""> -->
            <i class="fas fa-user-circle" style="font-size: 100px;"></i>
            <p><?= $fetch_profile['full_name']; ?></p>
            <!-- <a href="admin_update_profile.php" class="btn">update profile</a>
            <a href="logout.php" class="delete-btn">logout</a>
            <div class="flex-btn">
                <a href="login.php" class="option-btn">login</a>
                <a href="register.php" class="option-btn">register</a>
            </div> -->
            <ul class="logout-options">
                <li><a href="/admin_update_profile"><i class="fas fa-user"></i> My Profile</a></li>
                <li><a href="/use"><i class="fas fa-edit"></i> Edit Profile</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i> Inbox</a></li>
                <li><a href="/login"><i class="fas fa-sign-in-alt"></i> Login </a></li>
                <li><a href="/register"><i class="fas fa-id-card"></i> Register </a></li>
                <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>