<?php
    //Get URL
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    //Remove "/" at first and last URL
    $path = trim($path, '/');

    //Check URL to routing
    if($path == "" || $path == "dashboard"){
        include 'dashboard.php';
    }elseif($path == "login"){
        include "login.php";
    }elseif($path == "register"){
        include "register.php";
    }elseif($path == "admin_page"){
        include "admin_page.php";
    }
    elseif($path == "logout"){
        include "logout.php";
    }
    elseif($path == "admin_update_profile"){
        include "admin_update_profile.php";
    }
    elseif($path == "admin_product"){
        include "admin_product.php";
    }
    elseif($path == "admin_user"){
        include "admin_user.php";
    }
    elseif($path == "admin_product_list"){
        include "admin_product_list.php";
    }
    elseif($path == "user_update_profile"){
        include "user_update_profile.php";
    }
    elseif($path == "about"){
        include "user_about.php";
    }
    elseif($path == "shop"){
        include "user_shop.php";
    }
    elseif($path == "contact"){
        include "user_contact.php";
    }
    else{
        include "404.php";
    }
?>