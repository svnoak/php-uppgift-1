<?php
require_once "includes/header.php";

if(isset($_GET['change'])){
    $change = $_GET['change'];
}else{
    $change = false;
    
}

if(isset($_GET['scene'])){
    $scene = $_GET['scene'];
} else{
    $scene = "index";
}

?>
<section class="<?php setBgImage($change, $scene) ?>">
    <?php dialogOptions($scene, $dialogs); ?>
</section>
<?php
include_once "includes/footer.php";
?>