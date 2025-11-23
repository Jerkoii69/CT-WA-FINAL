<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="JerkoiStyle_1.css">
    <title>Document</title>
</head>
<body>
    <h1>View Clients</h1>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Username</th>
                <th>Password</th>
                <th>Confirmed Password</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();

                include "JerkoiConnection.php";

                $JerkoiSql = "SELECT * FROM jerkoiRegistration WHERE Jerkoi_Type = 0";
                $JerkoiUserRes = mysqli_query($JerkoiConn, $JerkoiSql);

                if(mysqli_num_rows($JerkoiUserRes) > 0){
                    while($JerkoiUsers = mysqli_fetch_assoc($JerkoiUserRes)){
                        echo "<tr>
                        <td><p>{$JerkoiUsers['id']}</p></td>
                        <td><p>{$JerkoiUsers['fname']}</p></td>
                        <td><p>{$JerkoiUsers['lname']}</p></td>
                        <td><p>{$JerkoiUsers['email']}</p></td>
                        <td><p>{$JerkoiUsers['uname']}</p></td>
                        <td><p>{$JerkoiUsers['pass']}</p></td>
                        <td><p>{$JerkoiUsers['cpass']}</p></td>
                        <td><p>Client</p></td>";

                    if ($JerkoiUsers['Jerkoi_Status'] === '0') {
                        echo "<td><button class='JerkoiAppBtn' onclick=\"window.location.href='JerkoiApproveClient.php?JerkoiId=" . $JerkoiUsers['id'] . "'\">Approve</button></td>";
                    } else {
                        echo "<td><p>Approved</p></td>";
                    }

                    echo "</tr>";
                    }
                }
                else{
                    echo "
                        <tr>
                            <td colspan='9'>No clients found.</td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
