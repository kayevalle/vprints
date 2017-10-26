<?php 
	include '../../controller/dbcon.php'; 
	session_start();
	$_SESSION["url"] = $_SERVER["REQUEST_URI"];

	if (isset($_SESSION['email'])) 
	{
	    $email_h = $_SESSION['email'];

	    $fetchActiveUser = mysql_query("SELECT * FROM user_table WHERE email = '$email_h'");
	    	
    	$user = mysql_fetch_assoc($fetchActiveUser);
    	if ($user['user_type'] == 1) 
    	{
    		
    	}
    	else
    	{
    		header("Location:../home.php");
    	}

	}
	else
	{
		header('Location:../home.php');
	}

	$fetchproduct = mysql_query("SELECT * FROM product_table p, category_table c WHERE p.category_id = c.category_id");


 ?>
<!DOCTYPE html>
<html class="perfect-scrollbar-on">
<head>


	<title></title>

	<!-- Canonical SEO -->
    <link rel="canonical" href="http://www.creative-tim.com/product/paper-dashboard-pro">


     <!-- Bootstrap core CSS     -->
    <link href="../../css/bootstrap.css" rel="stylesheet">

    <!--  Paper Dashboard core CSS    -->
    <link href="../../css/paper-dashboard.css" rel="stylesheet">

    <!--  Fonts and icons     -->
    <link href="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/font-awesome.css" rel="stylesheet">
    <link href="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/css.css" rel="stylesheet" type="text/css">

    <link href="../../css/themify-icons.css" rel="stylesheet">

    <script src="../../js/jquery-3.1.1.js" type="text/javascript"></script>
</head>

