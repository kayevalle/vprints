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
    $transaction = mysql_query("SELECT * FROM `transaction_table` WHERE `user_id` = '$user_id'");
                                  
                                     
                                  
                               // echo $transaction;
                             
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'parts/head.php'; ?>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"> -->
  <style>
    
    .section{
      min-height: 480px;
    }
  </style>
</head>
<body class="ecommerce">


<?php include 'parts/header.php'; ?>

<div class="wrapper">

<div class="space-100"></div>
	    <div class="section">
           <div class="container">
               <h2 class="section-title">My Account</h2>
               <div class="row">

                                    <div class="col-md-3">
                        <div class="card card-refine card-plain">
                            <div class="header">
                            </div>
                            <div class="content">
                                  <div class="panel-group">

                                  <ul class="nav">
                                    <li><a href="#edit_account" data-toggle="tab">Edit Account</a></li>
                                    <li><a href="#address" data-toggle="tab">Address</a></li>
                                    <li><a href="#transactions" data-toggle="tab">Transactions</a></li>
                                  </ul>



                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col-md-3 -->

                    <div class="col-md-9">
                        <div class="row">
                          <div class="tab-content">
                            <div class="tab-pane fade in active" id="edit_account">
                               <div class="col-lg-12" style="margin-bottom: 30px">
                               <form method="post" action="../controller/updateProfile_control.php">
                              <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                   <div class="form-group">
                                       <label for="email" class="control-label">Email Address</label>
                                       <!-- <input type="text" id="email" name="email" value="email" class="form-control"> -->
                                       <p class="form-control-static"><?php echo $email ?></p>
                                   </div>
                                   <div class="form-group">
                                       <label for="firstname">First Name </label>
                                       <input type="text" id="firstname" name="firstname" value="<?php echo $firstname ?>" class="form-control" placeholder="firstname">
                                   </div>
                                   <div class="form-group">
                                       <label for="lastname">Last Name</label>
                                       <input type="text" id="lastname" name="lastname" value="<?php echo $lastname ?>" class="form-control" placeholder="lastname">
                                   </div>
                                   <div class="form-group">
                                       <label for="mobile">Mobile</label>
                                       <input type="text" id="mobile" name="mobile" value="<?php echo $mobile ?>" class="form-control" placeholder="mobile">
                                   </div>
                                    
                                    <h5 class="title">Change Password</h5>

                                   <div class="form-group">
                                       <label for="oldpassword">Old Password</label>
                                       <input type="text" id="oldpassword" name="oldpassword" class="form-control" placeholder="old password">
                                   </div>
                                   <label for="password">New Password</label>
                                       <input type="text" id="password" name="newpassword" class="form-control" placeholder="new password">
                                    <div class="form-group" style="margin-top: 30px">
                                    <input type="submit" class="btn btn-fill text-center" name="saveProfile" value="Save" style="width: 250px">

                                    </div>
                                    </form>
                               </div>
                            </div>
                            <div class="tab-pane fade" id="address">
                              
          
                              <div class="col-sm-12">
                                <h5>Delivery Address</h5>
                              </div>
                              <div class="row">
                                <form method="post" action="../controller/update_address.php">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-6">
                                  <label for="inputaddress">Address (House No., Bldg and St. Name)</label>
                                  <input type="text" name="address" class="form-control" id="inputaddress" value="<?php echo $address ?>" data-error="Please enter address information" required>
                                  <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                  <label for="inputbarangay">Barangay</label>
                                  <input type="text" name="barangay" class="form-control" id="inputbarangay" value="<?php echo $barangay ?>" data-error="Please enter barangay" required>
                                  <div class="help-block with-errors"></div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-lg-6">
                                  <label for="inputmunicipality">City/Municipality</label>
                                  <input type="text" name="municipality" class="form-control" id="inputmunicipality" value="<?php echo $municipality ?>" data-error="Please enter city / municipality" required>
                                  <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                  <label for="inputprovince">Province</label>
                                  <input type="text" name="province" class="form-control" id="inputprovince" value="<?php echo $province ?>" data-error="Please enter province" required>
                                  <div class="help-block with-errors"></div>
                                </div>
                                
                                </div>

                                <div class="col s12" style="margin-bottom: 20px;font-size: 12px">*all fields required</div>
                                <div class="form-group">
                                  <input type="submit" name="update" class="btn teal" value="Update Address">
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="transactions">
                               
                                <table class="table">

                                <thead>

                                    <tr>

                                        <th class="text-center">#</th>

                                        <th>Address</th>

                                        <th>Payment Method</th>

                                        <th>Status</th>
                                        <th>Total Price</th>
                                    </tr>

                                </thead>

                                <tbody>
                                  <?php while($trans = mysql_fetch_assoc($transaction)){ ?>
                                    <tr>

                                        <td class="text-center"><?php echo $trans["id"] ?></td>

                                        <td><?php echo $trans["address"]." ".$trans["barangay"]." ".$trans["municipality"]." ".$trans["province"]; ?></td>

                                        <td><?php echo $trans["paymentmethod"] ?></td>

                                        <td><?php echo $trans["status"] ?></td>

                                        <td class="text-center">P
                                            <?php echo $trans["total_price"] ?>

                                            <!-- <button type="button" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">

                                                <i class="fa fa-user"></i>

                                            </button>

                                            <button type="button" rel="tooltip" title="Edit Profile" class="btn btn-success btn-simple btn-xs">

                                                <i class="fa fa-edit"></i>

                                            </button>

                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">

                                                <i class="fa fa-times"></i>

                                            </button> -->

                                        </td>

                                    </tr>
                                  <?php } ?>
                                </tbody>
                          </table>    
                            </div>
                          </div>
                       

                           

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
</body>
</html>


<script type="text/javascript">
	function getCategory(categoryId){

		location.href = "products.php?categoryId="+categoryId;
	}
</script>