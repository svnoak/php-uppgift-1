<?php

$id = "";
$dogInfo_1 = "";
$dogInfo_2 = "";
$dogInfo_3 = "";

// This is kaos. Fanns inget bättre sätt att få ihop flera bubbler på ett 'snyggt' sätt.
if( isset($_GET['id']) ){
    if($_GET['id']){
        $id = $_GET['id'];
        $dog = findInDB($id, "dogs", "id", false);
        if( $dog ){
            $owner = findInDB($dog['owner'], "users", "id", "username");
            $dogInfo_1 = "<p class='dialog'>This is $dog[name]</p>";
            $dogInfo_1 .= "<p class='dialog'>$dog[name] is a $dog[breed].</p>";
            $dogInfo_1 .= "<p class='dialog'>$dog[name]'s $dog[age] years old.</p>";
            $dogInfo_2 = "<p class='dialog'>I think the owner is <strong>$owner</strong>.</p>";
            $dogInfo_2 .= "<p class='dialog'> $owner always says:</p>";
            $dogInfo_2 .= "<p class='dialog'><i>$dog[notes]</i></p>";
            $dogInfo_3 = "<p class='dialog'> Funny, right!? </p>";
        }
    }
}

$dogDetails_1 = "
<div class='bubble speechbubble-details-park' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
        $dogInfo_1
        </div>
        <div class='continue'>
            <a href='?dialog=1&scene=dogparkdetails&id=$id'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$dogDetails_2 = "
<div class='bubble speechbubble-details-park' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
        $dogInfo_2
        </div>
        <div class='continue'>
            <a href='?dialog=2&scene=dogparkdetails&id=$id'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$dogDetails_3 = "
<div class='bubble speechbubble-details-park' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
        $dogInfo_3
        </div>
        <div class='continue'>
            <a href='?dialog=2&change=dogparkdetailsToDogpark&scene=dogpark&id=$id'>Sure</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom_right.png' class='tb-img'>
</div>
";

$dogparkdetails = [ $dogDetails_1, $dogDetails_2, $dogDetails_3 ];