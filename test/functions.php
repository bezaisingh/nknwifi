<?php

include 'config.php';
 ////////////////////////////// Export Part Starts ///////////////////////

 if(isset($_POST["Export"])){
     
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('ID', 'Campus', 'Enroll No', 'First Name', 'Last Name'));  
    // $query = "SELECT id, campus, enrollNo,firstName,lastName FROM student_user ORDER BY id DESC";  
    // $result = mysqli_query($conn, $query);  

    $sql="SELECT id, campus, enrollNo,firstName,lastName FROM student_user ORDER BY id DESC";
    $sqli_run=mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($sqli_run))  
    {  
         fputcsv($output, $row);  
    }  
    fclose($output);  
}  

 ////////////////////////////// Export Part Ends ///////////////////////


 if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                   $result = mysqli_query($con, $sql);
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"index.php\"
          </script>";
        }
           }
      
           fclose($file);  
     }
  }  
  
  


  function get_all_records(){
    $con = getdb();
    $Sql = "SELECT * FROM student_user";
    $result = mysqli_query($con, $Sql);  
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>EMP ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Registration Date</th>
                        </tr></thead><tbody>";
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row['id']."</td>
                   <td>" . $row['campus']."</td>
                   <td>" . $row['enrollno']."</td>
                   <td>" . $row['firstname']."</td>
                   <td>" . $row['lastname']."</td></tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}

 ?>