<?php
include_once "includes/header.php";

$allDogs = getFile("db.json")["dogs"];
$links = ['name'=>['page'=>'/show', 'param'=>'id'], 'breed'=>['page'=>'/list', 'param'=>'breed']];
$headers = ['name', 'breed', 'age', 'notes', 'owner'];

?>
<section>
    <h1>Dogs</h1>   
    <?php echo createTable($allDogs, $headers, $links, false) ?>
</section>
<?php
include_once "includes/footer.php";
?>