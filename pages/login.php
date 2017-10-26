<?php  


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php include 'parts/head.php'; ?>
	
	<style type="text/css">
		.row > div{
			/*border:1px solid red;*/
		}
   
	</style>

</head>
<body class="ecommerce">
			<?php include 'parts/header.php'; ?>	

<div class="wrapper">

<div class="space-100"></div>
	<div class="section section-blog">
		<div class="container">
			
		
		<div class="row">

			<div class="col-md-6">
				<div class="card">
					
						<div class="container-fluid">
							<h2>Login</h2>

							<form method="post" action="" role="form" style="margin-top: 35px">
								<div class="form-group">
									<label for="login_email">Email Address</label>
    				    			<input name="login_email" class="form-control" id="login_email" placeholder="Email Address" type="email" onblur="checkEmail();" aria-describedby="emailError">
    				    			<span id="emailError" class="help-block" style="display: none">Account not registered</span>
								</div>
								<div class="form-group">
									<label for="login_password">Password</label>
    				    			<input name="login_password" class="form-control" id="login_password" placeholder="password" type="password">
								</div>
								<div class="submit">
    				  			<input class="btn btn-info btn-fill" value="login" type="button" name="submitb" onclick="loginValidate();">
    				  		</div>
							</form>
						</div>
				
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="container-fluid">
							<h2>Register</h2>

							<form method="" action="" role="form" style="margin-top: 35px">
							<span id="nullError" class="label label-danger label-fill" style="display: none;padding: 10px;margin-bottom: 20px">Incorrect input details</span>
              		<div class="input-field col s12">
								<div class="form-group">
									<label for="register_email">Email Address</label>
    				    			<input name="register_email" class="form-control" id="register_email" placeholder="Email Address" type="email"  onblur="checkRegEmail();" aria-describedby="regEmailError">
    				    			<span id="regEmailError" class="help-block" style="display: none">Email already registered</span>
								</div>
								<div class="form-group">
									<label for="register_password">Password</label>
    				    			<input name="register_password" class="form-control" id="register_password" placeholder="password" type="password">
								</div>
								<div class="form-group">
									<label for="confirm_password">Confirm Password</label>
    				    			<input name="confirm_password" class="form-control" id="confirm_password" placeholder="password" type="password" onkeyup="confirmPassword();" aria-describedby="confirmPassword">
    				    			<span id="confirmPasswordError" class="help-block" style="display: none">Password does not match</span>
								</div>
								<div class="submit">
    				  			<input class="btn btn-info btn-fill" value="Register" type="button" name="registerb" onclick="registerValidate();">
    				  		</div>
							</form>
						</div>
				</div>
			</div>

		</div>
	</div>
	</div> <!-- end categories section -->

</div> <!-- end wrapper -->
<?php include 'parts/footer.php'; ?>
<?php include 'allscripts.php'; ?>




</body>

</html>

<script>
	function loginValidate(){
         
         var  email = $('#login_email').val();
         var  password = $('#login_password').val();

         $.ajax({
          type: "post",
          url: "../controller/login_control.php",
          data:{
            email: email,
            password: password
          },
          success:function(response){
          	//alert(response);
            if(response == "success"){
            //	alert('Login success');
			    swal({
			        title: "Successfully logged in!",
			        type: "success",
			    }).then(function(){

			        window.location.href = "../index.php";
			    });
			    
            }else{
                            swal({
			        title: "Login Failed!",
			        type: "error",
			    }).then(function(){

			        location.reload();
			    });
            }
           }
         });
  
  };

  function checkEmail(){
    var email = $('#login_email').val();
    var errorFound = false;
    $.ajax({
      type: "post",
      url: "../controller/checkEmail.php",
      data:{
        email: email
      },
      success:function(check){
        // alert(check);
   
        if(check == "found"){
        	$('#emailError').parent('div').removeClass("has-error");
          $('#emailError').css("display","none");
          $('#email').removeClass("invalid");
         // alert("matched");
         errorFound = true;
        }else{
          $('#emailError').parent('div').addClass("has-error");
          $('#emailError').css("display","block");
          $('#email').addClass("invalid");
          // alert("not matched");
          // alert("false");
          errorFound = false;
        }

      }
     
    });

  };

// REGISTER_AJAX /////////////////////////////////////////////////////////////////

	function registerValidate(){
	  // var regUsername = $('#reg_username').val();
	  var regEmail = $('#register_email').val();
	  var regPassword = $('#register_password').val();
	  var confirmPassword = $('#confirm_password').val();
	  //alert(regEmail+regPassword+confirmPassword);	

	  if((regEmail=="")||(regPassword=="")||(regPassword!=confirmPassword)|| $('#register_email').parent("div").hasClass("has-error")){
	    $('#nullError').css("display","block");

	    $('input').focus(function(){
	      $('#nullError').css("display","none");
	      location.reload();
	    });
	   }else{


	    $.ajax({
	      type: "post",
	      url: "../controller/register_control.php",
	      data:{
	        regEmail: regEmail,
	        regPassword: regPassword
	      },
	      success:function(rcheck){
	    
	        if(rcheck == "1 1"){
	
	          swal({
			        title: "Successfully registered. Login to continue",
			        type: "success",
			    }).then(function(){

	          		location.reload();
			        
			    });
	          
	        }else{
	          
	          swal({
			        title: "Register Failed!",
			        type: "error",
			    }).then(function(){

			        location.reload();
			    });
	        }
	      }
	    });
	  }
	}

	function checkRegEmail(){
	  var regEmail = $('#register_email').val();

	  $.ajax({
	    type: "post",
	    url: "../controller/checkRegEmail.php",
	    data:{
	      regEmail: regEmail
	    },
	    success:function(rcheck){
	      // alert(rcheck);
	      if(rcheck == "found"){
	      	$('#regEmailError').parent('div').addClass("has-error");
	          $('#regEmailError').css("display","block");
	          // $('#register_email').addClass("invalid");
	          // $('#register_email').removeClass("valid");
	         // alert("matched");
	         errorFound = true;
	        }else{
	        	$('#regEmailError').parent('div').removeClass("has-error");
	          $('#register_email').addClass("valid");
	          $('#regEmailError').css("display","none");
	          // alert("not matched");
	          // alert("false");
	          errorFound = false;
	        }
	    }
	  });
	 
	};

	function confirmPassword(){
	  var password = $('#register_password').val();
	  var confirmPassword = $('#confirm_password').val();
	  // alert(password+confirmPassword);
	   $('#confirm_password').keyup(function(){
	    if(confirmPassword == password){
	    	$('#confirmPasswordError').parent('div').removeClass("has-error");
	      // $('#confirm_password').addClass("valid");
	      $('#confirmPasswordError').css("display","none");
	    }else{
	    	$('#confirmPasswordError').parent('div').addClass("has-error");
	      // $('#confirm_password').removeClass("valid");
	      // $('#confirm_password').addClass("invalid");
	      $('#confirmPasswordError').css("display","block");
	    }
	  }); 
	}
</script>




	
