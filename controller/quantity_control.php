<?php  

include 'dbcon.php';
session_start();
	$name = $_POST["name"];
	$size = $_POST["size"];

	$select = mysql_query("SELECT * FROM product_table WHERE product_name = '$name' and product_size = '$size'");

	if(mysql_num_rows($select) >= 1){
		$fetch = mysql_fetch_assoc($select);
		echo $fetch["product_qty"];
	}else{
		echo "error";
	}

?>