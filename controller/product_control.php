<?php 
	include 'dbcon.php';
	session_start();
	


	if (isset($_POST['add'])) {
			$pname = ucwords($_POST['name']);
			$pcategory = $_POST['category_name'];
			$pquantity = $_POST['quantity'];
			$pprice = $_POST['price'];
			$psize = ucfirst($_POST['size']);
			//$target_path = "../img/".basename($_FILES["image"]["name"]);
		

			//echo $pname."<br>".$pcategory."<br>".$pquantity."<br>".$pprice."<br>".$psize."<br>".$target_path;
		switch ($_POST['add']) {
			case 'add':
					$name = mysql_fetch_assoc(mysql_query("SELECT * FROM category_table WHERE category_id = '$pcategory'"));
					$target_path = basename($_FILES["image"]["name"]);
//					$dest_path = "../img/shirts/".lcfirst($name["category_name"])."/".;
					$pimage = "../img/shirts/".lcfirst($name["category_name"])."/".$target_path;
					if (move_uploaded_file($_FILES["image"]["tmp_name"], $pimage)){
							
							if (mysql_query("INSERT INTO `product_table`(`product_name`, `product_price`, `product_qty`,`product_image`, `category_id`,`product_size`) VALUES('$pname','$pprice','$pquantity', '$pimage', '$pcategory', '$psize')")) {
								$_SESSION['error'] = false;
								echo $alert = '<script>alert("Successfully added product")</script>';
								if($alert){header('Location:'.$_SESSION['url']);}
							}else{
								$_SESSION['error'] = true;
								header('Location:'.$_SESSION['url']);
							}

						}else{
							$_SESSION['error'] = true;
							header('Location:'.$_SESSION['url']);
						}

				break;
			default:
				# code...
				break;
		}
	}


?>



