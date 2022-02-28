<?php
//$conn=mysqli_connect('localhost','ausnknadmin','xg5mt+y3CP9G','nknwifi'); discarded after the breach

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
echo"Db Connected Successfully";
echo "<br>";
mysqli_select_db($conn,"nknwifi");
?>