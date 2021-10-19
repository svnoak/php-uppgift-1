<?php
include_once "includes/header.php";

$dogs = getDB("dogs");
$links = ['name'=>'id', 'breed'=>'breed'];
$headers = ['name', 'breed', 'age', 'notes', 'owner'];

?>
<section>
    <h1>Dogs</h1>   
    <?php echo createTable($dogs, $headers, $links, false) ?>
</section>
<?php
include_once "includes/footer.php";
?>