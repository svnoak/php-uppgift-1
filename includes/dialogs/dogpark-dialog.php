<?php

// Alla delar som skall in i Table.
$allDogs = getFile($_SERVER["DOCUMENT_ROOT"]."/db.json")["dogs"];
$links = [
    'name'=>[
        'dialog'=>'0&change=dogparkToDogparkdetails&scene=dogparkdetails', 
        'param'=>'id'
    ],
    'breed'=>[
        'dialog'=>'2&scene=dogpark', 
        'param'=>'breed'
        ]
    ];
$headers = ['name', 'breed', 'age', 'notes', 'owner'];

// Kollar om det finns en breed eller inte.
if( isset($_GET['breed']) ){
    if($_GET['breed']){
        $breed = URLToParam($_GET['breed']);
        $allDogs = filterData($allDogs, "breed", $breed );
        $info = "<span>Filtered by $breed || <a href='?scene=dogpark&dialog=2'>Show all dogs</a></span>";   
    }
}

if( isLoggedIn()){
    $myPlace = "?change=dogparkToHouse&scene=house";
    $signout = "<a class='dialog-option' href='/sign-out.php?change=dogparkToIndex'>I'm gonna go (sign out).</a>";
    $signinText = "";
}else{
    $myPlace = "?change=dogparkToIndex&scene=index&dialog=7";
    $signout = "";
    $signinText = " (sign in)";
}

function echoBreed(){
    global $info;
    if(isset($info)) return $info;
}

$welcomeMessage = "
<div class='bubble speechbubble-park' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
            <p class='dialog'>Wow!</p>
            <p class='dialog'>Look at all the cute dogs!</p>
            <p class='dialog'>I hope it's ok to pet them.</p>
        </div>
        <div class='continue'>
            <a href='?dialog=1&scene=dogpark'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$dialog_1 = "
<div class='bubble speechbubble-park' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
            <p class='dialog'>Let's talk to the owners.</p>
            <p class='dialog'>I'm sure they're happy</p>
            <p class='dialog'>to talk about they're dogs.</p>
        </div>
        <div class='continue'>
            <a href='?dialog=2&scene=dogpark'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$dogOwners = "
<div class='scroll scroll-table'>
    <img src='/assets/images/scrolls_top.png' class='tb-img'>
    <div class='content'>
        <h1>Dogs at the dogpark</h1>";
$dogOwners .= echoBreed();
$dogOwners .= createTable($allDogs, $headers, $links, false);
$dogOwners .=  "
        <div class='continue'>
            <a href='?dialog=3&scene=dogpark'>Back</a>
        </div>
    </div>
    <img src='/assets/images/scrolls_bottom.png' class='tb-img'>
</div>
";

$dialog_2 = 
"<div class='bubble speechbubble-park' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
            <p class='dialog'>So?.</p>
            <p class='dialog'>What now?</p>
        </div>
        <div class='continue'>
            <a href='?dialog=4&scene=dogpark'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$dialog_3 = "
<div class='bubble speechbubble-park' id='user'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
        <div class='content'>
            <div class='paragraphs'>
                <p>I'm gonna</p>
                <a class='dialog-option' href='$myPlace'>Go to my place$signinText.</a>
                <a class='dialog-option' href='?change=dogparkToIndex&scene=index&dialog=6'>Head back to town.</a>
                $signout
            </div>
        </div>
    <img src='/assets/images/speech_bottom.png' class='tb-img'>
</div>
";

$dogpark = [$welcomeMessage, $dialog_1, $dogOwners, $dialog_2, $dialog_3 ];

?>