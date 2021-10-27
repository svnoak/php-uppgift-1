<?php

include "index-dialog.php";
include "dogpark-dialog.php";
include "dogparkdetails-dialog.php";


$dialogs = [
    "index"=>$index,
    "dogpark"=>$dogpark,
    "dogparkdetails"=>$dogparkdetails
];

if( isLoggedIn() ){  
    include "backyard-dialog.php";
    include "home-dialog.php";
    $dialogs["backyard"] = $backyard;
    $dialogs["home"] = $home;
}

?>