<?php
// turn on error reporting
error_reporting(1);
ini_set('error_reporting', E_ALL);

include 'dbConfig.php';

$EnrollNo=$_GET['enrollNo'];

//isAppoved 0 means pending, 1 means Approved, 2 means rejected.
$sql="UPDATE student_user
SET isApproved = 1,
    approvedOn= CURDATE()
WHERE enrollNo='$EnrollNo'";

$sqli_run=mysqli_query($conn,$sql);

    if($conn->query($sql)===TRUE)
    {
            /*For popup window and to redirect to xxxx page*/
            echo   '<script type="text/javascript"> 
            alert("Approved!!!"); 
            window.location.href ="javascript:history.back(1)";
            </script>';
                
    }else{
           echo"Error:" . $sql . "<br>" . $conn->error;
         }
               

?>