<?php
include_once "includes/header.php";
?>
<section class="header">


    <?php if( isLoggedIn() ) { ?>
        <div class="background">
            <h1>Welcome <?php $_SESSION['username'] ?>, to IDDb!</h1>
            <p><a href="/list.php">Check out all the cute dogs</a> or <a href="/add.php">add some more</a>!</p>
        </div>
        <?php }else { ?>
        <div class="background">
            <h1>Welcome to IDDb!</h1>
            <p>You can <a href="/sign-in.php">Sign in</a> or <a href="/list.php">List all of the dogs</a>.</p>
        </div>
        <?php } ?>
    
    


</section>
<?php
include_once "includes/footer.php";
?>