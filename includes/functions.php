<?php

function getDB($arr){
    $json = json_decode(file_get_contents("db.json"), true);
    return $json[$arr];
}

function createTable($array, $headers, $links, $action){
    $htmlTable = "<table>";
    $htmlTable .= createTableHead($headers, $action);
    $htmlTable .= createTableRows($array, $links, $headers, $action);
    $htmlTable .= "</table>";
    return $htmlTable;
}

function createTableHead($headers, $action){
    $tableHead = "<thead><tr>";
    foreach( $headers as $title ){
            $tableHead .= "<th>" . $title . "</th>";
    }
    if ( $action ) $tableHead .= "<th>" . "action" . "</th>";
    $tableHead .= "</tr></thead>";
    return  $tableHead;
}

function createTableRows($array, $links, $headers, $action){
    $rows = "<tbody>";
    foreach( $array as $items ) {
        $row = "<tr>";
        foreach( $items as $key=>$item ){
            if( in_array( $key, $headers ) ){
                if( array_key_exists( $key, $links ) ){
                    $i = $links[$key];
                    $row .= "<td><a href=?$i=$items[$i]>$item</a></td>";
                }else{
                    $row .= "<td>$item</td>";
                    }
            }
        }
        if( $action ) $row .= "<td><a href='delete.php'>Delete</a></td>";
        $row .= "</tr>";
        $rows .= $row;
    }
    $rows .= "</tbody>";
    return $rows;
    
}

function isURI($URI){
    return $_SERVER['REQUEST_URI'] == "/$URI.php";
}

?>