<?php

include "index-dialog.php";
include "dogpark-dialog.php";
include "dogparkdetails-dialog.php";
include "backyard-dialog.php";
include "home-dialog.php";
include "backyarddetails-dialog.php";

// Hämtar in alla dialoger. Detta var ett helvette, iom att jag hade alla dialoger som variable med funktioner i.
$dialogs = [
    "index"=>$index,
    "dogpark"=>$dogpark,
    "dogparkdetails"=>$dogparkdetails,
    "home" => $home,
    "backyard" => $backyard,
    "backyarddetails" => $backyarddetails
];

?>