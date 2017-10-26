<?php 
	include 'dbcon.php';
	
	session_start();
	// echo '<script>alert('.$_GET['action'].');</script>';
	// echo $_GET['action'];
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {

			case 'add':
					if(isset($_POST['product_size'])){
						$product_size = $_POST['product_size'];
						$product_qty = $_POST['product_qty'];
						$product_name = $_POST['product_name'];

						//$fetch  = mysql_query("SELECT * FROM product_table WHERE product_name = '$product_name' and product_size = '$product_size'");
						//echo $fetch["category_id"];
						$fetch  = mysql_query("SELECT * FROM product_table p, category_table c WHERE p.product_name = '$product_name' and p.product_size = '$product_size' and c.category_id = p.category_id");
						
							while($result = mysql_fetch_assoc($fetch)){
								$itemProduct[] = $result;
							}
							
							$itemArray = array($itemProduct[0]["product_id"]=>array('id'=>$itemProduct[0]["product_id"],'name'=>$itemProduct[0]["product_name"],'price'=>$itemProduct[0]["product_price"],'qty'=>$_POST["product_qty"],'image'=>$itemProduct[0]["product_image"],'category'=>$itemProduct[0]["category_id"],'categoryname'=>$itemProduct[0]["category_name"],'size'=>$itemProduct[0]["product_size"]));

								if(!empty($_SESSION["cart"])){

								//final to//
							 	 foreach ($_SESSION["cart"] as $key => $value) {
							 	 	if($itemProduct[0]["product_id"] == $key){
							 	 		echo $_SESSION["cart"][$key]["qty"] += $_POST["product_qty"];
							 	 		header("location:".$_SESSION["url"]);
							 	 		
							 	 	}else{
							 	 		echo $_SESSION["cart"] += $itemArray;
							 	 		header("location:".$_SESSION["url"]);

							 	 	}
							 	 	//end of final//
								}
							 
							}else{
								//$_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray); 
								//echo $itemArray;
								$_SESSION["cart"] = $itemArray;
								header("location:".$_SESSION["url"]);

							}
					}
			break;

			case 'remove':
					if(!empty($_SESSION["cart"])) {
						foreach($_SESSION["cart"] as $k => $v) {
								if($_GET["id"] == $k)
									unset($_SESSION["cart"][$k]);				
								if(empty($_SESSION["cart"]))
									unset($_SESSION["cart"]);
								header("location:".$_SESSION["url"]);
						}
					}
				break;

			case 'empty':
					unset($_SESSION["cart"]);
					header("location:".$_SESSION["url"]);
			break;

			case 'update':
			$fetch = mysql_query("SELECT product_qty FROM product_table WHERE product_id = ".$_POST['id']);
			$max = mysql_fetch_assoc($fetch);
			echo $max;
					if(!empty($_SESSION["cart"])) {
							foreach($_SESSION["cart"] as $k => $v) {
									if($_POST['id'] == $k){
										switch ($_POST['op']){
							        case 'add' : $_SESSION["cart"][$k]['qty'] < $max['product_qty'] ? $_SESSION["cart"][$k]['qty']++ : $_SESSION["cart"][$k]['qty'] = $max['product_qty'];
							       							 

							        break;
							        case 'sub' : $_SESSION["cart"][$k]['qty']>1?$_SESSION["cart"][$k]['qty']--:$_SESSION["cart"][$k]['qty']=1;
							                      break;              
							      }
							      
										//echo $_SESSION["cart"][$k]['qty'];
									}
									
							}
						}
			break;
			case 'updateqty':
				foreach ($_SESSION["cart"] as $key => $value) {
					if($_GET["id"]==$key){
						echo $_SESSION["cart"][$key]["qty"] = $_POST['updated_qty'];
					}

				}
				header('Location:'.$_SESSION['url']);
			break;
		}
	}
	
?>