<body>
	<div class="wrapper">
		<div class="sidebar" data-background-color="brown" data-active-color="info">
	    <!--
			Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
			Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
		-->
			<div class="logo">
				<a href="http://www.creative-tim.com/" class="simple-text logo-mini">
					
				</a>

				<a href="http://www.creative-tim.com/" class="simple-text logo-normal">
					Admin
				</a>
			</div>
	    	<div class="sidebar-wrapper">
	            <ul class="nav">
					<li>
	                    <a data-toggle="collapse" >
	                        <a href="dashboard.php"><i class="ti-panel"></i>
	                        <p>Dashboard
                            </p></a>
	                    </a>
	                </li>
	                <li>
	                    <a data-toggle="collapse" href="#customers">
	                        <i class="ti-package"></i>
	                        <p>Customers
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse" id="customers">
							<ul class="nav">
	                            <li>
									<a href="customers.php">
										<span class="sidebar-mini"></span>
										<span class="sidebar-normal">Users</span>
									</a>
								</li>
	                            <li>
									<a href="customer_reports.php">
										<span class="sidebar-mini"></span>
										<span class="sidebar-normal">Customer Reports</span>
									</a>
								</li>
	                        </ul>
	                    </div>
	                </li>

	                <li class="active">
	                    <a data-toggle="collapse" href="#products">
	                        <i class="ti-package"></i>
	                        <p>Products
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse in" id="products">
							<ul class="nav">
	                            <li class="active">
									<a href="products.php">
										<span class="sidebar-mini"></span>
										<span class="sidebar-normal">Products</span>
									</a>
								</li>
								<li>
									<a href="addproducts.php">
										<span class="sidebar-mini"></span>
										<span class="sidebar-normal">Add Product</span>
									</a>
								</li>
	                            <li>
									<a href="low_stock_report.php">
										<span class="sidebar-mini"></span>
										<span class="sidebar-normal">Low Stock Report</span>
									</a>
								</li>
	                        </ul>
	                    </div>
	                </li>

	                <li>
	                    <a data-toggle="collapse" href="#sales">
	                        <i class="ti-package"></i>
	                        <p>Sales
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse" id="sales">
							<ul class="nav">
	                            <li>
									<a href="transactions.php">
										<span class="sidebar-mini"></span>
										<span class="sidebar-normal">Transactions</span>
									</a>
								</li>
	                            <li>
									<a href="bestseller.php">
										<span class="sidebar-mini"></span>
										<span class="sidebar-normal">Best Sellers</span>
									</a>
								</li>
	                        </ul>
	                    </div>
	                </li>
	            </ul>
	    	</div>
	    </div>
		<div class="main-panel">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-minimize">
						<!-- <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button> -->
					</div>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar bar1"></span>
	                        <span class="icon-bar bar2"></span>
	                        <span class="icon-bar bar3"></span>
	                    </button>
	                    <a class="navbar-brand" href="#datatable">Products</a>
					</div>
	                <div class="collapse navbar-collapse">
	                <ul class="nav navbar-nav navbar-right">
	                	<li>
                            <a href="../../pages/logout.php" class="btn-rotate">
								<i class="ti-settings"></i>
									<p class="">
										Logout
									</p>
                            </a>
                        </li>
	                </ul>
						<!-- <form class="navbar-form navbar-left navbar-search-form" role="search">
	    					<div class="input-group">
	    						<span class="input-group-addon"><i class="fa fa-search"></i></span>
	    						<input class="form-control" placeholder="Search..." type="text">
	    					</div>
	    				</form> -->
	                    <!-- <ul class="nav navbar-nav navbar-right">
	                        <li>
	                            <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
	                                <i class="ti-panel"></i>
									<p>Stats</p>
	                            </a>
	                        </li>
	                        <li class="dropdown">
	                            <a href="#notigfications" class="dropdown-toggle" data-toggle="dropdown">
	                                <i class="ti-bell"></i>
	                                <span class="notification">5</span>
									<p class="hidden-md hidden-lg">
										Notifications
										<b class="caret"></b>
									</p>
	                            </a>
	                        	<ul class="dropdown-menu">
	                                <li><a href="#not1">Notification 1</a></li>
	                                <li><a href="#not2">Notification 2</a></li>
	                                <li><a href="#not3">Notification 3</a></li>
	                                <li><a href="#not4">Notification 4</a></li>
	                                <li><a href="#another">Another notification</a></li>
	                            </ul>
	                        </li>
							<li>
	                            <a href="#settings" class="btn-rotate">
									<i class="ti-settings"></i>
									<p class="hidden-md hidden-lg">
										Settings
									</p>
	                            </a>
	                        </li>
	                    </ul> -->
	                </div>
				</div>
			</nav>

			<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="min-height: 450px">
                	<div class="card-content">
	                         

		                <div>
					    <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange                  
					            Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
					    -->
					        
					        <table id="bootstrap-table" class="table">
					            <thead style="height: 50px">
					                <th data-field="id">ID</th>
					            	<th data-field="product_image" data-sortable="true">Image</th>
					            	<th data-field="product_name" data-sortable="true">Name</th>
					            	<th data-field="product_size" data-sortable="true">Size</th>
					            	<th data-field="product_price" data-sortable="true">Price</th>
					            	<th data-field="product_qty" data-sortable="true">Stock Qty</th>
					            	<th data-field="category" data-sortable="true">Category</th>
					            	<th data-field="actions">Actions</th>
					            </thead>
					            <tbody>
					            <?php while ($product = mysql_fetch_assoc($fetchproduct)){ ?>
					            	
					                <tr>
					                	<td><?php echo $product["product_id"] ?></td>
					                	<td><img src="../<?php echo $product["product_image"] ?>" alt="" width="100px"></td>
					                	<td><?php echo $product["product_name"] ?></td>
					                	<td><?php echo $product["product_size"] ?></td>
					                	<td>P<?php echo $product["product_price"] ?></td>
					                	<td><?php echo $product["product_qty"] ?></td>
					                	<td><?php echo $product["category_name"] ?></td>
					                	<td>
							                <a rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit">
							                    <i class="ti-pencil-alt"></i>
							                </a>
							                <a href="../controller/cart_control.php?action=remove&id=<?php echo $item['id'] ?>" rel="tooltip" data-placement="top" title="Remove Item" class="btn btn-danger btn-simple btn-icon">

		                                        <i class="ti-close"></i>

		                                    </a>
					                	</td>
					                </tr>
					            <?php } ?>
					                
					            </tbody>
					        </table>
					    </div>
                
	            	</div>
	            </div>
            </div>
            <!-- end col -->
        </div>
    </div>
			</div>

				 <footer class="footer">
				    <div class="container-fluid">
				        <nav class="pull-left">
				            <ul>
				                <li>
				                    <a href="dashboard.php">
				                        Dashboard
				                    </a>
				                </li>
				                <li>
				                    <a href="customers.php">
				                        Customers
				                    </a>
				                </li>
				                <li>
				                    <a href="products.php">
				                        Products
				                    </a>
				                </li>
				            </ul>
				        </nav>
				        <div class="copyright pull-right">
				            © 2017 <a href="../home.php">VPrints</a>
				        </div>
				    </div>
				</footer>
		</div>

	</div>


		<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="modal-title"><h4>Edit Product Details</h4></div>
					</div>
					<div class="modal-body">
						<form method="post" action="../../controller/submit_modal.php">
							<input type="hidden" class="form-control prod_id" name="product_id"	>
								<div class="row">
									<div class="col-md-7" ><img src="" alt="" class="prod_image" height="300px"></div>
									<div class="col-md-5" >
										<div class="col-md-12">
											<div class="form-group">
												<label for="name">Name</label>
												<p class="form-control-static prod_name"></p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="size">Size</label>
												<p class="form-control-static prod_size"></p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="category">Category</label>
												<p class="form-control-static cat_name"></p>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="qty">Stock</label>
												<input type="text" class="form-control prod_qty" name="product_qty">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<label for="price">Price</label>
												<input type="text" class="form-control prod_price" name="product_price">
											</div>
										</div>
									</div>
								</div>
								<!-- row -->
								
							
							<div class="modal-footer">

								<button type="submit" name="edit" class="btn btn-info" value="product">Update</button>
							</div>
						</form>
						</div>
				</div>
			</div>

		</div>

	
	
	<script src="../../js/jquery-ui.js" type="text/javascript"></script>
	<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../../js/perfect-scrollbar.js" type="text/javascript"></script>
	<script src="../../js/paper-dashboard.js" type="text/javascript"></script>

	<!--  Forms Validations Plugin -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/jquery.js"></script>

	<!-- Promise Library for SweetAlert2 working on IE -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/es6-promise-auto.js"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/moment.js"></script>

	<!--  Date Time Picker Plugin is included in this js file -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/bootstrap-datetimepicker.js"></script>

	<!--  Select Picker Plugin -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/bootstrap-selectpicker.js"></script>

	<!--  Switch and Tags Input Plugins -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/bootstrap-switch-tags.js"></script>

	<!-- Circle Percentage-chart -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/jquery_002.js"></script>

	<!--  Charts Plugin -->
	<script src="../../js/chartist.js"></script>

	<!--  Notifications Plugin    -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/bootstrap-notify.js"></script>

	<!-- Sweet Alert 2 plugin -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/sweetalert2.js"></script>

	<!-- Vector Map plugin -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/jquery-jvectormap.js"></script>

	<!--  Google Maps Plugin    -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/js"></script>

	<!-- Wizard Plugin    -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/jquery_004.js"></script>

	<!--  Bootstrap Table Plugin    -->
	<script src="../../js/bootstrap-table.js"></script>

	<!--  Plugin for DataTables.net  -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/jquery_003.js"></script>

	<!--  Full Calendar Plugin    -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/fullcalendar.js"></script>

	<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/paper-dashboard.js"></script>
	
    <!--   Sharrre Library    -->
    <script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/jquery_005.js"></script>
    
	<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
	<script src="Paper%20Dashboard%20PRO%20by%20Creative%20Tim_files/demo.js"></script>

	<script type="text/javascript">

		var $table = $('#bootstrap-table');

	    //     function operateFormatter(value, row, index) {
	    //         return [
					// '<div class="table-icons">',
		   //              '<a data-toggle="tooltip" title="View" class="btn btn-simple btn-info btn-icon table-action view" href="javascript:void(0)">',
					// 		'<i class="ti-image"></i>',
					// 	'</a>',
		   //              '<a data-toggle="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" href="javascript:void(0)">',
		   //                  '<i class="ti-pencil-alt"></i>',
		   //              '</a>',
		   //              '<a data-toggle="tooltip" title="Remove" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">',
		   //                  '<i class="ti-close"></i>',
		   //              '</a>',
					// '</div>',
	    //         ].join('');
	    //     }

	        // $().ready(function(){
	        //     window.operateEvents = {
	        //         'click .view': function (e, value, row, index) {
	        //             info = JSON.stringify(row);

	        //             swal('You click view icon, row: ', info);
	        //             console.log(info);
	        //         },
	        //         'click .edit': function (e, value, row, index) {
	        //             info = JSON.stringify(row);

	        //             swal('You click edit icon, row: ', info);
	        //             console.log(info);
	        //         },
	        //         'click .remove': function (e, value, row, index) {
	        //             console.log(row);
	        //             $table.bootstrapTable('remove', {
	        //                 field: 'id',
	        //                 values: [row.id]
	        //             });
	        //         }
	        //     };

	            $table.bootstrapTable({
	                toolbar: ".toolbar",
	                showRefresh: true,
	                search: true,
	                showToggle: true,
	                showColumns: true,
	                pagination: true,
	                searchAlign: 'left',
	                pageSize: 5,
	                pageList: [5,10,25,50,100],

	                formatShowingRows: function(pageFrom, pageTo, totalRows){
	                    //do nothing here, we don't want to show the text "showing x of y from..."
	                },
	                formatRecordsPerPage: function(pageNumber){
	                    return pageNumber + " rows visible";
	                },
	                icons: {
	                    refresh: 'ti-reload',
	                    toggle: 'ti-view-list-alt',
	                    columns: 'ti-layout-column2',
	                    detailOpen: 'fa fa-plus-circle',
	                    detailClose: 'ti-close'
	                }
	            });

	            //activate the tooltips after the data table is initialized
	           // $('[rel="tooltip"]').tooltip();

	            $(window).resize(function () {
	                $table.bootstrapTable('resetView');
	            });
			//});

	        $('.edit').click(function(){
	        	var id = $(this).closest('tr').find('td:first').text();
	        	var edit = 'product';

	        	$.ajax({
	        		url: '../../controller/edit_modal.php', //tama ba to? YEAH hindi sya pumupunta
	        		type: 'post',
	        		dataType: 'json',
	        		data: {id: id, edit: edit},
	        	})
	        	.done(function(data) {
	        		
	        		$('.prod_price').val(data.product_price);
	        		$('.prod_qty').val(data.product_qty);
	        		$('.prod_name').text(data.product_name);//sana gumana
	        		$('.prod_id').val(data.product_id);//sana gumana
	        		$('.prod_size').text(data.product_size);//sana gumana
	        		$('.cat_name').text(data.category_name);//sana gumana
	        		$('.prod_image').attr('src', '../'+data.product_image);
	        		$('#productModal').modal('show');

	        	})
	        	.fail(function() {
	        		alert("error");
	        	})
	        	.always(function() {
	        		console.log("complete");
	        	});
	        	// 
	        	// sana gumana
	        });

	</script>


</body><!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   --></html>