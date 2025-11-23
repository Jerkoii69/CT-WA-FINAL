<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="JerkoiStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>View Orders</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Buyer Name</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Account</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "JerkoiConnection.php";

                $JerkoiSql = "SELECT * FROM jerkoiOrders";
                $JerkoiRes = mysqli_query($JerkoiConn, $JerkoiSql);

                if(mysqli_num_rows($JerkoiRes) > 0){
                    while($JerkoiUsers = mysqli_fetch_assoc($JerkoiRes)){
                        echo "<tr>
                        <td><p>{$JerkoiUsers['order_id']}</p></td>
                        <td><p>{$JerkoiUsers['Jerkoi_BuyerName']}</p></td>
                        <td><p>{$JerkoiUsers['Jerkoi_ProductName']}</p></td>
                        <td><p>{$JerkoiUsers['Jerkoi_ProductPrice']}</p></td>
                        <td><p>{$JerkoiUsers['Jerkoi_Quantity']}</p></td>
                        <td><p>{$JerkoiUsers['Jerkoi_TotalPrice']}</p></td>
                        <td><p>{$JerkoiUsers['Jerkoi_Account']}</p></td>
                        </tr>";
                    }
                }
                else{
                    echo "
                        <tr>
                            <td colspan='7'>No orders found.</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
