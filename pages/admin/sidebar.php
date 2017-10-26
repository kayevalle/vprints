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
										<span class="sidebar-normal">Customers</span>
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
									<a href="orders.php">
										<span class="sidebar-mini"></span>
										<span class="sidebar-normal">Orders</span>
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