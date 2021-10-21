<?php
include_once "includes/header.php";

if( isLoggedIn() ) header('Location: /list.php');

if( isset($_POST['signin']) ){
    if( strlen($_POST['email']) && strlen($_POST['password']) ){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $users = getFile("db.json")["users"];
        foreach( $users as $user ){
            if( $user['email'] == $email ){
                if( $user['password'] == $password){
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['userID'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    header("location: /list.php");
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
<section class="header flex-left">
    <div class="background">
        <?php echoSessionStatus() ?>
        <form action="/sign-in.php" method="POST">
        <h1>Sign in</h1>
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Password">
            <button name="signin">Sign in</button>
        </form>
    </div>
</section>
<?php
include_once "includes/footer.php";
?>