<?php
require_once "authentication.php";
require_once "dialogs/dialogs.php";
require_once "functions.php";

function isActive($page){
    if(isPage($page)) echo "active";
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
<!--
PLEASE PLAY WITH THE CONSOLE CLOSED!
Some elements might fall outside of you viewwindow otherwise.

If you want, you can always play with the Responsive Design Mode in action.
CTRL + Shift + M on windows (everyone else got to figure it out themselves.)
-->