<?php
    include "JerkoiConnection.php";
    session_start();

    $Jerkoiprodid = $_GET['Jerkoiprodid'];

    $sql = "DELETE FROM jerkoiproducts WHERE Jerkoiprodid = '$Jerkoiprodid'";

    if(mysqli_query($JerkoiConn, $sql)){
        header("location: JerkoiAdminProduct.php");
    }
?>
