<?php
//connection for Localhost 
$conn=mysqli_connect('localhost','root','','nknwifi'); 

//connection for cloud server
// $conn=mysqli_connect('localhost','ausnknadmin','xg5mt+y3CP9G','nknwifi'); 

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
// echo"Db Connected Successfully";
// echo "<br>";
mysqli_select_db($conn,"nknwifi");
?>