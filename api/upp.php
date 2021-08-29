<?php
session_start();
include_once "../api/dbConfig.php";
if (isset($_POST['submit'])) {


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
    $idfDestination = '../kyc/'.$idfNameNew;
 

    $idbExt= explode('.',$idbName);
    $idbActExt= strtolower(end($idbExt));
    $idbNameNew= uniqid('', true).".".$idbActExt;
    $idbDestination = '../kyc/'.$idbNameNew;
    $allowed = array("jpg","jpeg","png","gif");


    $ppExt= explode('.',$ppName);
    $ppActExt= strtolower(end($ppExt));
    $ppNameNew= uniqid('', true).".".$ppActExt;
    $ppDestination = '../kyc/'.$ppNameNew;
    $allowed = array("jpg","jpeg","png","gif");



    if (in_array($idfActExt, $allowed)) {
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
                                                $sql="INSERT INTO data_uploads(enroll, IdFront, IdBack, Photo) 
                                                VALUES ('$EnrollNo', '$idfDestination','$idbDestination','$ppDestination')";
                                
                                    if($conn->query($sql)===TRUE)
                                {
                                    echo"Record Inserted Successfully";
                                }
                                else
                                {
                                    echo"Error:" . $sql . "<br>" . $conn->error;
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


?>
