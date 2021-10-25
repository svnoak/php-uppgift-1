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

$dialog_0 = "
<div class='speechbubble-home'>
<img src='/assets/images/speech_top.png'>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>Where did I put my keys?</p>
                <p class='dialog'>...</p>
                <p class='dialog'>...</p>
                <p class='dialog'>There they are!</p>
            </div>
            <div class='continue'>
                <a href='?dialog=1'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom.png'>
</div>
";

$dialog_1 ="
<div class='scroll-signin'>
    <img src='/assets/images/scrolls_top.png'>
        <form action='/sign-in.php' method='POST' class='content'>
        <h1>Sign in</h1>
        <div class='input'>
            <label for='email'>Email</label>
            <input type='text' name='email' id='email'required/>
        </div>
        <div class='input'>
            <label for='password'>Password</label>
            <input type='password' name='password' id='password'required/>
        </div>
            <?php
            echoSessionStatus();
            session_unset();
            ?>
            <button name='signin'>Sign in</button>
        </form>
        <img src='/assets/images/scrolls_bottom.png'>
    </div>
";

$dialog = [$dialog_0, $dialog_1];


?>
<section class="<?php setBgImage(); ?>">
<?php dialogOptions($dialog); ?>    
</section>
<?php
include_once "includes/footer.php";
?>