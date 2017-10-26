<?php  
  include '../controller/dbcon.php'; 
  session_start();
 $email = $_SESSION['email'];
 
    //$user_id = $_SESSION['id'];
    $password = $_SESSION['password'];
    $select = mysql_query("SELECT * FROM user_information_table info, user_table user WHERE info.email = '$email' and info.user_id = user.user_id");
    $user = mysql_num_rows($select);
    
    while($fetch = mysql_fetch_object($select)){
        $user_id = $fetch -> user_id;
        $firstname = $fetch -> firstname;
        $address = $fetch -> address;
        $barangay = $fetch -> barangay;
        $municipality = $fetch -> municipality;
        $province = $fetch -> province;
        $mobile = $fetch -> mobile;
        $lastname = $fetch -> lastname;
        $currentpassword = $fetch -> password;

    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<?php include 'parts/head.php'; ?>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"> -->
  <style>
    
    .section{
      min-height: 480px;
    }
    .nav-tabs>li>label
{
    display: inline-block;
    padding: 1em;
    margin: 0;
    border: 1px solid transparent;
    cursor: pointer;
}
.nav-tabs>li.active>label
{
    cursor: default;
    border-color: #ddd;
    border-bottom-color: white;
}

  </style>
</head>
<body class="ecommerce">


<?php include 'parts/header.php'; ?>

<div class="wrapper">

<div class="space-100"></div>
	<div class="section">
        <div class="container">
               <h2 class="section-title">Checkout</h2>
            <div class="row">
               	<div class="col-lg-8">
               		<div class="panel panel-default" id="step1">
               			<div class="panel-heading">
               				Delivery
               			</div>
               			<div class="panel-body">
               				<form data-toggle="validator" method="post" action="../controller/checkout.php?action=checkout" role="form" id="checkoutstep1" onsubmit="checkedout();">
               				<input type="hidden" name="total_price" value="<?php echo $_SESSION["total"]; ?>">
               				<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
          
					          <div class="col-sm-12">
					            <h5>Delivery Address</h5>
					          </div>
					          <div class="row">
					            <div class="form-group col-lg-6">
					              <label for="inputfirstname">Firstname</label>
					              <input type="text" name="firstname" class="form-control" value="<?php echo $firstname ?>" id="inputfirstname" data-error="Please enter first name" required>
					              <div class="help-block with-errors"></div>
					            </div>
					            <div class="form-group col-lg-6">
					              <label for="inputlastname">Lastname</label>
					              <input type="text" name="lastname" class="form-control" value="<?php echo $lastname ?>"  id="inputlastname" data-error="Please enter last name" required>
					              <div class="help-block with-errors"></div>
					            </div>
					            </div>
					            <div class="row">
					            <div class="form-group col-lg-6">
					              <label for="inputaddress">Address (House No., Bldg and St. Name)</label>
					              <input type="text" name="address" class="form-control" value="<?php echo $address ?>"  id="inputaddress" data-error="Please enter address information" required>
					              <div class="help-block with-errors"></div>
					            </div>
					            <div class="form-group col-lg-6">
					              <label for="inputbarangay">Barangay</label>
					              <input type="text" name="barangay" class="form-control" value="<?php echo $barangay ?>"  id="inputbarangay" data-error="Please enter barangay" required>
					              <div class="help-block with-errors"></div>
					            </div>
					            </div>
					            <div class="row">
					            <div class="form-group col-lg-6">
					              <label for="inputmunicipality">City/Municipality</label>
					              <input type="text" name="municipality" class="form-control" value="<?php echo $municipality ?>"  id="inputmunicipality" data-error="Please enter city / municipality" required>
					              <div class="help-block with-errors"></div>
					            </div>
					            <div class="form-group col-lg-6">
					              <label for="inputprovince">Province</label>
					              <input type="text" name="province" class="form-control" value="<?php echo $province ?>"  id="inputprovince" data-error="Please enter province" required>
					              <div class="help-block with-errors"></div>
					            </div>
									
					            <div class="form-group col-lg-6">
					              <label for="mobile">Mobile</label>
					              <input type="text" name="mobile" class="form-control" value="<?php echo $mobile ?>"  id="mobile" data-error="Please enter mobile" required>
					              <div class="help-block with-errors"></div>
					            </div>
					        	<?php if (!isset($_SESSION["email"])): ?>
					            <div class="form-group col-lg-6">
					              <label for="email">Email</label>
					              <input type="text" name="email" class="form-control" value="<?php echo $email ?>"  id="email" data-error="Please enter email" required>
					              <div class="help-block with-errors"></div>
					            </div>

								<?php endif ?>
					            </div>

					            <div class="col s12" style="margin-bottom: 20px;font-size: 12px">*all fields required</div>
					            <!-- <div class="form-group">
					              <button type="submit" class="btn teal">Next Step: Billing Details</button>
					            </div> -->
					            
               			</div>
               		</div>
               		<div class="panel panel-default" id="step2">
               			<div class="panel-heading">
               				Payment
               			</div>
               			<div class="panel-body">
               				<div data-tabs="tabs" id="tabs" style="display: inline;">
							    <label class="radio radio-azure" data-target="#cashcod">

							        <input type="radio" name="paymentmethod" data-toggle="radio" id="cod" value="cod"  onclick="$(this).closest('label').tab('show');" checked>

							        <i></i>Cash on Delivery 

							    </label>
							        <label class="radio radio-azure">

							        <input type="radio" name="paymentmethod" data-toggle="radio" id="bank" value="bank">

							        <i></i>Bank Deposit

							    </label>
							     <label class="radio radio-azure">

							        <input type="radio" name="paymentmethod" data-toggle="radio" id="creditcard" value="creditcard">

							        <i></i>Credit Card

							    </label>
                  
				                  <!-- <input type="radio" name="paymentmethod" id="cod" class="with-gap" value="cod" checked>
				                  <label for="cod" data-target="#cashcod" onclick="$(this).tab('show');">Cash on Delivery</label>
				                  
				                  <input type="radio" id="bank" class="with-gap" value="bank">
				                  <label for="bank" data-target="#bankDeposit" onclick="$(this).tab('show');">Bank Deposit</label>
				                  <input type="radio" id="creditcard" class="with-gap" value="creditcard">
				                  <label for="creditcard" data-target="#credit" onclick="$(this).tab('show');">Credit Card</label> -->
				              
				            </div>
               				<div class="tab-content">
			                <div class="tab-pane fade in" id="cashcod">COD</div>
			                <div class="tab-pane fade" id="bankDeposit">
			                  	<div class="panel">
			                      	<div class="form-group col-lg-6">
			                        <h5>Bank Details</h5>
			                          <div class="form-group col-lg-12">
			                            <p>Account Name:<b>vprints</b></p>
			                          </div>   
			                          <div class="form-group col-lg-12">
			                            <p>Account Number:<b>2345678901</b> </p>
			                          </div>          
			                        </div>
			                  	</div>
			                </div>
               				<div class="tab-pane fade" id="credit">
			                  
			                <div class="form-group col-lg-6">
			                      <div class="form-group input-field col-lg-12">
			                        <label for="accountname">Account Name</label>
			                        <input type="text" name="accountname" id="accountname" class="form-control">
			                      </div>   
			                      <div class="form-group input-field col-lg-7">
			                        <label for="accountnumber">Account Number</label>
			                        <input type="text" name="accountnumber" id="accountnumber" maxlength="16" class="form-control">

			                      </div>
			                      <div class="col-lg-1">
			                      	<label for="dash"></label><p id="dash" class="form-control-static">-</p>
			                      </div>
			                      <div class="form-group input-field col-lg-3">
			                        <label for="security" class="right"></label>
			                        <input type="text" name="security" id="security" class="form-control">
			                      </div>        
			                      <div class="col s1">
			                        <label for="tip"></label>
			                        <i class="fa fa-question-circle" id="tip" data-toggle="tooltip" data-placement="top" title="Go to Cart"></i>
			                      </div>   
			                </div>
			                </div>
               				</div>
               					<!-- <div class="form-group" style="margin-top:20px;">
					              <button type="submit" class="btn teal">Next Step: Order Preview</button>
					            </div> -->
               			</div>
               		</div>
               	

               	</div>
               	<div class="col-lg-4">
               		<div class="panel panel-default">
               			<div class="panel-body">
               				<h3>Summary</h3>
               				<hr>
               				<p>Subtotal: <?php echo $price_total; ?></p>
               				<p>Items: <?php echo $_SESSION["item_total"] = $item_total; ?></p>
               				<p>Total: <?php echo $price_total; ?></p>
               				<div>
               					<h4>In Cart</h4>
					          <?php foreach ($_SESSION["cart"] as $item): ?>
					            <div class="row">
					              <div class="col-lg-7">
					                <p><?php echo $item['name']; ?></p>
					              </div>
					              <div class="col-lg-1">
					                <p><?php echo $item['size']; ?></p>
					              </div>
					              <div class="col-lg-1">
					                <p>x<?php echo $item['qty']; ?></p>
					              </div>
					              <div class="col-lg-2">
					                <p>P<?php echo $item['price']; ?></p>
					              </div>
					            </div>
					          <?php endforeach ?>               					
               				</div>
               			
               					<div class="form-group text-center" style="margin-top: 20px">
					              <button type="submit" class="btn btn-fill btn-info col-lg-12">Purchase Order</button>
					            </div>
               		</form>
               			</div>
               		</div>
            </div> <!-- end of row -->
        </div>	
    </div><!-- section -->
    <!-- <div class="space-100"></div> -->

</div> <!-- end wrapper -->


<?php include 'parts/footer.php'; ?>
<?php include 'parts/allscripts.php'; ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> -->
<script>
	// $('input[name="paymentmethod"]').click(function () {
	// 	    $(this).closest('label').tab('show');
	// 	});
</script>
</body>
</html>


<script type="text/javascript">
	function getCategory(categoryId){

		location.href = "products.php?categoryId="+categoryId;
	}

	function checkedout(){
		swal({
		  title: 'check out!',
		  timer: 2000,
		  type: 'success',
		}).then(
		  function () {},
		  // handling the promise rejection
		  function (dismiss) {
		    if (dismiss === 'timer') {
		      console.log('I was closed by the timer')
		    }
		  }
		)
	}

</script>