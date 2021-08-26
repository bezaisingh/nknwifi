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

$Enroll=$_POST["enroll"];

$Fname=$_POST["fname"];

$Lname=$_POST["lname"];

$Dept=$_POST["dept"];

$Email=$_POST["email"];

$MobNo=$_POST["mobno"];

$Course=$_POST["course"];

$Semester=$_POST["semester"];

$YearOfCompletion=$_POST["yearOfCompletion"];

$HostelNo=$_POST["hostelNo"];

    
if(!empty($_POST['email'])){
    
        $sql="select * from student_user WHERE email='email'";
        $sqli_run=mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($sqli_run)>0)
        {
        echo"<script>alert('Email ID already exists')</script>";
        }
    
       else {
    

        $sql="INSERT INTO student_user(
                                         campus,
                                         enrollNo,
                                         firstName,
                                         lastName, 
                                         department,
                                         email, 
                                         mobNo, 
                                         courseName, 
                                         semester, 
                                         yearOfCompletion, 
                                         hostelNo                                      
                                         ) 
                                         
                                         VALUES (
                                                    '$Campus',
                                                    '$Enroll',
                                                    '$Fname',
                                                    '$Lname',
                                                    '$Dept',                                                
                                                    '$Email',
                                                    '$MobNo',
                                                    '$Course',
                                                    '$Semester',
                                                    '$YearOfCompletion',
                                                    '$HostelNo'
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

echo   '<script type="text/javascript"> 
alert("Fatal Error"); 
window.location.href = "../index.html";
</script>';
   
    mysqli_close($conn);
   
}
else
	{
		echo "<script>alert('Password/Email Does not Match')</script>";
    }
   
?>