<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="JerkoiStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>Available Products</h1>
    <br><br>
    <div class="Jerkoicon">
        <?php
        session_start();
        include "JerkoiConnection.php";

        $sql = "SELECT * FROM jerkoiproducts";
        $ressql = mysqli_query($JerkoiConn, $sql);

        if(mysqli_num_rows($ressql) > 0){
            while($Jerkoiprod = mysqli_fetch_assoc($ressql)){
                echo '
                    <div class="Jerkoicard">
                        <img src="data:image/jpeg;base64,' . base64_encode($Jerkoiprod['Jerkoi_Image']) . '" width="200">
                        <h5><p>' . $Jerkoiprod['Jerkoi_ProductName'] . '</p></h5>
                        <button class="Jerkoiviewbtn" onclick="window.location.href=\'JerkoiRegister.php\'">View</button>
                    </div>
                ';
            }
        }
    ?>
    </div>
</body>
</html>
