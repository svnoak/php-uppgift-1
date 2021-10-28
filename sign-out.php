<?php
    
    // Ser till att man får en smoooth animation från den sidan man var till index genom change parametern.
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