<?php
include '../dbConn.php';

// turn on error reporting
error_reporting(1);
ini_set('error_reporting', E_ALL);

// start session
session_start();

// debug session
//var_dump($_SESSION);

$MtrNo=$_SESSION["meter_no"];
$OldPassword=$_POST["currentpwd"];
$NewPassword=$_POST["newpwd"];
$cnfNewPassword=$_POST["cnewpwd"];


if($cnfNewPassword !== $NewPassword){

    echo   '<script type="text/javascript"> 
    alert("Passwords do not match.. Try again!!!"); 
    window.location.href = "../resetPassword.php";
    </script>';

}else
        if(isset($_POST["pwdReset"]))
        {
            $sql="SELECT pwd FROM users_table WHERE meter_no='$MtrNo';";
            $result = mysqli_query($conn, $sql);  //mysql_query($qry);
            $row = mysqli_fetch_array($result);

                $CheckOldPassword= $row['pwd'];

                // echo "<script>alert('$CheckOldPassword !!!')</script>";
                // echo "$CheckOldPassword";   
                if( $CheckOldPassword !== $OldPassword){
                    echo   '<script type="text/javascript"> 
                    alert("Wrong Current Password .. Try again!!!"); 
                    window.location.href = "../resetPassword.php";
                    </script>';
                }else{

                   $sql="UPDATE users_table
                            SET pwd = '$NewPassword'
                            WHERE meter_no='$MtrNo';";

                                if($conn->query($sql)===TRUE)
                                {
                                    echo   '<script type="text/javascript"> 
                                    alert("Password Reset Sucessful"); 
                                    window.location.href = "userLogout.php";
                                    </script>';
                                }
                                else
                                {
                                    echo"Error:" . $sql . "<br>" . $conn->error;
                                }

                  
                }
            

            
        }


else{
    die("failed: ".$conn->connect_error);
    echo 'Failed to Update Password';  
  }
   
?>