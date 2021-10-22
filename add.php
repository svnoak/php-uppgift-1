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
<section class="bg-image lab-bg flex-left">
    <form action="add.php" method="post" id="add-form" class="bg bg-light">
        <?php echoSessionStatus() ?>
        <h1>Add Dog</h1>
        <div>
            <input type="text" name="name" id="name" class="inputText" required/>
            <span class="floating-label">Name</span>
        </div>
        <div>
            <input type="text" name="breed" id="breed" class="inputText" required/>
            <label for="breed" class="floating-label">Breed</label>
        </div>
        <div>
            <input type="number" name="age" id="age" class="inputText" required/>
            <span class="floating-label">Age</span>
        </div>
        <div>
            <textarea type="text" id="notes" class="inputText" required/></textarea>
            <label fore="notes" class="floating-label">Notes</span>
        </div>
        <button name="add-dog">Add</button>
    </form>
</section>
<?php
include_once "includes/footer.php";
?>