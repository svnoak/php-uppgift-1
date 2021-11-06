<?php
require_once "includes/header.php";

$scene = $_GET['scene'];

if( isset($_POST['add-dog']) ){
    if( strlen($_POST['name'] >= 1) && strlen($_POST['breed'] >= 1 ) && strlen($_POST['age'] >= 1) ){
        $_SESSION['lastDog'] = $_POST['name'];
        $_SESSION['dogPickedUp'] = $_POST['breed'];
        $data = [
            'name'=>$_POST['name'],
            'breed'=>$_POST['breed'],
            'age'=>$_POST['age'],
            'notes'=>$_POST['notes'],
            'owner'=>$_SESSION['userID']
        ];
        addToDB($data, "dogs");
        header("location: /home.php?dialog=4&scene=$scene" );
        setSessionStatus("Successfully added dog $data[name].");
    }else{
        header("location: /home.php?dialog=8&scene=$scene");
    }
}
?>