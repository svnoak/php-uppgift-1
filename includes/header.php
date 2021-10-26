<?php
require_once "authentication.php";
require_once "dialogs/dialogs.php";
require_once "functions.php";

function isActive($page){
    if(isPage($page)) echo "active";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>IDDb</title>
</head>
<body>
<!--     <nav>
        <ul>
            <li id="nav-home" class="nav-item <?php isActive("index") ?>">
                <a href="/index.php">Home</a>
            </li>
            <li id="nav-list" class="nav-item <?php isActive("list") ?>">
                <a href="/list.php">Doggos</a>
            </li>
            <?php  if( isLoggedIn() ){ ?>
                <li id="nav-add" class="nav-item <?php isActive("add") ?>">
                <a href="/add.php">Add</a>
            </li>
            <li id="nav-profile" class="nav-item <?php isActive("profile") ?>">
                <a href="/profile.php">Backyard</a>
            </li>
            <li id="nav-signout" class="nav-item <?php isActive("sign-out") ?>">
                <a href="/sign-out.php">Sign out</a>
            </li>
            <?php }else{ ?>
            <li id="nav-signin" class="nav-item <?php isActive("sign-in") ?>">
                <a href="/sign-in.php">Sign in</a>
            </li>
            <?php } ?>
            <div id="selector"></div>
        </ul>
    </nav> -->