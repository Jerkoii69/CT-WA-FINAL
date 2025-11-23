<?php
    session_start();

    include "JerkoiConnection.php";

    if(isset($_POST['JerkoiUpdateBtn'])){
        $JerkoiProdId = $_GET['JerkoiProdId'];
        $JerkoiProdName = $_POST['JerkoiProdName'];
        $JerkoiUnit = $_POST['JerkoiUnit'];
        $JerkoiPriceUnit = $_POST['JerkoiPriceUnit'];

        $query = "UPDATE jerkoiProducts 
                  SET Jerkoi_ProductName='$JerkoiProdName', Jerkoi_Unit='$JerkoiUnit', Jerkoi_PricePerUnit='$JerkoiPriceUnit' 
                  WHERE id='$JerkoiProdId'";

        if(mysqli_query($JerkoiConn, $query)){
            header("location: JerkoiViewProduct.php?JerkoiProdId={$JerkoiProdId}");
        }
    }

?>
