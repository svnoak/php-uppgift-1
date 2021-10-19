<?php
include_once "includes/header.php";

if( !sessionError() ){
    session_unset();
}

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
                    setSessionStatus("Wrong email or password");
                }
            } setSessionStatus("Wrong email or password");
        }
    }else{
        setSessionStatus("You need to enter both email and password");
    }
}

?>
<section>
    <h1>Sign in to your account</h1>
    <?php echoSessionStatus() ?>
    <form action="/sign-in.php" method="POST">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <button name="signin">Sign in</button>
    </form>
</section>
<?php
include_once "includes/footer.php";
?>