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


//_________________________________________  Uploads form data Starts ___________________________________________________________________
//form data

$EnrollNo=$_POST['staff_id'];

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
$idfDestination = '../uploads/staff/'.$idfNameNew;


$idbExt= explode('.',$idbName);
$idbActExt= strtolower(end($idbExt));
$idbNameNew= uniqid('', true).".".$idbActExt;
$idbDestination = '../uploads/staff/'.$idbNameNew;
$allowed = array("jpg","jpeg","png","gif");


$ppExt= explode('.',$ppName);
$ppActExt= strtolower(end($ppExt));
$ppNameNew= uniqid('', true).".".$ppActExt;
$ppDestination = '../uploads/staff/'.$ppNameNew;
$allowed = array("jpg","jpeg","png","gif");



//_________________________________________  Uploads form data Ends   ___________________________________________________________________


if(!empty($_POST['staff_id'])){
    
    $sql="select * from staff_user WHERE staffId='$StaffId'";
    $sqli_run=mysqli_query($conn,$sql);

        if(mysqli_num_rows($sqli_run)>0)
        {
            // echo"<script>alert('Email ID already exists')</script>";
            echo   '<script type="text/javascript"> 
            alert("ID already exists Error Code:101!"); 
            window.location.href = "../views/staff.html";
            </script>';
        }
        elseif(!empty($_POST['staff_id'])){
            $sql= "SELECT enrollNo FROM data_uploads WHERE enrollNo='$StaffId'";
            $sqli_run=mysqli_query($conn,$sql);
    
            if(mysqli_num_rows($sqli_run)>0)
            {
            // echo"<script>alert('Email ID already exists')</script>";
            echo   '<script type="text/javascript"> 
                    alert("Duplicate Enrollment number Error Code:202 !!!"); 
                    window.location.href = "../views/student.html";
                    </script>';
            }
            elseif(!empty($_POST['staff_email'])){
        
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
                                            // echo "ID Front Upload Success"; //commented on 21 sept 2021
                                                //ID Back
                                            move_uploaded_file($idbTmpName,$idbDestination);
                                            // echo "Id Back Upload Success";    //commented on 21 sept 2021
                                                //Photo
                                            move_uploaded_file($ppTmpName,$ppDestination);
                                            // echo "Photo Upload Success"; //commented on 21 sept 2021

                                            // when all files are uploaded successfully then the data will be saved in the db
                                            $sql1="INSERT INTO data_uploads(enrollNo, IdFront, IdBack, Photo) 
                                            VALUES ('$EnrollNo', '$idfDestination','$idbDestination','$ppDestination')";

                                            // to insert data in the student_user table
                                            $sql2="INSERT INTO staff_user(
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

               
                            // else {                  
                            //     $sql="INSERT INTO staff_user(
                            //                                 campus,
                            //                                 staffId,
                            //                                 firstName,
                            //                                 lastName, 
                            //                                 fatherName,
                            //                                 gender,
                            //                                 dob,
                            //                                 address,
                            //                                 department,
                            //                                 email, 
                            //                                 mobNo, 
                            //                                 designation, 
                            //                                 joiningDate, 
                            //                                 isPermanent,
                            //                                 contractEndDate 
                                                                                                
                            //                                 ) 
                                                            
                            //                                 VALUES (
                            //                                         '$Campus',
                            //                                         '$StaffId',
                            //                                         '$Fname',
                            //                                         '$Lname',
                            //                                         '$FatherName',
                            //                                         '$Gender',
                            //                                         '$Dob',
                            //                                         '$Address',
                            //                                         '$Dept',                                                
                            //                                         '$Email',
                            //                                         '$MobNo',
                            //                                         '$Designation',
                            //                                         '$JoiningDate',
                            //                                         '$StaffType',
                            //                                         '$ContactCompletion'                                                    
                            //                                         )";
                            //     if($conn->query($sql)===TRUE)
                            //     {
                            //             /*For popup window and to redirect to xxxx page*/
                                
                            // echo   '<script type="text/javascript"> 
                            // alert("Application Submited!!!"); 
                            // window.location.href = "../index.html";
                            // </script>';
                                    
                            //     }
                            //     else
                            //     {
                            //         echo"Error:" . $sql . "<br>" . $conn->error;
                            //     }
                            // }                
                                
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
}
   
?>