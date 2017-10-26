<?php  
	session_start();

	if(isset($_SESSION['email'])){
		echo $_SESSION['email'];
		if ($_SESSION['email'] == "admin@gmail.com") {
			// echo 	'<script>alert("dashboard");</script>';
			header("location:pages/admin/dashboard.php");		
		}else{
			header("location:pages/home.php");	
		}
	}else{
		header("location:pages/home.php");
	}

?>