<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/navbar.css">
<link rel="stylesheet" type="text/css" href="../css/popupform.css">
<script text="text/javascript" src="../js/functions.js"></script>



</head>
<body>

<h2>Popup Form</h2>

<!-- My experiment Starts -->

    
<div class='applicants-table'>
  <table>
<tr>
<th>Sl/No</th>

<th>Campus</th>
<th>Enroll No/ID No</th>
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

/*    echo $_SESSION["meter_no"];
    echo '<br>';*/
//$meter_no= $_SESSION["meter_no"];
    // echo '<br>';
    

    // $sql = "SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS SrNo FROM `student_user` JOIN data_uploads WHERE 
    // student_user.enrollNo = data_uploads.enrollNo  AND isApproved =0";

    // $sql="  SELECT *, (@cnt := IF(@cnt IS NULL, 0,  @cnt) + 1) AS SrNo FROM `student_user` JOIN data_uploads WHERE 
    // student_user.enrollNo = data_uploads.enrollNo  AND isApproved =0   ";

// $sql="  SELECT *, ROW_NUMBER() OVER(ORDER BY (SELECT 1)) AS SrNo FROM `student_user` JOIN data_uploads WHERE 
// student_user.enrollNo = data_uploads.enrollNo  AND isApproved =0   "; //Commented on 20-11-2021

    $sql ="SELECT *, @ab:=@ab+1 AS SrNo FROM student_user, (SELECT @ab:= 0)
    AS ab  JOIN data_uploads 
    WHERE student_user.enrollNo = data_uploads.enrollNo  AND isApproved =0";

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
            <td>" . $row["enrollNo"]. "</td>
            <td>" . $row["firstName"] .' ' .$row["lastName"]."</td>
            <td>" . $row["department"]. "</td>
            <td>" . $row["courseName"]. "</td>
            <td>" . $row["semester"] . "</td>
            <td>" . $row["fatherName"] . "</td>
            <td>" . $row["gender"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["mobNo"] . "</td>
            <td><image id='myImg' onClick='myFunc(this)' alt='ID Front' class='table_image' src='".$row['IdFront']."'>
            <td><image id='myImg' onClick='myFunc(this)' alt='ID Back' class='table_image' src='".$row['IdBack']."'>
            <td><image id='myImg' onClick='myFunc(this)' alt='Photo' class='table_image' src='".$row['Photo']."'>
            <td><a href = '../api/approve.php?enrollNo=$row[enrollNo]'><img class='actionBtn' src='../resources/approve.png'></td>
            
           
            <td>           

            <button class='open-button' onclick='openForm()'><img class='actionBtn' src='../resources/reject.png'></button>

            <div class='form-popup' id='myForm'>
              <form class='form-container' action='../api/reject.php' method='POST' enctype='multipart/form-data'>  
                <input type='text' placeholder='Reason for rejection' name='remarks' required>
                <input type='hidden' name='enrollNo' value='$row[enrollNo]'>
            
                <button type='submit' class='btn'>Reject</button>
                <button type='button' class='btn cancel' onclick='closeForm()'>Cancel</button>
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

<!-- My experiment Ends -->



<!-- <button class="open-button" onclick="openForm()">Reject</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Reject</h1>

    <label for="email"><b>Reason for Rejection</b></label>
    <input type="text" placeholder="Reason for rejection" name="email" required>

    <button type="submit" class="btn">Reject</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
  </form>
</div> -->

<!-- <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script> -->

</body>
</html>