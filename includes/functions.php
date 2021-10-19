<?php

function getDB($arr){
    $json = json_decode(file_get_contents("db.json"), true);
    return $json[$arr];
}

function createTable($array){
    $profilePage = isURI("profile");
    $keys = array_keys($array[0]);
    $keys = array_diff($keys, array("id"));
    if ( $profilePage ) {
        $keys = array_diff($keys, array("owner"));
        $keys .= "Action";
    }
    $htmlTable = "<table>";
    $htmlTable .= createTableHead($keys);
    foreach( $array as $items ) {
        $htmlTable .= createTableRow($items, $keys, $profilePage);
        };
    $htmlTable .= "</table>";
    return $htmlTable;
}

function createTableHead($keys){
    $tableHead = "<tr>";
    foreach( $keys as $key ){
            $tableHead .= "<th>" . $key . "</th>";
    }
    $tableHead .= "</tr>";
    return  $tableHead;
}

function createTableRow($items, $keys, $profilePage){
    $row = "<tr>";
    foreach( $keys as $key ){
        $item = $items[$key];
            if( $key == "name" ){
                $row .= "<td><a href='?id=$items[id]'>$item</a></td>";
            } elseif( !$profilePage && $key == "breed" ){
                $row .= "<td><a href='?breed=$item'>$item</a></td>";
            } else {
                $row .= "<td>$item</td>";
            }
    }
    $row .= "</tr>";
    return $row;
}

function isURI($URI){
    return $_SERVER['REQUEST_URI'] == "/$URI.php";
}

?>