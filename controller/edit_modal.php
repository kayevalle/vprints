<?php  
	include 'dbcon.php';
	session_start();
	
	if ($_POST['edit']) {
		
		switch ($_POST['edit']) {
			case 'product':
				$fetch = mysql_query("SELECT * FROM product_table p,category_table c WHERE p.product_id = ".$_POST['id']." AND p.category_id = c.category_id");

				$result = mysql_fetch_assoc($fetch);
				
				echo json_encode($result);
				break;
			
			default:
				# code...
				break;
		}


	}
?>


