<?php  
	include 'dbcon.php';
	session_start();

	if (isset($_GET['remove'])) {
		if(mysql_query("DELETE FROM product_table WHERE product_id =".$_GET['id'])){
			header("location:".$_SESSION["url"]);
		}
		
	}

	if($_POST["edit"]){

		switch ($_POST["edit"]) {
			case 'product':
				$product_price = $_POST["product_price"];
				$product_qty = $_POST["product_qty"];
				$product_id = $_POST["product_id"];
				mysql_query("UPDATE product_table SET product_price = '$product_price', product_qty = '$product_qty' WHERE product_id = '$product_id'");
				header("location:".$_SESSION["url"]);
				break;
			
			default:
				# code...
				break;
		}
	}

	if($_POST["update"]){

		switch ($_POST["update"]) {
			case 'product':
				$product_price = $_POST["product_price"];
				$product_qty = $_POST["product_qty"];
				$product_id = $_POST["product_id"];
				mysql_query("UPDATE product_table SET product_qty = '$product_qty' WHERE product_id = '$product_id'");
				header("location:".$_SESSION["url"]);
				break;
			
			default:
				# code...
				break;
		}
	}

	if ($_POST['pass']) {
				switch ($_POST['pass']) {
					case 'stats':
							$id = $_POST['id'];
							$status = $_POST['status'];

							echo mysql_query("UPDATE transaction_table SET `status` = '$status' WHERE `id` = '$id'");
						break;
					
					default:
						# code...
						break;
				}
		}	
?>