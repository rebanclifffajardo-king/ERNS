<?php
session_start();
require_once("db/databaseConnection.php");

	$userID = $_SESSION['user'];
	if(isset($_POST['selectBtn'])){
	
	$sid ="";
	$sbook = $_POST['sb'];
	
	$searchID=mysql_query("SELECT book_id FROM books WHERE bookname='$sbook'");
			$row = mysql_fetch_array($searchID);
			$sid = $row['book_id'];

	if($sbook<>""){
		//echo $sbook ;
		//echo "<br/>".$sid ;
		//echo "<br/>".$userID ;
		$update = "DELETE FROM tempborrow where userID='$userID'";
				mysql_query($update);	
		$save_ = "INSERT INTO tempborrow(userID,book_id) 
					VALUES('$userID','$sid')";
		
		if (mysql_query($save_)){
			header("location: libsys_borrow_details.php");
			//echo "added";
		}
		else{
			//echo "not added";
			header("location: libsys_index.php");
		}
		
		
		header("location: libsys_borrow_details.php");
		
	}
	else{
		header("location: libsys_index.php");
	}
	
	
}
else{
		header("location: libsys_index.php");
	}
	




?>