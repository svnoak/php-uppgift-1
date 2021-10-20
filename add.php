<?php
require_once "includes/header.php";
unset($_SESSION['status']);

if( isset($_POST['add-dog']) ){
    if( strlen($_POST['name'] > 0) && strlen($_POST['breed'] > 0 ) && strlen($_POST['age'] > 0) ){
        $data = [
            'name'=>$_POST['name'],
            'breed'=>$_POST['breed'],
            'age'=>$_POST['age'],
            'notes'=>$_POST['notes'],
            'owner'=>$_SESSION['userID']
        ];
        addToDB($data, "dogs");
        setSessionStatus("Successfully added dog $data[name].");
    }else{
        setSessionStatus("You need to write something in all fields :)");
    }
}

?>
<section>
    <?php echoSessionStatus() ?>
    <h1>Add Dog</h1>
    <form action="add.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="breed" placeholder="Breed" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="textare" name="notes" placeholder="Notes">
        <button name="add-dog">Add</button>
    </form>
</section>
<?php
include_once "includes/footer.php";
?>