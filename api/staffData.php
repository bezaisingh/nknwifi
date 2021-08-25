<?php

// turn on error reporting
error_reporting(1);
ini_set('error_reporting', E_ALL);
//debug session
//var_dump($_SESSION);


include 'dbConfig.php';

if(isset($_POST["submit"]))
{

$Campus=$_POST["campus"];
    
$Enroll=$_POST["staff_id"];

$Fname=$_POST["staff_fname"];

$Lname=$_POST["staff_lname"];

$Dept=$_POST["staff_dept"];

$Email=$_POST["staff_email"];

$MobNo=$_POST["staff_mobno"];

$Designation=$_POST["staff_desig"];

$JoiningDate=$_POST["staff_dateOfJoin"];

$ContactCompletion=$_POST["staff_completionOfContract"];



    
if(!empty($_POST['email'])){
    
        $sql="select * from staff_user WHERE email='email'";
        $sqli_run=mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($sqli_run)>0)
        {
        echo"<script>alert('Email ID already exists')</script>";
        }
    
       else {
    

        $sql="INSERT INTO staff_user(
                                         campus,
                                         enrollNo,
                                         firstName,
                                         lastName, 
                                         department,
                                         email, 
                                         mobNo, 
                                         designation,
                                         joiningDate,
                                         contractEndDate                                       
                                         ) 
                                         
                                         VALUES (
                                                    '$Campus',
                                                    '$Enroll',
                                                    '$Fname',
                                                    '$Lname',
                                                    '$Dept', 
                                                    '$Email',
                                                    '$MobNo',                                                    
                                                    '$Designation',
                                                    '$JoiningDate',
                                                    '$ContactCompletion'                                                    
                                                    )";
            if($conn->query($sql)===TRUE)
                {
                    	  /*For popup window and to redirect to xxxx page*/
                
             echo   '<script type="text/javascript"> 
             alert("Application Submited!!!"); 
             window.location.href = "../index.html";
             </script>';
                    
                }
                else
                {
                    echo"Error:" . $sql . "<br>" . $conn->error;
                }
                   
    }
     
} 
   
    mysqli_close($conn);
   
}
else
	{
		echo "<script>alert('Password/Email Does not Match')</script>";
    }
   
?>