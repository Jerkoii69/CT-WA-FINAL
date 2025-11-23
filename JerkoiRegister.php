<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="JerkoiStyle_1.css">
    <title>Document</title>
</head>
<body>
    <form action="JerkoiInsert.php" method="POST" autocomplete="OFF">
        <h1>Sign Up</h1>
        <br>
        <table>
            <tr>
                <td><h2>Full Name</h2></td>
                <td><input type="text" name="fname" required></td>
                <td><input type="text" name="lname" required></td>
            </tr>
            <tr>
                <td></td>
                <td><h2>First Name</h2></td>
                <td><h2>Last Name</h2></td>
            </tr>
            <tr>
                <td><h2>Email</h2></td>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <td><h2>Username</h2></td>
                <td><input type="text" name="uname" required></td>
            </tr>
            <tr>
                <td><h2>Password</h2></td>
                <td><input type="password" name="pass" required></td>
            </tr>
            <tr>
                <td><h2>Confirmed Password</h2></td>
                <td><input type="password" name="cpass" required></td>
            </tr>
        </table>
        <br>
        <a href=""><button type="submit" class="JerkoiSignUp" name="JerkoiSignUp">Register</button></a>
        <a href=""><button type="reset" class="JerkoiClear">Clear</button></a>
    </form>
</body>
</html>
