<?php
require_once "includes/header.php";

if( !sessionError() ){
    session_unset();
}

if( isset($_POST['add-dog']) ){
    if( strlen($_POST['name']) && strlen($_POST['breed']) && strlen($_POST['age']) ){
        $data = [
            'name'=>$_POST['name'],
            'breed'=>$_POST['breed'],
            'age'=>$_POST['age'],
            'notes'=>$_POST['notes'],
            'owner'=>$_SESSION['userID']
        ];
        addToDB($data, "dogs");
    }
}

?>
<section>
    <h1>Add Dog</h1>
    <form action="add.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="breed" placeholder="Breed">
        <input type="number" name="age" placeholder="Age">
        <input type="textare" name="notes" placeholder="Notes">
        <button name="add-dog">Add</button>
    </form>
</section>
<?php
include_once "includes/footer.php";
?>