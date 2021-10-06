<?php

// turn on error reporting
  // error_reporting(1);
  // ini_set('error_reporting', E_ALL);

// start session
session_start();

if ($_SESSION["uid"] == null){

    header("location:../index.html");
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

<!DOCTYPE html>
<html>
<head>
<title>NKN Wifi</title>
    <link rel="shortcut icon" href="../resources/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
</head>
<body align>
    <!-- Navigation bar for navstyle2.css -->
<div class="topnav">
  <a class="active" href="index.html">Home</a>
  <!-- <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a> -->
  <a style="float:right" href="../api/logout.php">Logout</a>
</div>
 <!-- Navigation bar for navstyle2.css ends here -->
           
        <div class=center-image>
            <img src="../resources/logo.png" alt="Varsity Logo">  
            <h2 align="center">NKN-Internet Access Registered Applicants</h2>
          </div>

          <div align='right'>
            <button class='less-space' style='margin-right: 20px;' onclick="location.href='adm-search.php'">Check Application Status</button>
          </div>


<div class='center-container'>
  <div class="center-content">    
    <button style="width: 300px;" onclick="location.href='student-pending.php'">For Students</button> 
</div>

    <br><br>

<div class="center-content">
    <button style="width: 300px;" onclick="location.href='staff-pending.php'">For Teaching / Non Teaching Staff Members</button>
</div>
</div>
    






<div class="footer">
  <p>Copyright &copy Assam University, Silchar, Cachar, Assam</p>
</div>

</body>

<script text="text/javascript" src="js/functions.js"></script>

</html>
