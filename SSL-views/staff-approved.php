<?php

// turn on error reporting
  // error_reporting(1);
  // ini_set('error_reporting', E_ALL);

// start session
session_start();

if ($_SESSION["uid"] == null){

    header("location:../AHOME");
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
 <title>Approved Staff</title>
<div class="topnav">
  <a href="../AHOME">Home</a>
  <a class="active" href="staff-approved.php">Approved</a>
  <a href="staff-rejected.php">Rejected</a>
  <a href="staff-pending.php">Pending</a>
  <a style="float:right" href="../SIGNOUT">Logout</a>
</div>
        
    <head>
        <link rel="stylesheet" type="text/css" href="../NAVIGATION">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../MODAL">    
    </head>
    
<body style='padding-left:6px' > <!--to align the entire content in centre-->

<div class="center-image">
<img src="../resources/logo.png" alt="Varsity Logo">
<h2 align="center">Approved Staff Applicants List</h2>
</div>  

<div id="block_container">
  <div id="bloc1" align= 'left'>
        <form method="POST">
            <label class='less-space'>From: </label><input class='less-space' type="date" name="from">
            <label class='less-space'>To: </label><input class='less-space' type="date" name="to">
            <input class='less-space' style='margin-right: 20px; width: 110px;' type="submit" value="Get Data" name="submit">
        </form>
  </div>

  <div id="bloc2"align= 'right'>
            <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                            <label class='less-space'>From </label><input class='less-space' type="date" name="export-from">
                            <label class='less-space'>To </label><input class='less-space' type="date" name="export-to">
                            <input class='less-space' style='margin-right: 20px; width: 110px;' type="submit" name="Export-Approved-Staff" class="btn btn-success" value="Export to Excel"/>
                            </div>
                   </div>                    
            </form>           
  </div>
</div>

    <!-- <div align="right" style="margin-right: 10px">
      <a href="printBillList.php">Print Pdf</a>
    </div> -->

  <div class='applicants-table'>
    
  <!-- Commented on 20-11-2021 -->
                      <!-- ////////////////////////////// Export Part Starts /////////////////////// -->
                      <!-- <div align= 'right'>
            <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                            <label class='less-space'>From </label><input class='less-space' type="date" name="export-from">
                            <label class='less-space'>To </label><input class='less-space' type="date" name="export-to">
                            <input class='less-space' style='margin-right: 20px; width: 110px;' type="submit" name="Export-Approved-Staff" class="btn btn-success" value="Export to Excel"/>
                            </div>
                   </div>                    
            </form>           
    </div> -->
                  <!-- ////////////////////////////// Export Part Ends /////////////////////// -->

      <!-- <div align= 'left'>
        <form method="POST">
            <label class='less-space'>From: </label><input class='less-space' type="date" name="from">
            <label class='less-space'>To: </label><input class='less-space' type="date" name="to">
            <input class='less-space' style='margin-right: 20px; width: 110px;' type="submit" value="Get Data" name="submit">
        </form>
    </div> -->
  <!-- Commented on 20-11-2021 -->

  <table>
<tr>
<th>Sl/no</th>

    <th>Campus</th>
    <th>Staff ID</th>
    <th>Name</th>
    <!-- <th>Father</th> -->
    <th>Gender</th>
    <!-- <th>DOB</th> -->
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

</tr>
<?php
    
    /* To connect to db */
    include ("../config/dbConfig.php");

if (isset($_POST['submit'])){

  $from=date('Y-m-d',strtotime($_POST['from']));
  $to=date('Y-m-d',strtotime($_POST['to']));

  $sql = "SELECT *, @ab:=@ab+1 AS SrNo FROM staff_user, (SELECT @ab:= 0)
          AS ab JOIN data_uploads 
          WHERE staff_user.staffId = data_uploads.enrollNo  AND approvedOn BETWEEN '$from' AND '$to'";

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
                    
      </tr>"; 
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
}else{
        // $sql = "SELECT *, (@cnt := IF(@cnt IS NULL, 0,  @cnt) + 1) AS SrNo FROM `staff_user` JOIN data_uploads WHERE 
        // staff_user.staffId = data_uploads.enrollNo  AND isApproved =1"; //Commented on 20-11-2021

        $sql = "SELECT *, @ab:=@ab+1 AS SrNo FROM staff_user, (SELECT @ab:= 0)
        AS ab JOIN data_uploads 
        WHERE staff_user.staffId = data_uploads.enrollNo  AND isApproved =1"; 
        
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
                    
      </tr>"; 
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
}

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