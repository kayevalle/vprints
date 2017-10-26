<?php  
  include 'dbcon.php'; 
  session_start();

  $email = $_SESSION['email'];
  $user = mysql_query("SELECT * FROM user_table u, user_type t WHERE u.email = '$email' and u.user_type = t.id");
  $userinfo = mysql_fetch_assoc($user);
  $user_id = $userinfo["user_id"];
  $user_type = $userinfo["type"];

  echo $user_id;
  echo $_GET['action'];
  if($user_type == null){
  	$user_type = "guest";
  //	echo $user_type;
  }
  if(isset($_GET['action'])){
  	switch ($user_type) {
  		case 'user':
  		echo $user_type;
          $user_id = $_POST["user_id"];
          $firstname = $_POST["firstname"];
          $lastname = $_POST["lastname"];
          $address = $_POST["address"];
          $barangay = $_POST["barangay"];
          $municipality = $_POST["municipality"];
          $province = $_POST["province"];
          $mobile = $_POST["mobile"];
          $email = $_POST["email"];
          $total_price = $_POST["total_price"];
          $status = "to be delivered";
          echo $user_id."<br>".$firstname."<br>".$lastname."<br>".$address."<br>".$barangay."<br>".$municipality."<br>".$province."<br>".$mobile."<br>".$email."<br>";
          $info = mysql_query("INSERT INTO `transaction_table` (`user_id`,`firstname`,`lastname`,`address`,`barangay`,`municipality`,`province`,`mobile`,`email`,`paymentmethod`,`total_price`,`status`,`date_created`,`date_updated`) VALUES('$user_id','$firstname','$lastname','$address','$barangay','$municipality','$province','$mobile','$email','cash','$total_price','$status',NOW(),NOW())");

  				// 	$trans = mysql_query("INSERT INTO transaction_table (`user_id`,`status`,`date_created`,`date_updated`) VALUES('$user_id','status',NOW(),NOW())");
  					$transFetch = mysql_query("SELECT * FROM transaction_table WHERE `user_id` = '$user_id' ORDER BY `transaction_table`.`user_id` ASC LIMIT 1");
  					$transac = mysql_fetch_assoc($transFetch);
  					$trans_id = $transac["id"];
  				foreach ($_SESSION["cart"] as $items) {
  					$product_id = $items["id"];
  					$product_qty = $items["qty"];
  					$orders = mysql_query("INSERT INTO order_table (`user_id`,`trans_id`,`product_id`,`qty`) VALUES('$user_id','$trans_id','$product_id','$product_qty')");
  					$update = mysql_query("UPDATE product_table SET product_qty = product_qty - 1 WHERE product_id = '$product_id'");
  				}
          //echo "<script>alert('transaction_table: '".$trans."' order_table: '".$orders."' info: '".$info.")</script>";
          echo "<script>alert('transaction_table: ".$trans." order_table: ".$orders." info: ".$info."')</script>";
          unset($_SESSION["cart"]);
               $fromemail = "no-reply@vprints.x10host.com:";
               $to = $_SESSION["email"];
               $subject = "Transaction Details";
               $body = "Transaction Summary". "\r\n";
               $body .= "Total Items: ".strip_tags($_SESSION["item_total"]);
               $body .= "\r\n"."Total Price: P".strip_tags($_POST["total_price"]);
               $headers = "From: Vprints <".strip_tags($fromemail).">";
               if (mail($to, $subject, $body,$headers)) {
                 echo("<p>Message successfully sent!</p>");
                } else {
                 echo("<p>Message delivery failed...</p>");
                }
          header("location: ../pages/products.php");
  			break;
  		case 'guest':
  		echo $user_type;
          $firstname = $_POST["firstname"];
          $lastname = $_POST["lastname"];
          $address = $_POST["address"];
          $barangay = $_POST["barangay"];
          $municipality = $_POST["municipality"];
          $province = $_POST["province"];
          $mobile = $_POST["mobile"];
          $guestemail = $_POST["email"];
          $total_price = $_POST["total_price"];
          $info = mysql_query("INSERT INTO transaction_table (`user_id`,`firstname`,`lastname`,`address`,`barangay`,`municipality`,`province`,`mobile`,`email`,`paymentmethod`,`total_price`,`status`,`date_created`,`date_updated`) VALUES('2','$firstname','$lastname','$address','$barangay','$municipality','$province','$mobile','$guestemail','cash','$total_price','status',NOW(),NOW())");

  				// $trans = mysql_query("INSERT INTO transaction_table (`user_id`,`paymentmethod`,`status`,`date_created`,`date_updated`) VALUES('2','cash','status',NOW(),NOW())");
  					$transFetch = mysql_query("SELECT * FROM transaction_table WHERE `user_id` = '2' ORDER BY `transaction_table`.`user_id` ASC LIMIT 1");
  					$transac = mysql_fetch_assoc($transFetch);
  					$trans_id = $transac["id"];
  				foreach ($_SESSION["cart"] as $items) {
  					$product_id = $items["id"];
  					$product_qty = $items["qty"];
  					$orders = mysql_query("INSERT INTO order_table (`user_id`,`trans_id`,`product_id`,`qty`) VALUES('2','$trans_id','$product_id','$product_qty')");
  					$update = mysql_query("UPDATE product_table SET product_qty = product_qty - $product_qty WHERE product_id = '$product_id'");
  					
  				}
  			//echo "transaction_table: ".$trans." order_table: ".$orders." info: ".$info;
        unset($_SESSION["cart"]);
               $fromemail = "no-reply@vprints.x10host.com:";
               $to = $_SESSION["email"];
               $subject = "Transaction Details";
               $body = "Transaction Summary". "\r\n";
               $body .= "Total Items: ".strip_tags($_SESSION["item_total"]);
               $body .= "\r\n"."Total Price: P".strip_tags($_POST["total_price"]);
               $headers = "From: Vprints <".strip_tags($fromemail).">";
               if (mail($to, $subject, $body,$headers)) {
                 echo("<p>Message successfully sent!</p>");
                } else {
                 echo("<p>Message delivery failed...</p>");
                }
  				 header("location: ../pages/products.php");
  			break;
  		case 'admin':
  		// echo $user_type;
  			break;
  		
  	}
  }

?>