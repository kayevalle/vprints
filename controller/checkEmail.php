<?php  
	include 'dbcon.php';

	if(isset($_POST['email'])){
		$email = $_POST['email'];

		$checkEmail = mysql_query("SELECT email FROM user_table WHERE email = '$email'");
		$fetchrow = mysql_num_rows($checkEmail);

		if($fetchrow >= 1){
			echo 'found';
		}else{
			echo 'no match';
		}
	}
?>