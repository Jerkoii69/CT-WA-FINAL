<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="JerkoiStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>Add Product</h1>
    <br><br>
    <div class="Jerkoicon">
        <div class="Jerkoicard">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan='2'><input type="file" name="img" style="padding: 5px; font-size: 15px;"></td>
                        </tr>
                        <tr>
                            <td><p>Product Name: </p></td>
                            <td><input type="text" name="Jerkoiprodname" required></td>
                        </tr>
                        <tr>
                            <td><p>Unit: </p></td>
                            <td><input type="text" name="Jerkoiunit" required></td>
                        </tr>
                        <tr>
                            <td><p>Price per Unit: </p></td>
                            <td><input type="text" name="Jerkoipriceunit" required></td>
                        </tr>
                        <tr>
                            <td><button class="Jerkoiviewbtn" name="Jerkoiaddbtn" type="submit" style="background-color: green">Add</button></td>
                            <td><button class="Jerkoiviewbtn" style="background-color: blue" onclick="window.location.href='JerkoiAdminProduct.php'">Cancel</button></td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>

   <?php
session_start();
include "JerkoiConnection.php";

if (isset($_POST['Jerkoiaddbtn'])) {

    if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {

        $Jerkoiprodname = $_POST['Jerkoiprodname'];
        $Jerkoiunit = $_POST['Jerkoiunit'];
        $Jerkoipriceunit = $_POST['Jerkoipriceunit'];
        $Jerkoiimage = file_get_contents($_FILES['img']['tmp_name']);

        $stmt = $JerkoiConn->prepare("INSERT INTO Jerkoiproducts (Jerkoi_ProductName, Jerkoi_Unit, Jerkoi_PriceperUnit, Jerkoi_Image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssb", $Jerkoiprodname, $Jerkoiunit, $Jerkoipriceunit, $null);

        $null = NULL;
        $stmt->send_long_data(3, $Jerkoiimage);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Added successfully');
                    setTimeout(() => { window.location.href = 'JerkoiAddProduct.php'; }, 3000);
                </script>";
        }
        $stmt->close();

    } else {
        echo "<script>
                alert('Please select an image file to upload.');
              </script>";
    }
}
?>

</body>
</html>
