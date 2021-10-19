<?php
require_once "authentication.php";
require_once "functions.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>IDDb</title>
</head>
<body>
    <nav>
    <div class="header">The Internet Dog Database</div>
        <ul>
            <li>
                <a href="/index.php">Home</a>
            </li>
            <li>
                <a href="/list.php">Dogs</a>
            </li>
            <?php  if( isLoggedIn() ){ ?>
                <li>
                <a href="/add.php">Add</a>
            </li>
            <li>
                <a href="/profile.php">Profile</a>
            </li>
            <li>
                <a href="/sign-out.php">Sign out</a>
            </li>
            <?php }else{ ?>
            <li>
                <a href="/sign-in.php">Sign in</a>
            </li>
            <?php } ?>
        </ul>
    </nav>