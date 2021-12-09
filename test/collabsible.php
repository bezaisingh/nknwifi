<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/navbar.css">

<!-- CSS Starts -->
<style>
.collapsible {
  /* background-color: #777; */
  color: white;
  cursor: pointer;
  padding: 5px;
  width: 95%;
  height: fit-content;
  border: none;
  text-align: left;
  outline: none;
  float: center;
  /* font-size: 15px; */
}

.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  /* padding: 0 18px; */
  /* padding-top: 5px; */
  margin-top: 5px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  /* background-color: #f1f1f1; */
}
</style>
<!-- CSS ends -->


</head>
<body>

<h2>Animated Collapsibles</h2>

<!-- <p>A Collapsible:</p>
<button class="collapsible">Open Collapsible</button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<p>Collapsible Set:</p>
<button class="collapsible">Open Section 1</button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<button class="collapsible">Open Section 2</button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<button class="collapsible">Open Section 3</button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div> -->


<!-- my experiments starts -->

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
              <button class='collapsible'><img class='actionBtn' src='../resources/reject.png'></button>
              <div class='content'>              
                  <input class='small-inputbox' name='remarks' placeholder='Reason to reject' required/> 
                  <br>
                  <p style='float: center;'><a href = '../api/reject.php?enrollNo=$row[enrollNo]'> REJECT </p>
              </div></td>  
                      
        </tr>";
  
  }
  echo "</table>";
  } else { echo "0 results"; }
  $conn->close();
  
  ?>
  </table>
    </div>








<!-- my experiments ends -->

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

</body>
</html>
