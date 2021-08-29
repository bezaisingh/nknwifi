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


//_________________________________________  Uploads form data Starts ___________________________________________________________________
//form data

$EnrollNo=$_POST['enroll'];

$idf=$_FILES['idf'];
$idfName=$_FILES['idf']['name'];
$idfTmpName=$_FILES['idf']['tmp_name'];
$idfSize=$_FILES['idf']['size'];
$idfError=$_FILES['idf']['error'];
$idfType=$_FILES['idf']['type'];


$idb=$_FILES['idb'];
$idbName=$_FILES['idb']['name'];
$idbTmpName=$_FILES['idb']['tmp_name'];
$idbSize=$_FILES['idb']['size'];
$idbError=$_FILES['idb']['error'];
$idbType=$_FILES['idb']['type'];

$pp=$_FILES['pp'];
$ppName=$_FILES['pp']['name'];
$ppTmpName=$_FILES['pp']['tmp_name'];
$ppSize=$_FILES['pp']['size'];
$ppError=$_FILES['pp']['error'];
$ppType=$_FILES['pp']['type'];



$idfExt= explode('.',$idfName);
$idfActExt= strtolower(end($idfExt));
$allowed = array("jpg","jpeg","png","gif");
$idfNameNew= uniqid('', true).".".$idfActExt;
$idfDestination = '../uploads/student/'.$idfNameNew;


$idbExt= explode('.',$idbName);
$idbActExt= strtolower(end($idbExt));
$idbNameNew= uniqid('', true).".".$idbActExt;
$idbDestination = '../uploads/student/'.$idbNameNew;
$allowed = array("jpg","jpeg","png","gif");


$ppExt= explode('.',$ppName);
$ppActExt= strtolower(end($ppExt));
$ppNameNew= uniqid('', true).".".$ppActExt;
$ppDestination = '../uploads/student/'.$ppNameNew;
$allowed = array("jpg","jpeg","png","gif");



//_________________________________________  Uploads form data Ends   ___________________________________________________________________




    
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
    
    //    else {    commented because of the below  Upload code and is replaced by else if

//_________________________________________  Uploads Starts ___________________________________________________________________

