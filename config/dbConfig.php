<?php
// $conn=mysqli_connect('localhost','ausnknwifi','M9GrbeyJXDFXr`[p','nknwifi');
$conn=mysqli_connect('localhost','root','','nknwifi');

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
// echo"Db Connected Successfully";
// echo "<br>";
mysqli_select_db($conn,"nknwifi");
?>