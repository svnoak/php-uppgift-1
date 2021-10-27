<?php
    require_once "includes/functions.php";
    $dogID = $_GET['id'];
    deleteInDB($dogID, "dogs", "id", "name");
    header("location: /home.php?scene=backyard&dialog=1");
?>