<?php
include_once "includes/header.php";

if( isLoggedIn() ) header('Location: /home.php');

if( isset($_POST['signin']) ){
    if( strlen($_POST['email']) && strlen($_POST['password']) ){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $users = getFile("db.json")["users"];
        foreach( $users as $user ){
            if( $user['email'] == $email ){
                if( $user['password'] == $password){
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['userID'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    header("location: /home.php?change=indexToHouse");
                    exit();
                }else{
                    setSessionStatus("Wrong email or password");
                }
            } setSessionStatus("Wrong email or password");
        }
    }else{
        setSessionStatus("You need to enter both email and password");
    }
}
?>