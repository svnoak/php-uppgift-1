<?php

// Alla delar som skall in i Table.
$allDogs = getFile($_SERVER["DOCUMENT_ROOT"]."/db.json")["dogs"];
$links = [
    'name'=>[
        'dialog'=>'0&change=backyardTodogdetails&scene=backyarddetails', 
        'param'=>'id'
    ]
    ];

if( isset($_SESSION['userID']) ){
    $dogs = getFile("db.json")["dogs"];
    $userID = $_SESSION['userID'];
    $username = $_SESSION['username'];
    $userDogs = filterData($dogs, "owner", $userID);
}

$headers = ['name', 'breed', 'age', 'notes'];
$userDogs = filterData($dogs, "owner", $userID);

if( isset($_SESSION['dogPickedUp'], $_SESSION['lastDog']) ){
    $pickedUpDog = $_SESSION['dogPickedUp'];
    $lastDog = $_SESSION['lastDog'];
}else{
    $lastDog = "";
    $pickedUpDog = "";
}

// Kollar om det finns en breed eller inte.
if( isset($_GET['breed']) ){
    if($_GET['breed']){
        $breed = URLToParam($_GET['breed']);
        $allDogs = filterData($userDogs, "breed", $breed );
        $info = "<span>Filtered by $breed || <a href='?scene=dogpark&dialog=2'>Show all dogs</a></span>";
    }
}

if( $userDogs > 0 ){
$welcomeMessage = "
    <div class='bubble speechbubble-backyard' id='bob'>
        <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>I dig it.</p>
                <p class='dialog'>A lot of space for your dogs!</p>
                <p class='dialog'>Tell me more about them!</p>
            </div>
            <div class='continue'>
                <a href='?dialog=1&scene=backyard'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
    </div>
";
}else{
$welcomeMessage = "
    <div class='bubble speechbubble-backyard' id='bob'>
        <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>So much space!</p>
                <p class='dialog'>And a doghouse?</p>
                <p class='dialog'>Shouldn't you get a dog</p>
                <p class='dialog'>if you already have a doghouse?</p>
            </div>
            <div class='continue'>
                <a href='?dialog=2&scene=backyard'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
    </div>
";
}

$ownedDogs = "
<div class='scroll scroll-table'>
    <img src='/assets/images/scrolls_top.png' class='tb-img'>
    <div class='content'>
        <h1>All your dogs</h1>";
$ownedDogs .= echoBreed();
$ownedDogs .= createTable($userDogs, $headers, $links, true);
$ownedDogs .=  "
        <div class='continue'>
            <a href='?dialog=6&scene=backyard'>Back</a>
        </div>
    </div>
    <img src='/assets/images/scrolls_bottom.png' class='tb-img'>
</div>
";

$success_added = "
<div class='bubble speechbubble-backyard' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>You're already back!</p>
                <p class='dialog'>Is this $lastDog?</p>
                <p class='dialog'>SUUUUPER CUTE!</p>
                <p class='dialog'>What other dogs do you have?</p>
            </div>
            <div class='continue'>
                <a href='?dialog=1&scene=backyard'>Continue</a>
            </div>
        </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$addDog = "
<div class='scroll scroll-add'>
    <img src='/assets/images/scrolls_top.png' class='tb-img'>
    <form action='/add.php?scene=backyard' method='post' id='add-form' class='content'>
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
            <a href='?dialog=0&scene=backyard'>Go back</a>
            <button name='add-dog'>Pick up dog</button>
        </div>
    </form>
    <img src='/assets/images/scrolls_bottom.png' class='tb-img'>
</div>
";

$dialog_4 =
"<div class='bubble speechbubble-backyard' id='user'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
            <p class='dialog'>I guess you're right</p>
            <p class='dialog'>I should get a dog!</p>
        </div>
        <div class='continue'>
            <a href='?dialog=2&scene=backyard'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom.png' class='tb-img'>
</div>
";

$dialog_5 = "
<div class='bubble speechbubble-backyard' id='user'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p>I'm gonna</p>
                <a class='dialog-option' href='?change=backyardToHouse&scene=home'>Go back inside.</a>
                <a class='dialog-option' href='?change=backyardToIndex&scene=index&dialog=6'>Head back to town.</a>
                <a class='dialog-option' href='/sign-out.php'>I'm gonna head out (sign out).</a>
            </div>
        </div>
    <img src='/assets/images/speech_bottom.png' class='tb-img'>
</div>
";

$dialog_6 = "
<div class='bubble speechbubble-backyard' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
            <p class='dialog'>So...</p>
            <p class='dialog'>What do you wanna do next?</p>
        </div>
        <div class='continue'>
            <a href='?dialog=5&scene=backyard'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$backyard = [$welcomeMessage, $ownedDogs, $addDog, $dialog_4 ,$success_added, $dialog_5, $dialog_6 ];
?>