<?php
    require_once "includes/functions.php";
    $dogID = $_GET['id'];
    replaceInDB($dogID, "dogs", "id", "name");
    header("location: /profile.php");
?>