elseif (in_array($idfActExt, $allowed)) {
    if ($idfError === 0) {
        if ($idfSize > 307200) 
        {        
            echo "ID Front File size must be less than 300kb";
        }
            else{

                // if Id Front is uploaded then the second loop for id Back will start here
                    // move_uploaded_file($idfTmpName,$idfDestination);
                    // echo "ID Front Upload Success";      
                    
                    //loop for idback starts

                    if (in_array($idbActExt, $allowed)) {

                        if ($idbError === 0) {
            
                            if ($idbSize < 307200) {                
                    
                                // move_uploaded_file($idbTmpName,$idbDestination);
                                // echo "Id Back Upload Success";

                                //loop for Profile pic starts here
                                if (in_array($ppActExt, $allowed)) {

                                    if ($ppError === 0) {                            
                                        if ($ppSize < 307200) {     
                                            
                                            //When all there is no error in the files provided by the users then the pics will be uploaded 
                                                //ID Front
                                            move_uploaded_file($idfTmpName,$idfDestination);
                                            echo "ID Front Upload Success"; 
                                                //ID Back
                                            move_uploaded_file($idbTmpName,$idbDestination);
                                            echo "Id Back Upload Success";    
                                                //Photo
                                            move_uploaded_file($ppTmpName,$ppDestination);
                                            echo "Photo Upload Success";

                                            // when all files are uploaded successfully then the data will be saved in the db
                                            $sql1="INSERT INTO data_uploads(enrollNo, IdFront, IdBack, Photo) 
                                            VALUES ('$EnrollNo', '$idfDestination','$idbDestination','$ppDestination')";

                                            // to insert data in the student_user table
                                            $sql2="INSERT INTO student_user(
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
                            
                                if($conn->query($sql1)===TRUE){

                                    if($conn->query($sql2)===TRUE){
                                        echo"Record Inserted Code 202";
                                        }else{
                                            echo"Error:" . $sql2 . "<br>" . $conn->error;
                                             }
                                        echo"Record Inserted Successfully Code 201";
                                            }
                                            else
                                            {
                                                echo"Error:" . $sql1 . "<br>" . $conn->error;
                                            }
                                    mysqli_close($conn);
         
                                  echo 
                                  '<script type="text/javascript"> 
                                    alert("Data Upload Successful"); 
                                  </script>';

                                  echo '<script type="text/javascript"> 
                                  alert("Your Credentials will be mailed to you after verification of Data within 3 days, Kindly have patience. Thanks & Regards @ Computer Centre"); 
                                   window.location.href = "../index.html";
                                </script>';
                        
                                        
                                        }
                                            else{
                                                echo   '<script type="text/javascript"> 
                                                alert("Photo File size must be less than 300kb"); 
                                                window.location.href ="javascript:history.back(1)";
                                              </script>';
                                              
                                                }
                                    }
                                                else {
                        
                                                    echo   '<script type="text/javascript"> 
                                                    alert("There was an error uploading the Photo. Please try Again !"); 
                                                    window.location.href ="javascript:history.back(1)";
                                                  </script>';
                                                          }
                                                        }
                                                    else {
                                                        echo   '<script type="text/javascript"> 
                                                        alert("Wrong File type: Photo"); 
                                                        window.location.href ="javascript:history.back(1)";
                                                      </script>';   
                                                            
                                                            }

            
                            
                            }
                                else{
                                    echo   '<script type="text/javascript"> 
                                                    alert("ID Back File size must be less than 300kb"); 
                                                    window.location.href ="javascript:history.back(1)";
                                                  </script>';                                      
                                    }
                        }
                                    else {
            
                                        echo   '<script type="text/javascript"> 
                                                    alert("There was an error uploading ID Back"); 
                                                    window.location.href ="javascript:history.back(1)";
                                                  </script>';  
                                               }
                                            }
                                        else {
                                            echo   '<script type="text/javascript"> 
                                            alert("Wrong File type: ID Back"); 
                                            window.location.href ="javascript:history.back(1)";
                                          </script>';                                                  
                                                
                                                }


                }
    }
                 else {
                    echo   '<script type="text/javascript"> 
                    alert("There was an error uploading ID Front"); 
                    window.location.href ="javascript:history.back(1)";
                  </script>';

                         }
                         }
                       else {
                        echo   '<script type="text/javascript"> 
                        alert("Wrong file type: ID Front"); 
                        window.location.href ="javascript:history.back(1)";
                      </script>';
                              
                            }
 }

//_________________________________________  Uploads Ends   ___________________________________________________________________


        // $sql="INSERT INTO student_user(
        //                                  campus,
        //                                  enrollNo,
        //                                  firstName,
        //                                  lastName, 
        //                                  fatherName,
        //                                  gender,
        //                                  dob,
        //                                  address,
        //                                  department,
        //                                  email, 
        //                                  mobNo, 
        //                                  courseName, 
        //                                  semester, 
        //                                  yearOfCompletion, 
        //                                  hostelNo                                      
        //                                  ) 
                                         
        //                                  VALUES (
        //                                             '$Campus',
        //                                             '$Enroll',
        //                                             '$Fname',
        //                                             '$Lname',
        //                                             '$FatherName',
        //                                             '$Gender',
        //                                             '$Dob',
        //                                             '$Address',
        //                                             '$Dept',                                                
        //                                             '$Email',
        //                                             '$MobNo',
        //                                             '$Course',
        //                                             '$Semester',
        //                                             '$YearOfCompletion',
        //                                             '$HostelNo'
        //                                             )";
        //     if($conn->query($sql)===TRUE)
        //         {
        //             	  /*For popup window and to redirect to xxxx page*/
                
        //      echo   '<script type="text/javascript"> 
        //      alert("Application Submited!!!"); 
        //      window.location.href = "../index.html";
        //      </script>';
                    
        //         }
        //         else
        //         {
        //             echo"Error:" . $sql . "<br>" . $conn->error;
        //         }
                   
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


?>