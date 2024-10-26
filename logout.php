<?php
    session_start();
    session_unset();//Remove session varible
    session_destroy();//Destroy session

    header("Location: /login");
?>