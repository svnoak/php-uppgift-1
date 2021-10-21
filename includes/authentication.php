<?php
require_once "functions.php";

session_start();

// Kollar om användaren är inloggad och slänger annars ut den.
if( isPage("profile") || isPage("add") || isPage("delete") ){
    if( !isLoggedIn() ){
        $_SESSION['status'] = "Please log in to access this page";
        $_SESSION['error'] = 401;
        header("location: /sign-in.php");
        session_destroy();
        exit();
    }
}
?>