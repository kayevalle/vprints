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
	
	$fetchuser = mysql_query("SELECT u.user_id as 'ID',i.firstname,i.lastname,u.username,t.type, u.email FROM user_table u LEFT OUTER JOIN user_information_table i ON i.user_id = u.user_id LEFT OUTER JOIN user_type t ON t.type_id = u.user_type WHERE u.user_type = 2 ORDER BY u.user_id ASC ");
	while ($user = mysql_fetch_assoc($fetchuser)) {
		$users[] = $user;
	}

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
	                <li class="active">
	                    <a data-toggle="collapse" href="#customers">
	                        <i class="ti-package"></i>
	                        <p>Users
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse in" id="customers">
							<ul class="nav">
	                            <li class="active">
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

	                <li>
	                    <a data-toggle="collapse" href="#products">
	                        <i class="ti-package"></i>
	                        <p>Products
	                           <b class="caret"></b>
	                        </p>
	                    </a>
	                    <div class="collapse" id="products">
							<ul class="nav">
	                            <li>
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
	                    <a class="navbar-brand" href="#datatable">Users</a>
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
					            	<th data-field="name" data-sortable="true">Name</th>
					            	<th data-field="user_type" data-sortable="true">User Type</th>
					            	<th data-field="email" data-sortable="true">Email</th>
					            	<th data-field="actions">Actions</th>
					            </thead>
					            <tbody>
					            <?php foreach ($users as $user): ?>
					            	
					                <tr>
					                	<td><?php echo $user["ID"]; ?></td>
					                	<td><?php echo $user["firstname"] ." ". $user["lastname"] ?></td>
					                	<td><?php echo $user["type"] ?></td>
					                	<td><?php echo $user["email"] ?></td>
					                	<td>
							                <a href="../../controller/user_control.php?remove=remove&id=<?php echo $user['ID'] ?>" rel="tooltip" data-placement="top" title="Delete User" class="btn btn-danger btn-simple btn-icon">

		                                        <i class="ti-close"></i>

		                                    </a>
					                	</td>
					                </tr>
					            <?php endforeach ?>
					                
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

	        function operateFormatter(value, row, index) {
	            return [
					'<div class="table-icons">',
		                '<a data-toggle="tooltip" title="View" class="btn btn-simple btn-info btn-icon table-action view" href="javascript:void(0)">',
							'<i class="ti-image"></i>',
						'</a>',
		                '<a data-toggle="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" href="javascript:void(0)">',
		                    '<i class="ti-pencil-alt"></i>',
		                '</a>',
		                '<a data-toggle="tooltip" title="Remove" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">',
		                    '<i class="ti-close"></i>',
		                '</a>',
					'</div>',
	            ].join('');
	        }

	        $().ready(function(){
	            window.operateEvents = {
	                'click .view': function (e, value, row, index) {
	                    info = JSON.stringify(row);

	                    swal('You click view icon, row: ', info);
	                    console.log(info);
	                },
	                'click .edit': function (e, value, row, index) {
	                    info = JSON.stringify(row);

	                    swal('You click edit icon, row: ', info);
	                    console.log(info);
	                },
	                'click .remove': function (e, value, row, index) {
	                    console.log(row);
	                    $table.bootstrapTable('remove', {
	                        field: 'id',
	                        values: [row.id]
	                    });
	                }
	            };

	            $table.bootstrapTable({
	                toolbar: ".toolbar",
	                clickToSelect: true,
	                showRefresh: true,
	                search: true,
	                showToggle: true,
	                showColumns: true,
	                pagination: true,
	                searchAlign: 'left',
	                pageSize: 8,
	                clickToSelect: false,
	                pageList: [8,10,25,50,100],

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
	            $('[rel="tooltip"]').tooltip();

	            $(window).resize(function () {
	                $table.bootstrapTable('resetView');
	            });
			});

	</script>


</body><!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   --></html>