<?php

$id = "";
$dogInfo_1 = "";
$dogInfo_2 = "";
$dogInfo_3 = "";


if( isset($_GET['id']) ){
    if($_GET['id']){
        $id = $_GET['id'];
        $dog = findInDB($id, "dogs", "id", false);
        if( $dog ){
            $owner = findInDB($dog['owner'], "users", "id", "username");
            $dogInfo_1 = "<p class='dialog'>This is $dog[name]</p>";
            $dogInfo_1 .= "<p class='dialog'>$dog[name] is a $dog[breed].</p>";
            $dogInfo_1 .= "<p class='dialog'>$dog[name]'s $dog[age] years old.</p>";
            $dogInfo_2 = "<p class='dialog'>I always say:</p>";
            $dogInfo_2 .= "<p class='dialog'><i>$dog[notes]</i></p>";
            $dogInfo_3 = "<p class='dialog'>Such a cute dog!</p>";
        }
    }
}

$dogDetails_1 = "
<div class='bubble speechbubble-details-yard' id='user'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
        $dogInfo_1
        </div>
        <div class='continue'>
            <a href='?dialog=1&scene=backyarddetails&id=$id'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom.png' class='tb-img'>
</div>
";

$dogDetails_2 = "
<div class='bubble speechbubble-details-yard' id='user'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
        $dogInfo_2
        </div>
        <div class='continue'>
            <a href='?dialog=2&scene=backyarddetails&id=$id'>Continue</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom.png' class='tb-img'>
</div>
";

$dogDetails_3 = "
<div class='bubble speechbubble-details-yard' id='bob'>
    <img src='/assets/images/speech_top.png' class='tb-img'>
    <div class='content'>
        <div class='paragraphs'>
        $dogInfo_3
        </div>
        <div class='continue'>
            <a href='?dialog=1&change=backyarddetailsToBackyard&scene=backyard&id=$id'>Totally agree!</a>
        </div>
    </div>
    <img src='/assets/images/speech_bottom_left.png' class='tb-img'>
</div>
";

$backyarddetails = [ $dogDetails_1, $dogDetails_2, $dogDetails_3 ];