<?php
/*

AUTHENTICATION FUNCTIONS

*/

// Kollar om det finns en Session variable och om den är true eller false
function isLoggedIn(){
    if( isset($_SESSION['isLoggedIn']) ){
        return $_SESSION['isLoggedIn'];
    } else{
        return false;
    }
}


// Sätter Session status, pga easier.
function setSessionStatus($statusMessage){
    $_SESSION['status']  = $statusMessage;
}

// skriver ut session status om någon sådan finns.
function echoSessionStatus(){
    if( isset($_SESSION['status']) ){
        echo "<p>" . $_SESSION['status'] . "</p>";
    }
}

// Kollar om det finns en session error.
function sessionError(){
    if( isset($_SESSION['error']) ){
       return $_SESSION['error'];
    }
}


/*

TABLE FUNCTIONS

*/

/*
Skapar en HTML Tabell.
Parameterna för tabellen skickas med på respektive sida.
$array == datan som ska läggas i tabellen.
$headers == Tabellhuvudet, dvs titlarna som ska visas.
$links == vilka kolumner som skall vara länkar med respektive attribut
$action == om tabellen ska ha en delete action eller inte. 
*/
function createTable($array, $headers, $links, $action){
    if( count($array) > 0 ){
        $htmlTable = "<table>";
        $htmlTable .= createTableHead($headers, $action);
        $htmlTable .= createTableRows($array, $links, $headers, $action);
        $htmlTable .= "</table>";
        return $htmlTable;
    }else{
        echo "<p>There are no dogs. Do you want to <a href='add.php'>add a dog</a>?</p>";
    }
}

// Skapar Tabellhuvudet med respektive headers, också om det ska finnas en action eller ej.
function createTableHead($headers, $action){
    $tableHead = "<thead><tr>";
    foreach( $headers as $title ){
            $tableHead .= "<th>" . $title . "</th>";
    }
    if ( $action ) $tableHead .= "<th>" . "action" . "</th>";
    $tableHead .= "</tr></thead>";
    return  $tableHead;
}

/*
Skapar tabellraderna
Länkarna skapas from rad 52 (utifrån länkparametrar).
*/
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
                    $itemsParam = paramToURL($items[$param]);
                    $row .= "<td><a href=$page.php?$param=$itemsParam>$item</a></td>";
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

/*

URL FUNCTIONS

*/

// Fixar så att url parametrarna inte har mellanslag.
function paramToURL($param){
    $param = str_replace(" ","+", $param);
    return $param;
}

// Fixar så att url paramtrarna får tillbaka sina mellanslag.
function URLToParam($param){
    $param = str_replace("+"," ", $param);
    return $param;
}

// Kollar om användaren är på respektive sida.
function isPage($page){
    return $_SERVER['REQUEST_URI'] == "/$page.php";
}


/* 


DATABSE FUNCTIONS 


*/

// Hämtar en json fil.
function getFile($file){
    $data = json_decode(file_get_contents($file), true);
    return $data;
}

/*
Kollar i en specific del av db.json om en key finns och om man vill ha returnerat något specifikt.
$searchArg == vad du vill leta efter
$dbarg == vilken databas man vill kolla i
$searchKey == vilken nyckel man vill söka i
$returnValue == vad man vill få tillbaka (om allt, så bara false);
*/
function findInDB($searchArg, $dbarg, $searchKey, $returnValue){
    unset($_SESSION['status']);
    $file = getFile("db.json");
    $db = $file[$dbarg];
    $index = columnSearch($searchArg, $db, $searchKey, $dbarg);
    if( is_integer($index)  ){
        if( $returnValue == false ){;
            return $db[$index];
        }else{
            return $db[$index][$returnValue];
        }
    }else{
        setSessionStatus("404 - Dog ran away");
    }
}

// Same som där uppe typ, fast tar bort en specifik del i arrayen.
function deleteInDB( $searchArg, $dbarg, $searchKey, $returnValue ){
    $file = getFile("db.json");
    $db = $file[$dbarg];
    $index = columnSearch($searchArg, $db, $searchKey, $dbarg);
    unset($file[$dbarg][$index]);
    file_put_contents( "db.json", json_encode($file) );
}

// Gör en 2-dimensional array 1D utifrån keyn som man vill söka efter.
function columnSearch($searchArg, $db, $searchKey, $dbarg,){
    $column = array_column($db, $searchKey);
    $found = array_search($searchArg, $column);
    return $found;
}

// Hittar den största valuen av en specifika keyn
function getMax($db,$key){
    return max(array_column($db, $key));
}

// Lägger till en grej i databasen.
function addToDB($data, $dbarg ){
    $db = getFile("db.json");
    $data['id'] = getMax($db[$dbarg], "id")+1;
    array_push($db[$dbarg], $data);
    file_put_contents("db.json", json_encode($db,JSON_PRETTY_PRINT));
}

// Filtrerar data utifrån en valfri array, vilken key och vad som ska kollas.
function filterData($array, $filterKey, $filterBy){
    $filteredArray = array_filter($array, function($item) use($filterKey, $filterBy){
        return $item[$filterKey] == $filterBy;
    });
    return $filteredArray;
}

?>