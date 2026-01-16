<?php
session_start();
require_once("../db/databaseConnection.php");


$username=$_POST['username'];
$password=$_POST['password'];
  
 
 

$searchID=mysql_query("SELECT *  FROM emptbl WHERE username='$username' and password='$password'");
			$numrow = mysql_num_rows($searchID);
			if($numrow>0){
				$row = mysql_fetch_array($searchID);
							$position= $row['position'];
							$_SESSION['position'] = $position;
						 
							$_SESSION['username'] = $username;
							$_SESSION['password'] = $password;
						 
							echo "success";
							
			}
			else{
			echo "invalid";
				
							
				 
				
			}
		 
			
			 
			


								

								
?>