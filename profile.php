<?php
include_once "includes/header.php";

/* Grejer som ska in i tabellen */
$dogs = getFile("db.json")["dogs"];
$links = [
    'name'=>
    [
        'page'=>'/show', 
        'param'=>'id'
    ]
    ];
$headers = ['name', 'breed', 'age', 'notes'];
$userID = $_SESSION['userID'];

$userDogs = filterData($dogs, "owner", $userID);

?>
<section>
    <h1>Dogs</h1>
    <?php echo createTable($userDogs, $headers, $links, true) ?>
</section>
<?php
include_once "includes/footer.php";
?>