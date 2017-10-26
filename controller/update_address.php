<?php  
	include 'dbcon.php';
	session_start();

	echo "dumaan";

	if ($_POST["update"]) {
	  $userid = $_POST['user_id'];
      $address = $_POST["address"];
      $barangay = $_POST["barangay"];
      $province = $_POST["province"];
      $municipality = $_POST["municipality"];
      $province = $_POST["province"];

      $resultpass = mysql_query("SELECT * FROM user_table WHERE user_id = '$userid'");

      $update = mysql_query("UPDATE `user_information_table` SET `address` = '$address',`barangay` = '$barangay',`municipality` = '$municipality', `province` = '$province' WHERE `user_id` = '$userid' ");

      echo $update;

	}
?>