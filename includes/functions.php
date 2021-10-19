<?php

function getDB($arr){
    $json = json_decode(file_get_contents("db.json"), true);
    return $json[$arr];
    
}

?>