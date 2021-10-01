<!DOCTYPE html>
<html>
<head>
<title>How to Select MySQL Table between Two Dates in PHP</title>
</head>
<body>
<h2>Filter Data page</h2>

<!-- 
    <div>

        <table border="1">
            <thead>
                <th>UserID</th>
                <th>Username</th>
                <th>Login Date</th>
            </thead>
            <tbody>
            <?php
                include('config.php');
                //MySQLi Procedural
                //$query=mysqli_query($conn,"select * from `login`");
                //while($row=mysqli_fetch_array($query)){
                /*	?>
                    <tr>
                        <td><?php echo $row['logid']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['login_date']; ?></td>
                    </tr>
                    <?php */
                //}
    
                //MySQLi Object-oriented
                $query=$conn->query("select * from `student_user`");
                while($row = $query->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['campus']; ?></td>
                        <td><?php echo $row['appliedOn']; ?></td>
                    </tr>
                    <?php 
                }
            ?>
            </tbody>
        </table>
    </div> 
-->

<br>
<div>
    <form method="POST">
        <label>From: </label><input type="date" name="from">
        <label>To: </label><input type="date" name="to">
        <input type="submit" value="Get Data" name="submit">
    </form>
</div>
<h2>Data Between Selected Dates</h2>
<div>
    <table border="1">
        <thead>
        <th>Sl No</th>
        <th>Id</th>
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
        </thead>
        <tbody>
        <?php
            if (isset($_POST['submit'])){
                include('config.php');
                $from=date('Y-m-d',strtotime($_POST['from']));
                $to=date('Y-m-d',strtotime($_POST['to']));
            
                //MySQLi Object-oriented
                $oquery=$conn->query("SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS SrNo FROM `student_user` where approvedOn between '$from' and '$to'");
                while($row = $oquery->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo $row['SrNo']?></td>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['campus']?></td>
                        <td><?php echo $row['enrollNo']?></td>                    
                        <td><?php echo $row['firstName']; echo " "; echo $row['lastName']?></td>
                        <td><?php echo $row['department']?></td>
                        <td><?php echo $row['courseName']?></td>
                        <td><?php echo $row['semester']?></td>
                        <td><?php echo $row['fatherName']?></td>
                        <td><?php echo $row['gender']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['mobNo']?></td>
                    </tr>
                    <?php 
                }
            }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>