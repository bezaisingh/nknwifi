<?php

// turn on error reporting
  // error_reporting(1);
  // ini_set('error_reporting', E_ALL);

// start session
session_start();

if ($_SESSION["uid"] == null){

    header("location:../index.html");
  }

// debug session
// var_dump($_SESSION);
// echo '<br>';
// echo $_SESSION["meter_no"];

//The below codes just prints the session values
// echo '<br>';
// print_r($_SESSION);
// echo '<br>';
// echo("{$_SESSION['meter_no']}"."<br />");

?>

<html>
 <title>Applicants Pending Approval</title>
<div class="topnav">
  <a class="active" href="pending.php">Home</a>
  <a href="approved.php">Approved</a>
  <a href="rejected.php">Rejected</a>
  <a href="pending.php">Pending</a>
  <a style="float:right" href="../api/logout.php">Logout</a>
</div>
        
    <head>

        <link rel="stylesheet" type="text/css" href="../css/navbar.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/modal.css">
        
    </head>
    
<body style='padding-left:6px' > <!--to align the entire content in centre-->

<div class="center-image">
<img src="../resources/logo.png" alt="Varsity Logo">
<h2 align="center">Pending Applicants List</h2>
</div>
  

    <!-- <div align="right" style="margin-right: 10px">
      <a href="printBillList.php">Print Pdf</a>
    </div> -->

  <div class='applicants-table'>
  <table>
<tr>
<th>Sl No</th>
<th>Campus</th>
<th>Enroll No</th>
<th>Name</th>
<th>Department</th>
<th>Course</th>
<th>Sem</th>
<th>Father</th>
<th>Gender</th>
<th>Email</th>
<th>Phone</th>
<th>ID Front</th>
<th>ID Back</th>
<th>Photo</th>
<th colspan="2">Action</th>

</tr>
<?php
    
    /* To connect to db */
include "../api/dbConfig.php";

require_once 'functions.php';

nmName();
echo '<br>';
get_client_ip();
echo 'User IP Address - '.$_SERVER['REMOTE_ADDR'];  
echo '<br>';

/*    echo $_SESSION["meter_no"];
    echo '<br>';*/
//$meter_no= $_SESSION["meter_no"];
    // echo '<br>';
    
$sql = "SELECT * FROM `student_user` JOIN `data_uploads` WHERE 
student_user.enrollNo = data_uploads.enrollNo and isApproved =0 ";

// $sql= "SELECT * FROM student_user";
    
$result = $conn->query($sql);
    
if($result !== false && $result->num_rows > 0)
    
   /* ($result->num_rows > 0)*/ 
{
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["campus"] . "</td>
            <td>" . $row["enrollNo"]. "</td>
            <td>" . $row["firstName"] .' ' .$row["lastName"]."</td>
            <td>" . $row["department"]. "</td>
            <td>" . $row["courseName"]. "</td>
            <td>" . $row["semester"] . "</td>
            <td>" . $row["fatherName"] . "</td>
            <td>" . $row["gender"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["mobNo"] . "</td>
            <td><image id='myImg' alt='ID Front' class='table_image' src='".$row['IdFront']."'>
            <td><image id='myImg1' alt='ID Back' class='table_image' src='".$row['IdBack']."'>
            <td><image id='myImg2' alt='Photo' class='table_image' src='".$row['Photo']."'>
            <td><a href = '../api/approve.php?enrollNo=$row[enrollNo]'>Approve</td>
            <td><a href = '../api/reject.php?enrollNo=$row[enrollNo]'>Reject</td>


                    
      </tr>";

      // <td>".$row[""]."</td>
            // <td>" . $row["mob_no"]. "</td>
            // <td>" . $row["email"]. "</td>
            // <td>" . $row["bill_no"] . "</td>
            // <td>" . $row["bill_period"]. "</td>
            // <td>" . $row["bill_date"]."</td>  
            // <td>" . $row["unit_consumed"] . "</td>    
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();



?>
</table>
  </div>

    <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div> 




</body>
</html>
    
    </body>
    <script text="text/javascript" src="../js/modal.js"></script>
</html>