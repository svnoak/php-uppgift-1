<?php
session_start();

if( $_SERVER['REQUEST_URI'] == "/profile.php" || $_SERVER['REQUEST_URI'] == "/add.php" ){
    if( !isset($_SESSION['isLoggedIn']) ){
        if( !$_SESSION['isLoggedIn'] ){
            $_SESSION['status'] = "Please log in to access this page";
            $_SESSION['error'] = 401;
            header("location: /sign-in.php");
            session_destroy();
            exit();
        }
    }
}

function isLoggedIn(){
    if( isset($_SESSION['isLoggedIn']) ){
        return $_SESSION['isLoggedIn'];
    } else{
        return false;
    }
}

function setSessionStatus($statusMessage){
    $_SESSION['status']  = $statusMessage;
}

function echoSessionStatus(){
    if( isset($_SESSION['status']) ){
        echo "<p>" . $_SESSION['status'] . "</p>";
    }
}

function sessionError(){
    if( isset($_SESSION['error']) ){
       return $_SESSION['error'];
    }
}
?>