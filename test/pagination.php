<html>
   
   <head>
      <title>Paging Using PHP</title>
   </head>
   
   <body>
      <?php

include "../api/dbConfig.php";
$rec_limit = 20;

         /* Get total number of records */
         $sql ="SELECT *, @ab:=@ab+1 AS SrNo FROM student_user, (SELECT @ab:= 0)
         AS ab  JOIN data_uploads 
         WHERE student_user.enrollNo = data_uploads.enrollNo  AND isApproved =1";

        //  $retval = mysqli_query( $sql, $conn );
         $retval = $conn->query($sql);   
         
         if(! $retval ) {
            die('Could not get data: ' . mysqli_error());
         }
         $row = mysqli_fetch_array($retval, MYSQLI_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'page'} ) ) {
            $page = $_GET['page'] + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql ="SELECT *, @ab:=@ab+1 AS SrNo FROM student_user, (SELECT @ab:= 0)
         AS ab  JOIN data_uploads 
         WHERE student_user.enrollNo = data_uploads.enrollNo  AND isApproved =1"."LIMIT $offset, $rec_limit";
            
        //  $retval = mysqli_query( $sql, $conn );
        $retval = $conn->query($sql);   
         
         if(! $retval ) {
            // die('Could not get data: ' . mysql_error($sql));
            echo "0 Approved"; 
            $conn->close();
         }
         
         while($row = $retval->fetch_assoc()) {
            echo "EMP ID :{$row['id']}  <br> ".
               "EMP NAME : {$row['name']} <br> ".
               "EMP SALARY : {$row['email']} <br> ".

               "--------------------------------<br>";
         }
         
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
         }
         
         mysql_close($conn);
      ?>
      
   </body>
</html>