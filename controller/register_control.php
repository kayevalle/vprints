<?php  
	include 'dbcon.php';


	if($_POST){
		$regUsername = $_POST['regUsername'];
		$regEmail = $_POST['regEmail'];
		$regPassword = $_POST['regPassword'];
		
		$registerUser = mysql_query("INSERT INTO user_table(`email`,`password`,`user_type`) VALUES('$regEmail','$regPassword','2');");

		$select = mysql_query("SELECT `user_id` FROM user_table WHERE email = '$regEmail'");
		$userid = mysql_fetch_assoc($select);
		$id = $userid["user_id"];
		//echo $id;
		$registerInfo = mysql_query("INSERT INTO user_information_table(`user_id`,`email`) VALUES('$id','$regEmail');");
		

		echo $registerUser." ".$registerInfo;
}
	
?>