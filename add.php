<?php
require_once "includes/header.php";


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