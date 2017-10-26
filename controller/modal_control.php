<?php  
	include 'dbcon.php';
	
	if ($_POST['edit']) {
		
		switch ($_POST['edit']) {
			case 'product':
				$fetch = mysql_query("SELECT * FROM product_table p,category_table c WHERE product_id = ".$_POST['id']);

				$result = mysql_fetch_assoc($fetch);
				
				echo json_encode($result);
				break;
			
			default:
				# code...
				break;
		}


	}

	if($_POST["delete"]){
		switch ($_POST["delete"]) {
			case 'product':
				$fetch = mysql_query("SELECT * FROM product_table WHERE product_id = ".$_POST['id']);
				break;
			
			default:
				# code...
				break;
		}
	}
?>

