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

$FatherName=$_POST["father"];
$Gender=$_POST["gender"];
$Dob=$_POST["dob"];
$Address=$_POST["addr"];


$Dept=$_POST["dept"];
$Email=$_POST["email"];
$MobNo=$_POST["mobno"];
$Course=$_POST["course"];
$Semester=$_POST["semester"];
$YearOfCompletion=$_POST["yearOfCompletion"];
$HostelNo=$_POST["hostelNo"];



    
if(!empty($_POST['enroll'])){
    
    $sql="select * from student_user WHERE enrollNo='$Enroll'";
    $sqli_run=mysqli_query($conn,$sql);
    
        if(mysqli_num_rows($sqli_run)>0)
        {
        // echo"<script>alert('Email ID already exists')</script>";
        echo   '<script type="text/javascript"> 
                alert("Duplicate Enrollment number Error Code:001!!!"); 
                window.location.href = "../views/student.html";
                </script>';
        }

        elseif(!empty($_POST['enroll'])){
            $sql= "SELECT enrollNo FROM data_uploads WHERE enrollNo='$Enroll'";
            $sqli_run=mysqli_query($conn,$sql);
    
            if(mysqli_num_rows($sqli_run)>0)
            {
            // echo"<script>alert('Email ID already exists')</script>";
            echo   '<script type="text/javascript"> 
                    alert("Duplicate Enrollment number Error Code:002 !!!"); 
                    window.location.href = "../views/student.html";
                    </script>';
            }

        elseif (!empty($_POST['mobno'])) {
            $sql="select * from student_user WHERE mobNo='$MobNo'";
            $sqli_run=mysqli_query($conn,$sql);
        
                if(mysqli_num_rows($sqli_run)>0)
                {
                    echo   '<script type="text/javascript"> 
                    alert("Phone number already used!!!"); 
                    window.location.href = "../views/student.html";
                    </script>';
                }

                elseif (!empty($_POST['email'])) {
                    $sql="select * from student_user WHERE email='$Email'";
                    $sqli_run=mysqli_query($conn,$sql);
                
                        if(mysqli_num_rows($sqli_run)>0)
                        {
                            echo   '<script type="text/javascript"> 
                            alert("Email ID already exists!"); 
                            window.location.href = "../views/student.html";
                            </script>';
                        }
    
   else {   
        $sql="INSERT INTO student_user(
                                         campus,
                                         enrollNo,
                                         firstName,
                                         lastName, 
                                         fatherName,
                                         gender,
                                         dob,
                                         address,
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
                                                    '$FatherName',
                                                    '$Gender',
                                                    '$Dob',
                                                    '$Address',
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
}
}
}
?>