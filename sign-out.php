<?php
    if(isset($_GET["change"])){
        $changeParam = "?change=$_GET[change]";
    }else{
        $changeParam = "";
    }
    session_start();
    session_unset();
    session_destroy();
    header("location: index.php$changeParam");
    exit();

?>