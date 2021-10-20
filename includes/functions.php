<?php

function getFile($file){
    $data = json_decode(file_get_contents($file), true);
    return $data;
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
                    $page = $i['page'];
                    $param = $i['param'];
                    $row .= "<td><a href=$page.php?$param=$items[$param]>$item</a></td>";
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
    $file = getFile("db.json");
    $db = $file[$dbarg];
    $index = columnSearch($searchArg, $db, $searchKey, $dbarg);
    if( $returnValue == false ){
        return $db[$index];
    }else{
        return $db[$index][$returnValue];
    }
}

function deleteInDB( $searchArg, $dbarg, $searchKey, $returnValue ){
    $file = getFile("db.json");
    $db = $file[$dbarg];

    $index = columnSearch($searchArg, $db, $searchKey, $dbarg);
    unset($file[$dbarg][$index]);
    file_put_contents( "db.json", json_encode($file) );
}

function columnSearch($searchArg, $db, $searchKey, $dbarg,){
    $column = array_column($db, $searchKey);
    $found = array_search($searchArg, $column);
    return $found;
}

function getMax($db,$key){
    return max(array_column($db, $key));
}

function addToDB($data, $dbarg ){
    $db = getFile("db.json");
    $data['id'] = getMax($db[$dbarg], "id")+1;
    array_push($db[$dbarg], $data);
    file_put_contents("db.json", json_encode($db,JSON_PRETTY_PRINT));
}

?>