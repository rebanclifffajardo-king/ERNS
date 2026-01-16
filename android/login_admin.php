<?php
session_start();
require_once("../db/databaseConnection.php");
 
 $user_name =$_POST['user_name'];
 $password =$_POST['password'];
 // $user_name ="jhon";
 //$password ="jhon";
 $sql= "select * from usertbl where username='$user_name' and password='$password'";
 $result=mysql_query($sql);
 if(mysql_num_rows($result)>0){
	 echo "Login Success";
	 
 }else{
	 echo "Invalid Account";
 }
 
 ?>
