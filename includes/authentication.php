<?php
require_once "functions.php";
session_set_cookie_params(0);
session_start();

// Kollar om användaren är inloggad och slänger annars ut den.
if( isPage("home") ){
    if( !isLoggedIn() ){
        $_SESSION['status'] = "Please log in to access this page";
        $_SESSION['error'] = 401;
        header("location: /index.php?dialog=9");
        exit();
    }
}else{
    if(isset($_GET['scene'])){
        if( !isLoggedIn() ){
            if( $_GET['scene'] == "home" || $_GET['scene'] == "backyard" || $_GET['scene'] == "backyarddetails"){
                $_SESSION['status'] = "Please log in to access this page";
                $_SESSION['error'] = 401;
                header("location: /index.php?dialog=9");
                exit();
            }
        }
    }
}
?>