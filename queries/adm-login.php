<?php
		include "../config/dbConfig.php";
		session_start();
		if(isset($_POST['login']))
		{
			$username=$_POST['uid'];
			$password=$_POST['pwd'];
			
			$sql="SELECT * FROM admin_table WHERE uid='$username' AND pwd='$password'";
			$sqli_run=mysqli_query($conn,$sql);
			if(mysqli_num_rows($sqli_run)>0)
			{
				$row = $sqli_run->fetch_assoc();
				$_SESSION['uid']=$username;
				$accessLevel=$row['access_lvl'];
				echo $accessLevel;
					if ($accessLevel==1){
						// echo "Access level: '$accessLevel'";
						header("location:AHOME");

					}else{
						header("location:AHOME");
					}  
			}		           
        
		  /*For popup window and to redirect to login page*/
                
             echo   '<script type="text/javascript"> 
                        alert("Wrong Credentials.. Try again!!!"); 
                        window.location.href = "ADMIN";
                        </script>';
			
				mysqli_close($conn);
		}
		?>