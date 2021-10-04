<html>
<head>
<title>NKN Wifi</title>
    <link rel="shortcut icon" href="../resources/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
</head>
<body align>
    <!-- Navigation bar for navstyle2.css -->
<div class="topnav">
  <a class="active" href="../index.html">Home</a>
  <!-- <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a> -->
  <a style="float:right" href="admin.html">Admin Login</a> 
</div>
 <!-- Navigation bar for navstyle2.css ends here -->
           
        <div class=center-image>
            <img src="../resources/logo.png" alt="Varsity Logo">  
            <h2 align="center">NKN-Internet Access Registration Form</h2>
          </div>

        <div class="footer">
            <p>Copyright &copy Assam University, Silchar, Cachar, Assam</p>
        </div>

</body>
</html>
          <!-- ////////////////////////////// Search Part Starts /////////////////////// -->
                            <br><br>
                            <br>

           <div>
            <form class="form-horizontal" action="" method="post"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                            <label style='font-weight:bold;'>Search Student Application</label> <br> <br>
                            <label>Enrollment Number: </label><input type="text" name="enrollNo">
                            <!-- <label>Email Id: </label><input type="email" name="email">
                            <label>Phone No: </label><input type="number" name="phone"> -->
                            <input type="submit" name="search-student" class="btn btn-success" value="Search Student"/>
                            </div>

                            <br><br>
                            <br>

                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                            <label style='font-weight:bold;'>Search Staff Application</label> <br><br>
                            <label>Staff Id: </label><input type="text" name="staffId">
                            <!-- <label>Email Id: </label><input type="email" name="email">
                            <label>Phone No: </label><input type="number" name="phone"> -->
                            <input type="submit" name="search-staff" class="btn btn-success" value="Search Staff"/>
                            </div>
                   </div>                    
            </form>           
    </div>

    <?php
    if (isset($_POST['search-student'])){
                include('../api/dbConfig.php');

                echo"
                <div>
                <table border='1'>
                <thead>
                <th>Enroll No</th>
                <th>Name</th>
                <th>Department</th>
                <th>Course</th>
                <th>Father Name</th>
                <th>Applied On</th>
                <th>Status</th>
                </thead>
                <tbody>
                </div>";

                $enrollNo=$_POST['enrollNo'];

                  //MySQLi Object-oriented
                  $sql=$conn->query("SELECT 
                                        enrollNo, 
                                        firstName, 
                                        lastName, 
                                        department, 
                                        courseName, 
                                        fatherName,  
                                        appliedOn, 
                                        isApproved 
                                        FROM student_user WHERE enrollno= '$enrollNo'");

                    while($row = $sql->fetch_array()){

                        $status;
                        if($row['isApproved']==1){
                            $status='Approved';
                        }elseif($row['isApproved']==2){
                            $status='Rejected';
                        }elseif($row['isApproved']==0){
                            $status='Pending';
                        }else{
                            $status='Unknown';
                        }
                    ?>
                    <tr>
                    
                 
                   
                    <td><?php echo $row['enrollNo']?></td>                    
                    <td><?php echo $row['firstName']; echo " "; echo $row['lastName']?></td>
                    <td><?php echo $row['department']?></td>
                    <td><?php echo $row['courseName']?></td>                  
                    <td><?php echo $row['fatherName']?></td>
                    <td><?php echo $row['appliedOn']?></td>
                    <td><?php echo $status ?></td>
                    
                    </tr>
                    <?php 
                    }

    }


    if (isset($_POST['search-staff'])){
        include('../api/dbConfig.php');

        echo"
        <div>
        <table border='1'>
        <thead>
        <th>Staff ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Father Name</th>
        <th>Applied On</th>
        <th>Status</th>
        </thead>
        <tbody>
        </div>";

        $staffId=$_POST['staffId'];

          //MySQLi Object-oriented
          $sql=$conn->query("SELECT 
                                staffId, 
                                firstName, 
                                lastName, 
                                department, 
                                designation, 
                                fatherName,  
                                appliedOn, 
                                isApproved 
                                FROM staff_user WHERE staffId= '$staffId'");

            while($row = $sql->fetch_array()){

                $status;
                if($row['isApproved']==1){
                    $status='Approved';
                }elseif($row['isApproved']==2){
                    $status='Rejected';
                }elseif($row['isApproved']==0){
                    $status='Pending';
                }else{
                    $status='Unknown';
                }
            ?>
            <tr>
            
         
           
            <td><?php echo $row['staffId']?></td>                    
            <td><?php echo $row['firstName']; echo " "; echo $row['lastName']?></td>
            <td><?php echo $row['department']?></td>
            <td><?php echo $row['designation']?></td>                  
            <td><?php echo $row['fatherName']?></td>
            <td><?php echo $row['appliedOn']?></td>
            <td><?php echo $status ?></td>
            
            </tr>
            <?php 
            }

}



    ?>

                <!-- ////////////////////////////// Search Part ends /////////////////////// -->
