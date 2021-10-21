<?php
include_once "includes/header.php";
?>
<section class="header flex-left">

    <?php if( isLoggedIn() ) { ?>
        <div class="background">
            <h1>Welcome <?php echo $_SESSION['username'] ?></h1>
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