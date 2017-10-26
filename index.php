<?php  
	include '../controller/dbcon.php'; 
  	session_start();

?>
<!DOCTYPE html>
<html class="perfect-scrollbar-on">
<head>
	<title></title>

	<?php include 'parts/head.php'; ?>
	
	<style type="text/css">
		.row > div{
			/*border:1px solid red;*/
		}
		.card{
			padding: 0px;
		}
   
	</style>

</head>
<body class="ecommerce">
	<!-- <div id="navbar-full">
		<div id="navbar" style="background-color: azure"> -->
			<?php include 'parts/header.php'; ?>	

<!-- 		    <div class="blurred-container">
		    	<div class="img-src" style="background-image: url('../img/ban3.jpg')">
		    		<div class="filter"></div>
		    	</div>
		    </div>
		</div>
	</div> -->
<div class="wrapper">

	<div class="space-50"></div>
	<div class="section section-blog">
		<div class="container">
			<h2 class="section-title">Products</h2>
		
		<div class="row">

			<div class="col-md-4">
				<div class="card card-background">
					<a href="products.php#women" data-toggle="tab">
						<div class="image" style="background-image: url('../img/women2.jpg');background-position: center center;background-size: cover">
							<img src="../img/women2.jpg" style="display: none">
							<div class="filter"></div>
							<div class="footer">
								<h4 class="title">Women</h4>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-background">
					<a href="#">
						<div class="image" style="background-image: url('../img/men2.jpg');background-position: center center;background-size: cover">
							<img src="../img/men2.jpg" style="display: none">
							<div class="filter"></div>
							<div class="footer">
								<h4 class="title">Men</h4>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-background">
					<a href="#">
						<div class="image" style="background-image: url('../img/kids2.png');background-position:  center;background-size: cover">
							<img src="../img/kids2.png" style="display: none">
							<div class="filter"></div>
							<div class="footer">
								<h4 class="title">Kids</h4>
							</div>
						</div>
					</a>
				</div>
			</div>

		</div>
	</div>
	</div> <!-- end categories section -->

	<div class="space-50"></div>
	<div class="section" id="contact-us">
           <div class="container">
               <h2 class="section-title">Send us a message</h2>
               <div class="row">
                   <div class="col-md-6">
                       <p>
                           You can contact us with anything related to 
our Products. We'll get in touch with you as soon as possible.<br><br>
                        </p>
                        <form role="form" id="contact-form" method="post">
    						<div class="form-group">
    				    		<label for="name">Your name</label>
    				    		<input name="name" class="form-control" id="name" placeholder="First Name and Last Name" type="text">
    				  		</div>
    				  		<div class="form-group">
    				    		<label for="email">Email address</label>
    				    		<input name="email" class="form-control" id="email" placeholder="Your personal email address" type="email">
    				  		</div>
    				  		<div class="form-group">
    				    		<label for="phone">Phone</label>
    				    		<input name="phone" class="form-control" id="phone" placeholder="Phone number" type="text">
    				  		</div>
    				  		<div class="form-group">
    				    		<label for="message">Your message</label>
    				    		<textarea name="message" class="form-control" id="message" rows="6"></textarea>
    				  		</div>
    				  		<div class="submit">
    				  			<input class="btn btn-info btn-fill" value="Contact Us" type="submit">
    				  		</div>
    					</form>
                   </div>
                   <div class="col-md-4 col-md-offset-2">
                        <div class="contact-info">
                            <h5><i class="fa fa-map-marker text-muted"></i> Address</h5>
                            <p class="text-muted"> 36 E Rodriguez Avenue<br>
                                Barangay San Isidro,<br>
                                Taytay, Rizal 
                            </p><br>
                            <h5><i class="fa fa-phone text-muted"></i>Phone</h5>
                            <p class="text-muted"> Garry Valle <br>
                                +63-926-5234-207<br>
                                Mon - Fri, 8:00-22:00
                            </p><br>
                            <h5><i class="fa fa-building text-muted"></i> Email</h5>
                            <p class="text-muted"> Garry Valle <br>
                                email@email.com
                            </p>
                        </div>
                   </div>
               </div>
           </div>
    </div><!-- contact us section -->


</div> <!-- end wrapper -->
<?php include 'parts/footer.php'; ?>
<?php include 'allscripts.php'; ?>

<script>
	var hash = document.location.hash;
if (hash) {
    $('.nav-tabs a[href="'+hash+'"]').tab('show');
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
});
</script>


</body>

</html>






	
