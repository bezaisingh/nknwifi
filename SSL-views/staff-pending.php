<?php

// turn on error reporting
  // error_reporting(1);
  // ini_set('error_reporting', E_ALL);

// start session
session_start();

if ($_SESSION["uid"] == null){

    header("location:AHOME");
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
<a href="../AHOME">Home</a>
  <a href="staff-approved.php">Approved</a>
  <a href="staff-rejected.php">Rejected</a>
  <a class="active" href="staff-pending.php">Pending</a>
  <a style="float:right" href="../SIGNOUT">Logout</a>
</div>
        
    <head>

        <link rel="stylesheet" type="text/css" href="../NAVIGATION">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../MODAL">
        <link rel="stylesheet" type="text/css" href="../COLLAPSIBLE">
        
    </head>
    
<body style='padding-left:6px' > <!--to align the entire content in centre-->

<div class="center-image">
<img src="../LOGO" alt="Varsity Logo">
<h2 align="center">Pending Staff Applicants List</h2>
</div>
  

    <!-- <div align="right" style="margin-right: 10px">
      <a href="printBillList.php">Print Pdf</a>
    </div> -->

  <div class='applicants-table'>
  <table>
<tr>
    <th>Sl/no</th>
    <th>Campus</th>
    <th>Staff ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Department</th>
    <th>Designation</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Is Permanent?</th>
    <th>Contract ends on</th>
    <th>Appointment Letter</th>
    <th>ID Front</th>
    <th>ID Back</th>
    <th>Photo</th>
    <th colspan="2">Action</th>

</tr>
<?php
    
    /* To connect to db */
    include ("../config/dbConfig.php");
/*    echo $_SESSION["meter_no"];
    echo '<br>';*/
//$meter_no= $_SESSION["meter_no"];
    // echo '<br>';
    

    // $sql = "SELECT *, (@cnt := IF(@cnt IS NULL, 0,  @cnt) + 1) AS SrNo FROM `staff_user` JOIN data_uploads WHERE 
    // staff_user.staffId = data_uploads.enrollNo  AND isApproved =0 ORDER BY id DESC"; //commented on 20-11-2021

    $sql = "SELECT *, @ab:=@ab+1 AS SrNo FROM staff_user, (SELECT @ab:= 0)
            AS ab JOIN data_uploads 
            WHERE staff_user.staffId = data_uploads.enrollNo  AND isApproved =0"; 

// $sql = "SELECT * FROM `staff_user` JOIN `data_uploads` WHERE 
// staff_user.staffId = data_uploads.enrollNo and isApproved =0 ORDER BY id DESC";



// $sql= "SELECT * FROM student_user";
    
$result = $conn->query($sql);
    
if($result !== false && $result->num_rows > 0)
    
   /* ($result->num_rows > 0)*/ 
{
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
          <td>" . $row["SrNo"] . "</td>
          <td>" . $row["campus"] . "</td>
          <td>" . $row["staffId"]. "</td>
          <td>" . $row["firstName"] .' ' .$row["lastName"]."</td>    
          <td>" . $row["gender"] . "</td>
          <td>" . $row["address"] . "</td>
          <td>" . $row["department"]. "</td>
          <td>" . $row["designation"] . "</td>
          <td>" . $row["email"] . "</td>
          <td>" . $row["mobNo"] . "</td>
          <td>" . $row["isPermanent"]. "</td>
          <td>" . $row["contractEndDate"] . "</td>

          <td><image id='myImg' onClick='myFunc(this)' alt='Appointment Letter' class='table_image' src='".$row['ApntLetter']."'>

          <td><image id='myImg' onClick='myFunc(this)' alt='ID Front' class='table_image' src='".$row['IdFront']."'>
          <td><image id='myImg' onClick='myFunc(this)' alt='ID Back' class='table_image' src='".$row['IdBack']."'>
          <td><image id='myImg' onClick='myFunc(this)' alt='Photo' class='table_image' src='".$row['Photo']."'>
          <td><a href = '../STA-APPROVE?staffId=$row[staffId]'><img class='actionBtn' src='../TICK'></td>
          <td> 
          <button class='collapsible'><img class='actionBtn' src='../CROSS'></button>
          <div class='content'>  
          <form action='../REJ-STAFF' method='POST' enctype='multipart/form-data'>            
              <input class='small-inputbox' name='remarks' placeholder='Remarks' required/> 
              <input type='hidden' name='staffId' value='$row[staffId]'>
              <br><br>
              <input class='small-inputbox' type='submit' name='submit' value='Reject' /> 
              </form>
          </div>
          </td>
                    
      </tr>";  
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
            <!-- Below script is for collapsible -->
        <script>
          var coll = document.getElementsByClassName("collapsible");
          var i;

          for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
              this.classList.toggle("active");
              var content = this.nextElementSibling;
              if (content.style.maxHeight){
                content.style.maxHeight = null;
              } else {
                content.style.maxHeight = content.scrollHeight + "px";
              } 
            });
          }
</script>
    <!-- Above script for collapsible ends -->
</html>