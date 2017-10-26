<?php  
	include 'dbcon.php';

	if(isset($_POST['password'])){
		$password = $_POST['password'];

		$checkPassword = mysql_query("SELECT password FROM user_table WHERE password = '$password'");
		$fetchrow = mysql_num_rows($checkPassword);

		if($fetchrow >= 1){
			echo 'found';
		}else{
			echo 'no match';
		}
	}

?>