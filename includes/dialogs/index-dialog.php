<?php

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
                <a class='dialog-option' href='?dialog=7>Go to my place.</a>
                <a class='dialog-option' href='?dialog=5'>Visit the dogpark.</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom.png' alt=''>
    </div>
";

$dialog_3 = "";
$dialog_4 = "<div class='speechbubble-home' id='user'>
<img src='/assets/images/speech_top.png' alt=''>
<div class='content'>
    <div class='paragraphs'>
        <p>Sure, let's</p>
        <a class='dialog-option' href='?dialog=7&started=true'>Go to my place.</a>
        <a class='dialog-option' href='?dialog=5&started=true'>Visit the dogpark.</a>
    </div>
</div>
<img src='/assets/images/speech_bottom.png' alt=''>
</div>";

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
                <p class='dialog'>Mmhhh...</p>
                <p class='dialog'>What about we go to your place...</p>
                <p class='dialog'>or visit the dogpark maybe?</p>
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
                <p>Sure, let's</p>
                <a class='dialog-option' href='?dialog=7&started=true'>Go to my place.</a>
                <a class='dialog-option' href='?dialog=5&started=true'>Visit the dogpark.</a>
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
                <a href='?change=indexToDogpark&scene=dogpark'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_left.png' alt=''>
    </div>
";

$signin_1 = "
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
                <a href='?dialog=8'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom.png'>
</div>
";

$signin_2 ="
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

$dialog_6 = "
    <div class='speechbubble-home' id='bob'>
        <img src='/assets/images/speech_top.png' alt=''>
        <div class='content'>
            <div class='paragraphs'>
                <p class='dialog'>The streets are empty today, huh?</p>
                <p class='dialog'>What about we go to your place...</p>
                <p class='dialog'>or go back to the dogpark?</p>
            </div>
            <div class='continue'>
                <a href='?dialog=4'>Continue</a>
            </div>
        </div>
        <img src='/assets/images/speech_bottom_left.png' alt=''>
    </div>
";

$index = [$welcomeMessage, $dialog_1, $dialog_2, $dialog_3, $dialog_4, $dialog_5, $dialog_6, $signin_1, $signin_2];

?>