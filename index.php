<?php
include_once "includes/header.php";

$guide = chooseGuide();

$welcomeMessage = "
<div class='scroll-home'>
<img src='/assets/images/scrolls_top.png'>
        <div class='content'>
            <div class='paragraphs'>
                <p>Welcome to IDDb!</p>
                <p>This is the</p>
                <p>International Dog database</p>
            </div>
            <div class='continue'>
                <a href='?dialog=1'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/scrolls_bottom.png'>
</div>
";

$dialog_1 = "
<div class='speechbubble-home' id='bob'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p>Hej, my name is $guide.</p>
                <p>I'm your guide today.</p>
                <p>...</p>
                <p>There's a lot we can do!</p>
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
                <p>Sounds like fun!</p>
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
                <p>Well, there are two options.</p>
                <p>We can go inside</p>
                <p>or visit the dogpark.</p>
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
                <a class='dialog-option' href='/sign-in.php'>Go inside.</a>
                <a class='dialog-option' href='/list.php'>Go to the dogpark.</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom.png' alt=''>
    </div>
";

$dialog = [$welcomeMessage, $dialog_1, $dialog_2, $dialog_3, $dialog_4];

?>
<section class="<?php setBgImage(); ?>">
    <?php dialogOptions($dialog); ?>
</section>
<?php
include_once "includes/footer.php";
?>