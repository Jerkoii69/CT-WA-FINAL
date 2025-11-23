<?php
    session_start();
    include "JerkoiConnection.php";

    if(isset($_POST['JerkoiBuyBtn'])){
        $JerkoiUsername = $_SESSION['JerkoiUsername'];

        $JerkoiBuyerName = $_POST['JerkoiBuyerName'];
        $JerkoiQuantity = $_POST['JerkoiQuantity'];
        $JerkoiProdId = $_GET['id'];

        $sql = "SELECT * FROM jerkoiProducts WHERE JerkoiProdId ='$JerkoiProdId'";
        $JerkoiBuyQ = mysqli_query($JerkoiConn, $sql);

        if(mysqli_num_rows($JerkoiBuyQ) === 1){
            $JerkoiProd = mysqli_fetch_assoc($JerkoiBuyQ);

            $JerkoiProductName = $JerkoiProd['Jerkoi_ProductName'];
            $JerkoiPricePerUnit = $JerkoiProd['Jerkoi_PricePerUnit'];

            $JerkoiTotalPrice = $JerkoiPricePerUnit * $JerkoiQuantity;

            $JerkoiInsertBuy = "INSERT INTO jerkoiOrders (Jerkoi_BuyerName, Jerkoi_ProductName, Jerkoi_ProductPrice, Jerkoi_Quantity, Jerkoi_TotalPrice, Jerkoi_Account) 
                                VALUES ('$JerkoiBuyerName','$JerkoiProductName','$JerkoiPricePerUnit','$JerkoiQuantity','$JerkoiTotalPrice','$JerkoiUsername')";

            if(mysqli_query($JerkoiConn, $JerkoiInsertBuy)){
                header("location: JerkoiClientProduct.php");
            }
            else{
                header("location: JerkoiClientProduct.php");
            }
        }

    }
?>
