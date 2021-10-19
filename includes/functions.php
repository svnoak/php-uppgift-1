<?php

function getDB($arg){
    $json = json_decode(file_get_contents("db.json"), true);
    if($arg == "all"){
        return $json;
    }else{
        return $json[$arg];
    }
}

function createTable($array, $headers, $links, $action){
    if( count($array) > 0 ){
        $htmlTable = "<table>";
        $htmlTable .= createTableHead($headers, $action);
        $htmlTable .= createTableRows($array, $links, $headers, $action);
        $htmlTable .= "</table>";
        return $htmlTable;
    }else{
        echo "<p>You don't own any dogs. Do you want to <a href='add.php'>add dogs</a>?</p>";
    }
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
                }elseif( $key == "owner") {
                    $row .= "<td>" . findInDB($item, "users", "id", "username") . "</td>";
                    }else{
                        $row .= "<td>$item</td>";
                    }
            }
        }
        if( $action ) $row .= "<td><a href='delete.php?id=$items[id]'>Delete</a></td>";
        $row .= "</tr>";
        $rows .= $row;
    }
    $rows .= "</tbody>";
    return $rows;
}

function isURI($URI){
    return $_SERVER['REQUEST_URI'] == "/$URI.php";
}

function findInDB($searchArg, $dbarg, $searchKey, $returnValue){
    $db = getDB($dbarg);
    $found = columnSearch($searchArg, $db, $searchKey, $dbarg);
    if( $returnValue == false ){
        return $found;
    }else{
        return $db[$found][$returnValue];
    }
}

function replaceInDB( $searchArg, $dbarg, $searchKey, $returnValue ){
    $db = getDB("all");
    $index = columnSearch($searchArg, $db, $searchKey, $dbarg);
    unset($db[$dbarg][$index]);
    file_put_contents( "db.json", json_encode($db) );
    return $index;
}

function columnSearch($searchArg, $db, $searchKey, $dbarg,){
    $column = array_column($db[$dbarg], $searchKey);
    $found = array_search($searchArg, $column);
    return $found;
}

function getMax($db,$key){
    return max(array_column($db, $key));
}

function addToDB($data, $dbarg ){
    $db = getDB("all");
    $data['id'] = getMax($db[$dbarg], "id")+1;
    array_push($db[$dbarg], $data);
    file_put_contents("db.json", json_encode($db,JSON_PRETTY_PRINT));
}

?>