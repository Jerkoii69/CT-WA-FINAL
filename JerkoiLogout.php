<?php
    session_start();
    $_session = [];
    session_unset();
    session_destroy();
    header("location: JerkoiMainPage.php");
?>
