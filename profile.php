<?php
include_once "includes/header.php";

$dogs = getFile("db.json")["dogs"];
$links = ['name'=>'id'];
$headers = ['name', 'breed', 'age', 'notes'];

$userDogs = array_filter($dogs, function($dog){
    $userID = $_SESSION['userID'];
    return $dog['owner'] == $userID;
});

?>
<section>
    <h1>Dogs</h1>
    <?php echo createTable($userDogs, $headers, $links, true) ?>
</section>
<?php
include_once "includes/footer.php";
?>