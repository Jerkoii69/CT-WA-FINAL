<?php
    session_start();
    $Jerkoi = mysqli_connect("localhost", "root", "", "jerkoidb");

    include "JerkoiConnection.php";

    if(isset($_POST['JerkoiSignUp'])){
        $Jerkoifname = $_POST['fname'];
        $Jerk oilname = $_POST['lname'];
        $Jerko iemail = $_POST['email'];
        $Jerko iuname = $_POST['uname'];
        $Jerkoipass = $_POST['pass'];
        $Jerkoicpass = $_POST['cpass'];
        $_SESSION['Jerkoires'] = 0;

        if($Jerkoipass === $Jerkoicpass){
            $sql = "INSERT INTO jerkoiregistration (fname,lname,email,uname,pass,cpass,Jerkoi_Type,Jerkoi_Status) 
                    VALUES ('$Jerkoifname','$Jerkoilname','$Jerkoiemail','$Jerko iuname','$Jerkoipass','$Jerkoicpass', 0, 0)";

            $regsql = mysqli_query($JerkoiConn, $sql);

            $_SESSION['Jerkoifname'] = $Jerkoifname;
            $_SESSION['Jerkoires'] = 1;

            header("location: JerkoiRegisteroutput.php");

        }
        else{
            $_SESSION['Jerkoires'] = 0;

            header("location: JerkoiRegisteroutput.php");
        }
    }
?>
