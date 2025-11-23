<?php
    session_start();

    include "JerkoiConnection.php";

    if(isset($_POST['JerkoiLogIn'])){
        $JerkoiUname = $_POST['uname'];
        $JerkoiPass = $_POST['pass'];

        $JerkoiVerifySql =  "SELECT * FROM jerkoiRegistration WHERE uname = '$JerkoiUname'";

        $JerkoiVerify = mysqli_query($JerkoiConn, $JerkoiVerifySql);

        if(mysqli_num_rows($JerkoiVerify) === 1)
        {
            $JerkoiUser = mysqli_fetch_assoc($JerkoiVerify);

            $JerkoiVPass = $JerkoiUser['pass'];
            $JerkoiUsername = $JerkoiUser['uname'];
            $JerkoiType = $JerkoiUser['Jerkoi_Type'];
            $JerkoiStatus = $JerkoiUser['Jerkoi_Status'];
            $JerkoiFName = $JerkoiUser['fname'];
            
            if ($JerkoiPass === $JerkoiVPass) {

                switch($JerkoiType){
                    case '0':
                        if($JerkoiStatus === '1'){

                            $_SESSION['JerkoiUsername'] = $JerkoiUsername;
                            echo "<script>
                                alert('Successful Log in. Welcome, Client {$JerkoiFName}.');

                                parent.frames['nav_column'].location.href = 'JerkoiClientNav.php';
                                parent.frames['mid_column'].location.href = 'JerkoiClientProduct.php';
                            </script>";
                        }
                        else{
                            header("Location: JerkoiLogin.php?message=Your account is still not approved by the admin.");
                            exit(); 
                        }
                        break;
                    case '1':
                        $_SESSION['JerkoiUsername'] = $JerkoiUsername;
                        echo "<script>
                            alert('Successful Log in. Welcome, Admin {$JerkoiFName}.');

                            parent.frames['nav_column'].location.href = 'JerkoiAdminNav.php';
                            parent.frames['mid_column'].location.href = 'JerkoiAdminProduct.php';
                        </script>";
                        break;
                    default:
                        header("Location: JerkoiGuestProduct.php");
                }
                exit();
            }
            else{
                header("Location: JerkoiLogin.php?message=Incorrect Password");
                exit();
            }
        }
        else{
            header("Location: JerkoiLogin.php?message=User does not exist");
            exit();
        }
    }
?>
