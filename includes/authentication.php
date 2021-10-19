<?php
session_start();

if( $_SERVER['REQUEST_URI'] != "/index.php" || "/dogs.php"  ){
    if( !isset($_SESSION['isLoggedIn']) ){
        if( !$_SESSION['isLoggedIn'] ){
            $_SESSION['status'] = "Please log in to access this page";
            header("location: /sign-in.php");
            session_destroy();
            exit();
        }
    }
}

?>