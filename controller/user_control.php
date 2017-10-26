<?php  
	include 'dbcon.php';
	session_start();

	if (isset($_GET['remove'])) {
		if(mysql_query("DELETE FROM user_table WHERE user_id =".$_GET['id'])){
			header("location:".$_SESSION["url"]);
		}
		
	}
	
?>