<?php
include_once "includes/header.php";

$dogs = getDB("dogs");

?>
<section>
    <h1>Dogs</h1>   
    <?php echo createTable($dogs) ?>
</section>
<?php
include_once "includes/footer.php";
?>