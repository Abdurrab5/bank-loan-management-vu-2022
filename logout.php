<?php
//including head portion
    require_once 'header.php';
?>

<?php
//loging out
    session_destroy();
    alert("You have been logged-out successfuly.");
    redirect_to("index.php");
?>

