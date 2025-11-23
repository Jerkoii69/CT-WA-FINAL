<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="JerkoiStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>Buy Product</h1>
    <br><br>
    <div class="Jerkoicon">
        <?php
        session_start();
        include "JerkoiConnection.php";
        
        $Jerkoiprodid = $_GET['Jerkoiprodid'];

        $sql = "SELECT * FROM jerkoiproducts WHERE Jerkoiprodid = '$Jerkoiprodid'";
        $ressql = mysqli_query($JerkoiConn, $sql);

        if(mysqli_num_rows($ressql) === 1){
            $Jerkoiprod = mysqli_fetch_assoc($ressql);
            echo '
                    <div class="Jerkoicard">
                        <img src="data:image/jpeg;base64,' . base64_encode($Jerkoiprod['Jerkoi_Image']) . '" width="200">
                        <div>
                            <form action="JerkoiSubmitBuy.php?id=' . $Jerkoiprodid . '" method="post">
                                <table>
                                <tr>
                                    <td><p>Name: </p></td>
                                    <td><input type="text" name="Jerkoibuyername" required></td>
                                </tr>
                                <tr>
                                    <td><p>Quantity: </p></td>
                                    <td><input type="number" name="Jerkoiquantity" required></td>
                                </tr>   
                                <tr>
                                    <td><button class="Jerkoiviewbtn" name="Jerkoibuybtn" type="submit" style="background-color: green">Buy</button></td>
                                    <td><button class="Jerkoiviewbtn" style="background-color: blue" onclick="window.location.href=\'JerkoiClientProduct.php\'">Cancel</button></td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
                ';
        }
    ?>
    </div>
</body>
</html>
