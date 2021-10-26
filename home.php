<?php
require_once "includes/header.php";

$neighbour = chooseNeighbour();

if(isset($_GET['change'])){
    $change = $_GET['change'];
}else{
    $change = false;
}

if(isset($_GET['scene'])){
    $scene = $_GET['scene'];
} else{
    $scene = "home";
}

unset($_SESSION['status']);

if( isset($_POST['add-dog']) ){
    if( strlen($_POST['name'] > 0) && strlen($_POST['breed'] > 0 ) && strlen($_POST['age'] > 0) ){
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
        header("location: ?dialog=4" );
        setSessionStatus("Successfully added dog $data[name].");
    }else{
        setSessionStatus("You need to write something in all fields :)");
    }
}

?>
<section class="<?php setBgImage($change, $scene) ?>">
    <?php dialogOptions($scene, $dialogs); ?>
</section>
<?php
include_once "includes/footer.php";
?>