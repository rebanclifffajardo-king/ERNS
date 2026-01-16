<?php
 session_start();
require_once("../db/databaseConnection.php");
 $user_name =$_POST['user_name'];
 $password =$_POST['password'];
//  $user_name ="ctet";
// $password ="ctet";
 $sql= "select * from emptbl where username='$user_name' and password='$password' ";
 $result=mysql_query($sql);
 if(mysql_num_rows($result)>0){
	 	while($row = mysql_fetch_array($result)){
			$name= $row['fname']." ".$row['mname']." ".$row['lname'];
			$transaction= "Logged to the system";
			$datetoday =  date('Y-m-d H:i:s');
		$sql = mysql_query("INSERT INTO activitylog  (username,name,transaction,date_) VALUES ('$user_name','$name','$transaction','$datetoday')");
  
	}
	 echo "Login Success";
	
 }else{
	 echo "Invalid Account";
 }
 
 ?>