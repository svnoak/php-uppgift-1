<?php
include_once "includes/header.php";

$dogs = getDB("dogs");
$links = ['name'=>'id'];
$headers = ['name', 'breed', 'age', 'notes'];

?>
<section>
    <h1>Dogs</h1>
    <?php echo createTable($dogs, $headers, $links, true) ?>
</section>
<?php
include_once "includes/footer.php";
?>