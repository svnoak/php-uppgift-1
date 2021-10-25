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
<section class="<?php setBgImage(); ?>">
        <form action="/sign-in.php" method="POST" class="bg">
        <h1>Sign in</h1>
        <div>
            <input type="text" name="email" id="email" class="inputText" required/>
            <label for="email" class="floating-label">Email</label>
        </div>
        <div>
            <input type="password" name="password" id="password" class="inputText" required/>
            <label for="password" class="floating-label">Password</label>
        </div>
            <?php 
            echoSessionStatus();
            session_unset();
            ?>
            <button name="signin">Sign in</button>
        </form>
</section>
<?php
include_once "includes/footer.php";
?>