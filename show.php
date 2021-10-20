<?php
include_once "includes/header.php";

if( isset($_GET['id']) ){
    if($_GET['id']){
        $id = $_GET['id'];
        $dog = findInDB($id, "dogs", "id", false);
        if( $dog ){
            $owner = findInDB($dog['owner'], "users", "id", "username");
            $dogInfo = "";
            $dogInfo .= "<h1>$dog[name]</h1>";
            $dogInfo .= "<p>A $dog[breed] that's $dog[age] years old, owned by <strong>$owner</strong>. <i>$dog[notes]</i></p>";
        }
    }
} 
?>

<section>
    <?php
        echoSessionStatus();
        if( isset($dogInfo) ) echo $dogInfo;
    ?>    
</section>
<?php
include_once "includes/footer.php";
?>