<?php

// turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(E_WARNING);
//debug session
//var_dump($_SESSION);


include 'dbConfig.php';

if(isset($_POST["submit"]))
{

$Campus=$_POST["campus"];
$StaffId=$_POST["staff_id"];
$Fname=$_POST["staff_fname"];
$Lname=$_POST["staff_lname"];

$FatherName=$_POST["staff_father"];
$Gender=$_POST["staff_gender"];
$Dob=$_POST["staff_dob"];
$Address=$_POST["staff_addr"];

$Dept=$_POST["staff_dept"];
$Email=$_POST["staff_email"];
$MobNo=$_POST["staff_mobno"];
$Designation=$_POST["staff_desig"];
$JoiningDate=$_POST["staff_dateOfJoin"];
$StaffType=$_POST['staff_type'];
$ContactCompletion=$_POST["staff_completionOfContract"];

if(!empty($_POST['staff_email'])){
    
        $sql="select * from staff_user WHERE email='$Email'";
        $sqli_run=mysqli_query($conn,$sql);
    
            if(mysqli_num_rows($sqli_run)>0)
            {
                // echo"<script>alert('Email ID already exists')</script>";
                echo   '<script type="text/javascript"> 
                alert("Email ID already exists!"); 
                window.location.href = "../views/staff.html";
                </script>';
            }
             elseif (!empty($_POST['staff_mobno'])) {
                    $sql="select * from staff_user WHERE mobNo='$MobNo'";
                    $sqli_run=mysqli_query($conn,$sql);
                
                        if(mysqli_num_rows($sqli_run)>0)
                        {
                            echo   '<script type="text/javascript"> 
                            alert("Phone number already used!!!"); 
                            window.location.href = "../views/staff.html";
                            </script>';
                        }
               
                            else {                  
                                $sql="INSERT INTO staff_user(
                                                            campus,
                                                            staffId,
                                                            firstName,
                                                            lastName, 
                                                            fatherName,
                                                            gender,
                                                            dob,
                                                            address,
                                                            department,
                                                            email, 
                                                            mobNo, 
                                                            designation, 
                                                            joiningDate, 
                                                            isPermanent,
                                                            contractEndDate 
                                                                                                
                                                            ) 
                                                            
                                                            VALUES (
                                                                    '$Campus',
                                                                    '$StaffId',
                                                                    '$Fname',
                                                                    '$Lname',
                                                                    '$FatherName',
                                                                    '$Gender',
                                                                    '$Dob',
                                                                    '$Address',
                                                                    '$Dept',                                                
                                                                    '$Email',
                                                                    '$MobNo',
                                                                    '$Designation',
                                                                    '$JoiningDate',
                                                                    '$StaffType',
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
     
} 

// echo   '<script type="text/javascript"> 
// alert("Fatal Error"); 
// window.location.href = "../index.html";
// </script>';
   
    mysqli_close($conn);
   
}
else
	{
		echo "<script>alert('Password/Email Does not Match')</script>";
    }
   
?>