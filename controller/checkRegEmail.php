<?php 
	include 'dbcon.php';

	if(isset($_POST['regEmail'])){
		$email = $_POST['regEmail'];

		$checkRegEmail = mysql_query("SELECT email FROM user_table WHERE email = '$email'");
		$fetchrow = mysql_num_rows($checkRegEmail);
		// echo $fetchrow;
		if($fetchrow >= 1){
			echo 'found';
		}else{
			echo 'no match';
		}
	}
?>