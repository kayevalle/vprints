<?php  
	include 'dbcon.php';
	session_start();
	if(isset($_POST['saveProfile'])){
		$userid = $_POST['user_id'];
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$mobile = $_POST['mobile'];
		$oldpassword = $_POST['oldpassword'];
		$newpassword = $_POST['newpassword'];
		$update = false;
		

		$resultpass = mysql_query("SELECT * FROM user_table WHERE user_id = '$userid'");
		$password = mysql_fetch_object($resultpass) -> password;

		 //if(  ($oldpassword == $password && $newpassword != null)){
		 if( $fname != null || $lname != null){
		 	$update = mysql_query("UPDATE user_information_table SET firstname = '$fname', lastname = '$lname', `mobile` = '$mobile' WHERE user_id = '$userid'");
		 	// echo '<script>alert("update new");</script>';
		 }
		 // echo '<script>alert("'.$lname.'");</script>';

		 if($oldpassword == $password && $newpassword != null){
		 $changepass = mysql_query("UPDATE user_table SET password = '$newpassword' WHERE user_id = '$userid'");
		 //	echo '<script>alert("update new");</script>';
		 }

		
		 header("location: ".$_SESSION['url']);


	}
?>