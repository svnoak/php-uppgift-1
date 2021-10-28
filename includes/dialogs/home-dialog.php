<?php

/*
IF NO DOGS => ADD DOG DIALOG;
IF DOGS => ADD DOG DIALOG WITH BACKYARD DIALOG;
*/

if( isset($_SESSION['userID']) ){
    $dogs = getFile("db.json")["dogs"];
    $userID = $_SESSION['userID'];
    $username = $_SESSION['username'];
    $userDogs = filterData($dogs, "owner", $userID);
}else{
    $userDogs = [];
}

if( isset($_SESSION['dogPickedUp'], $_SESSION['lastDog']) ){
    $pickedUpDog = $_SESSION['dogPickedUp'];
    $lastDog = $_SESSION['lastDog'];
}else{
    $lastDog = "";
    $pickedUpDog = "";
}

if( count($userDogs) > 0 ){
    $welcomeMessage = "
    <div class='bubble speechbubble-house' id='bob'>
        <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>This is a really cozy home.</p>
                <p class='dialog'>Your name was $username, right?
                <p class='dialog'>The sun is shining!</p>
                <p class='dialog'>Shouldn't we go to your backyard?</p>
            </div>
            <div class='continue'>
                <a href='?dialog=1'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
    </div>
";

if( isset( $_SESSION['dogPickedUp'] ) ){
    $linkText = "?dialog=3";
}else{
    $linkText = "?dialog=2";
}
$dialog_1 = "
<div class='bubble speechbubble-house' id='user'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
            <a class='dialog-option' href='?dialog=0&change=houseToBackyard&scene=backyard'>Absolutely, to the backyard!</a>
            <a class='dialog-option' href='$linkText'>No, gotta pick up another dog of mine first.</a>
            <a class='dialog-option' href='?change=houseToDogpark&scene=dogpark'>I'm on my way to the dogpark.</a>
            <a class='dialog-option' href='/sign-out.php?change=houseToIndex'>I'm gonna get out of here (sign out).</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom.png' class='tb-img'>
</div>
";

}else{
    $welcomeMessage = "
    <div class='bubble speechbubble-house' id='bob'>
        <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>This is a really cozy home.</p>";
    $welcomeMessage .= echoSessionStatus();
    $welcomeMessage .= "<p class='dialog'>A dog would fit you perfectly though.</p>
                <p class='dialog'>Don't you agree?</p>
            </div>
            <div class='continue'>
                <a href='?dialog=1'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
    </div>
";

$dialog_1 = "
<div class='bubble speechbubble-house' id='user'>
<img src='/assets/images/speech_top.png' class='tb-img'>
<div class='content'>
    <div class='paragraphs'>
    <a class='dialog-option' href='?dialog=2'>I guess you're right!</a>
    <a class='dialog-option' href='?dialog=0&change=houseToBackyard&scene=backyard'>Not really, let's chill in the backyard instead.</a>
    <a class='dialog-option' href='/sign-out.php?change=houseToIndex'>I'm gonna get out of here (sign out).</a>
    </div>
    <div class='continue'>
        <a href='?dialog=2'>Continue</a>
    </div>
</div>
<img src='/assets/images/speech_bottom.png' class='tb-img'>
</div>
";
}

$dialog_2 = "
<div class='scroll scroll-add'>
    <img src='/assets/images/scrolls_top.png' class='tb-img'>
    <form action='/add.php?scene=home' method='post' id='add-form' class='content'>
        <?php echoSessionStatus() ?>
        <h1>Add Dog</h1>
        <div class='input'>
            <label for='name'>Name</label>
            <input type='text' name='name' id='name' required/>
        </div>
        <div class='input'>
            <label for='breed'>Breed</label>
            <input type='text' name='breed' id='breed' required/>
        </div>
        <div class='input'>
            <label for='age'>Age</label>
            <input type='number' name='age' id='age' required/>
        </div>
        <div class='input'>
            <label for='notes'>Notes</label>
            <textarea type='text' name='notes' id='notes' required/></textarea>
        </div>
        <div class='buttons'>
            <a href='?dialog=0'>Go back</a>
            <button name='add-dog'>Pick up dog</button>
        </div>
    </form>
    <img src='/assets/images/scrolls_bottom.png' class='tb-img'>
</div>
";

$dialog_3 = "
<div class='bubble speechbubble-house' id='user'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>Another one?</p>
                <p class='dialog'>How many dogs do you have?</p>
                <p class='dialog'>I really hope it's </p>
                <p class='dialog'>another $pickedUpDog!</p>
            </div>
            <div class='continue'>
                <a href='?dialog=2'>Continue</a>
            </div>
        </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$success_added = "
<div class='bubble speechbubble-house' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>You're already back!</p>
                <p class='dialog'>Is this $lastDog?</p>
                <p class='dialog'>SUUUUPER CUTE!</p>
                <p class='dialog'>Can we go to the backyard now?</p>
            </div>
            <div class='continue'>
                <a href='?dialog=1'>Continue</a>
            </div>
        </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$home = [$welcomeMessage, $dialog_1, $dialog_2, $dialog_3, $success_added];
?>