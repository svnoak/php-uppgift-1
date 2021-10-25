<?php
include_once "includes/header.php";

$neighbour = chooseNeighbour();

$scenario = ["home", "park", "house", "add", "backyard"];

$welcomeMessage = "
<div class='scroll-home'>
<img src='/assets/images/scrolls_top.png'>
        <div class='content'>
            <div class='paragraphs'>
                <p>International Dog database</p>
                <p>The Game</p>
            </div>
            <div class='continue'>
                <a href='?dialog=1'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/scrolls_bottom.png'>
</div>
";


if( isset($_SESSION['dialogStarted']) ){
    $dialog_1 = "
    <div class='speechbubble-home' id='bob'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>Hej again!</p>
                <p class='dialog'>...</p>
                <p class='dialog'>What are you up to?</p>
            </div>
            <div class='continue'>
                <a href='?dialog=2'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_left.png' alt=''>
    </div>
    ";

    $dialog_2 = "
    <div class='speechbubble-home' id='user'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p>Oh, I'm on my way to</p>
                <a class='dialog-option' href='/sign-in.php'>Go inside.</a>
                <a class='dialog-option' href='?dialog=5'>Go to the dogpark.</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom.png' alt=''>
    </div>
";

}else{


$dialog_1 = "
<div class='speechbubble-home' id='bob'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>Hej there! My name is $neighbour.</p>
                <p class='dialog'>Always happy to see a new face.</p>
                <p class='dialog'>...</p>
                <p class='dialog'>Do you want to hang out?!</p>
            </div>
            <div class='continue'>
                <a href='?dialog=2'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_left.png' alt=''>
    </div>
";

$dialog_2 = "
<div class='speechbubble-home' id='user'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p>Sure, sounds like fun!</p>
                <a class='dialog-option active' href='?dialog=3'>What do you suggest?</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom.png' alt=''>
    </div>
";

$dialog_3 = "
<div class='speechbubble-home' id='bob'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>Well, what about going to your place...</p>
                <p class='dialog'>or visit the dogpark?</p>
            </div>
            <div class='continue'>
                <a href='?dialog=4'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_left.png' alt=''>
    </div>
";

$dialog_4 = "
<div class='speechbubble-home' id='user'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p>I'd like to</p>
                <a class='dialog-option' href='/sign-in.php?&started=true'>Go inside.</a>
                <a class='dialog-option' href='?dialog=5&started=true'>Go to the dogpark.</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom.png' alt=''>
    </div>
";
}

$dialog_5 = "
<div class='speechbubble-home' id='bob'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>Alright, let's go!</p>
            </div>
            <div class='continue'>
                <a href='?dialog=change'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_left.png' alt=''>
    </div>
";

$dialog_6 = function(){
    if( isset($_GET['dialog']) ){
        if( $_GET['dialog'] == "change" ){
        echo " dissapear";
        header( "refresh:2;/list.php" );
        }else{
            echo "";
        }
    }
};

$dialog = [$welcomeMessage, $dialog_1, $dialog_2, $dialog_3, $dialog_4, $dialog_5, $dialog_6];

?>
<section class="<?php setBgImage($scenario); $dialog_6(); ?>">
    <?php dialogOptions($dialog); ?>
</section>
<?php
include_once "includes/footer.php";
?>