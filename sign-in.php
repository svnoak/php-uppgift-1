<?php
include_once "includes/header.php";

unset($_SESSION['status']);

if( isset($_POST['signin']) ){
    if( strlen($_POST['email']) && strlen($_POST['password']) ){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $users = getDB("users");

        foreach( $users as $user ){
            if( $user['email'] == $email ){
                if( $user['password'] == $password){
                    $_SESSION['isLoggedIn'] = true;
                    header("location: /profile.php");
                    exit();
                }else{
                    $_SESSION['status'] = "Fel användarnamn eller lösenord";
                }
            } $_SESSION['status'] = "Fel användarnamn eller lösenord";
        }
    }else{
        $_SESSION['status'] = "You need to enter both an email and a password";
    }
}


?>
<section>
    <h1>Sign in to your account</h1>
    <?php if(isset($_SESSION['status'])){ 
        echo "<p>" . $_SESSION['status'] . "</p>";
     }
    ?>
    <form action="/sign-in.php" method="POST">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <button name="signin">Sign in</button>
    </form>
</section>
<?php
include_once "includes/footer.php";
?>