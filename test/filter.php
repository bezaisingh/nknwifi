<!DOCTYPE html>
<html>
<head>
<title>How to Select MySQL Table between Two Dates in PHP</title>
</head>
<body>
<h2>Login Table</h2>
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
</div><br>
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
            <th>UserID</th>
            <th>Username</th>
            <th>Login Date</th>
        </thead>
        <tbody>
        <?php
            if (isset($_POST['submit'])){
                include('config.php');
                $from=date('Y-m-d',strtotime($_POST['from']));
                $to=date('Y-m-d',strtotime($_POST['to']));
                //MySQLi Procedural
                //$oquery=mysqli_query($conn,"select * from `login` where login_date between '$from' and '$to'");
                //while($orow=mysqli_fetch_array($oquery)){
                /*	?>
                    <tr>
                        <td><?php echo $orow['logid']?></td>
                        <td><?php echo $orow['username']?></td>
                        <td><?php echo $orow['login_date']?></td>
                    </tr>
                    <?php */
                //}
 
                //MySQLi Object-oriented
                $oquery=$conn->query("select * from `student_user` where approvedOn between '$from' and '$to'");
                while($orow = $oquery->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo $orow['id']?></td>
                        <td><?php echo $orow['campus']?></td>
                        <td><?php echo $orow['appliedOn']?></td>
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