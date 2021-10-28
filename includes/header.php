<?php
require_once "authentication.php";
require_once "dialogs/dialogs.php";
require_once "functions.php";

function isActive($page){
    if(isPage($page)) echo "active";
}

if( isset($_SERVER['QUERY_STRING']) ){
  $query = $_SERVER['QUERY_STRING'];
  if (strlen($query) > 0){
    $activateMenu = "$query&menu=true";
  }else{
    $activateMenu = "$query?menu=true";
  }
}else{
  $activateMenu = "?menu=true";
}

if( isLoggedIn() ){
  $menu = "
  <div class='menu-bg' id='nav'>
    <ul class='nav'>
      <li>
        <a href='/home.php?dialog=1'>Home</a>
      </li>
      <li>
        <a href='/home.php?scene=dogpark&dialog=2'>Dogs</a>
      </li>
      <li>
        <a href='/home.php?scene=backyard&dialog=1'>Profile</a>
      </li>
      <li>
        <a href='/home.php?scene=backyard&dialog=2'>Add dogs</a>
      </li>
      <li>
        <a href='/sign-out.php'>Sign out</a>
      </li>
  </ul>
</div>
";
}else{
  $menu = "
  <div class='menu-bg' id='nav'>
    <ul class='nav'>
      <li>
        <a href='/index.php?dialog=1'>Home</a>
      </li>
      <li>
        <a href='/index.php?scene=dogpark&dialog=2'>Dogs</a>
      </li>
      <li>
      <a href='/index.php?dialog=8'>Sign in</a>
    </li>
  </ul>
</div>
  ";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>IDDb</title>
    <script>
    /*to prevent Firefox FOUC, this must be here*/
    let FF_FOUC_FIX;
  </script>
</head>
<body>

<!-- If you wanna know, the guide is called Max -->
  <a id="guide-box" href="?<?php echo $activateMenu ?>">
    <div class="quest"></div>
    <img src="/assets/images/guide.png" id="guide">
  </a>

<?php if( isset($_GET['menu']) ){
  if( $_GET['menu'] ){
    echo $menu;
  }
}
?>

<!--
PLEASE PLAY WITH THE CONSOLE CLOSED!
Some elements might fall outside of you viewwindow otherwise.

If you want, you can always play with the Responsive Design Mode in action.
CTRL + Shift + M on windows (everyone else got to figure it out themselves.)
-->