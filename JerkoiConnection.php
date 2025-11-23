<?php
$JerkoiConn = mysqli_connect("localhost", "root", "", "jerkoidb");

if (!$JerkoiConn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
