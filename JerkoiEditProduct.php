<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="JerkoiStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>Edit Product</h1>
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
                        <form action="JerkoiUpdateProduct.php?Jerkoiprodid='. $Jerkoiprod['Jerkoiprodid'] .'" method="post">
                            <table>
                                <tr>
                                    <td><p>Product Name: </p></td>
                                    <td><input type="text" name="Jerkoiprodname" value="'. $Jerkoiprod['Jerkoi_ProductName'] .'"></td>
                                </tr>
                                <tr>
                                    <td><p>Unit: </p></td>
                                    <td><input type="text" name="Jerkoiunit" value="'. $Jerkoiprod['Jerkoi_Unit'] .'"></td>
                                </tr>
                                <tr>
                                    <td><p>Price per Unit: </p></td>
                                    <td><input type="text" name="Jerkoipriceunit" value="'. $Jerkoiprod['Jerkoi_PriceperUnit'] .'"></td>
                                </tr>
                                <tr>
                                    <td><button class="Jerkoiviewbtn" name="Jerkoiupdatebtn" type="submit" style="background-color: green">Update</button></td>
                                    <td><button class="Jerkoiviewbtn" style="background-color: blue" onclick="window.location.href=\'JerkoiAdminProduct.php\'">Cancel</button></td>
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
