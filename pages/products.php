<?php  
  include '../controller/dbcon.php'; 
  session_start();
  $category_id = $_GET['categoryId'];
  
  $men = mysql_query("SELECT * FROM product_table WHERE category_id = 1 AND product_size = 'S'");
  $women = mysql_query("SELECT * FROM product_table WHERE category_id = 2 AND product_size = 'S'");
  $kids = mysql_query("SELECT * FROM product_table WHERE category_id = 3 AND product_size = 'S'");

  while($row = mysql_fetch_assoc($men)) {
  	$menresults[]=$row;
  	
  }
  while($row = mysql_fetch_assoc($women)) {
    $womenresults[]=$row;
    
  }
  while($row = mysql_fetch_assoc($kids)) {
    $kidsresults[]=$row;
    
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'parts/head.php'; ?>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"> -->
</head>
<body class="ecommerce">


<?php include 'parts/header.php'; ?>

<div class="wrapper">

<div class="space-100"></div>
	    <div class="section">
           <div class="container">
               <h2 class="section-title">Products</h2>
               <div class="row">


                    <div class="col-md-3">
                        <div class="card card-refine card-plain">
                            <div class="header">
                                <h4 class="title">Categories
                                    <button class="btn btn-default btn-xs btn pull-right btn-simple" rel="tooltip" title="" data-original-title="Reset Filter">
                                        
                                    </button>
                                 </h4>
                            </div>
                            <div class="content">
                                  <div class="panel-group">


                                 <!--  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title" onclick="getCategory(1);">
                                        <a>
                                          Men
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                  </div>


                                   <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title">
                                        <a href="#">
                                          Women
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                  </div>end panel

                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title">
                                        <a href="#">
                                          Kids
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                  </div> end panel -->
                                  <ul class="nav">
                                    <li><a href="#men" data-toggle="tab">Men</a></li>
                                    <li><a href="#women" data-toggle="tab">Women</a></li>
                                    <li><a href="#kids" data-toggle="tab">Kids</a></li>
                                  </ul>



                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div> <!-- end col-md-3 -->

                    <div class="col-md-9">
                        <div class="row">
                          <div class="tab-content">
                            <div class="tab-pane fade in active" id="men">
                               <?php foreach ($menresults as $item => $value): ?>
                          
                          <!-- <form method="post" action="controller?action=add"> -->
                              <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="product-page.php?id=<?php echo $menresults[$item]["product_id"]; ?>">
                                          <?php// echo $menresults[$item]["product_id"] ?>
                                            <img src="<?php echo $menresults[$item]["product_image"]; ?>" alt="...">
                                        </a>
                                    </div>
                                    <div class="content" style="padding-left: 30px">
                                        <a href="#">
                                             <h4 class="title"><?php echo $menresults[$item]["product_name"]; ?></h4>
                                        </a>
                                        <span class="price">P <?php echo $menresults[$item]["product_price"]; ?></span>
                                        <div class="footer">
                                            <div class="form-group">
                                             <!--  <select name="huge" class="selectpicker" data-style="btn" data-menu-style="dropdown-blue" tabindex="-98">
                                                <option value="S">Small</option>
                                                <option value="M">Medium</option>
                                                <option value="L">Large</option>
                                                
                                              </select> -->
                                            </div>

                                            <div>
                                            <input type="hidden" name="hidden_name" value="<?php echo $menresults[$item]['product_name']; ?>">
                                            <input type="hidden" name="hidden_price" value="<?php echo $menresults[$item]['product_price']; ?>">
                                            <input type="hidden" name="hidden_qty" value="1">

                                              <!-- <button type="submit" name="add" class="btn btn-simple btn-xs">add</button> -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                             </div>
                            <!-- </form> -->

                        <?php endforeach ?>
                            </div>
                            <div class="tab-pane fade" id="women">
                               <?php foreach ($womenresults as $item => $value): ?>
                          
                        
                              <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="product-page.php?id=<?php echo $womenresults[$item]["product_id"]; ?>">
                                            <img src="<?php echo $womenresults[$item]["product_image"]; ?>" alt="...">
                                        </a>
                                    </div>
                                    <div class="content" style="padding-left: 30px">
                                        <a href="#">
                                             <h4 class="title"><?php echo $womenresults[$item]["product_name"]; ?></h4>
                                        </a>
                                        <div class="footer">
                                            <span class="price">P <?php echo $womenresults[$item]["product_price"]; ?></span>
                                            
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                             </div>

                        <?php endforeach ?>
                            </div>
                            <div class="tab-pane fade" id="kids">
                               <?php foreach ($kidsresults as $item => $value): ?>
                          
                        
                              <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="product-page.php?id=<?php echo $kidsresults[$item]["product_id"]; ?>">
                                            <img src="<?php echo $kidsresults[$item]["product_image"]; ?>" alt="...">
                                        </a>
                                    </div>
                                    <div class="content" style="padding-left: 30px">
                                        <a href="#">
                                             <h4 class="title"><?php echo $kidsresults[$item]["product_name"]; ?></h4>
                                        </a>
                                        <div class="footer">
                                            <span class="price">P <?php echo $kidsresults[$item]["product_price"]; ?></span>
                                            
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                             </div>

                        <?php endforeach ?>
                            </div>
                          </div>
                       

                           

                        </div>
                    </div>

               </div> <!-- end of row -->
           </div>
    </div><!-- section -->
    <div class="space-100"></div>

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