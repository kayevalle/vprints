<?php  
  include '../controller/dbcon.php'; 
  session_start();

  $_SESSION["url"] = $_SERVER["REQUEST_URI"];

  $loginactive = false;

  if (isset($_SESSION['email'])) {
      $email_h = $_SESSION['email'];
      $loginactive = true;
  }
?>

<?php if ($_SERVER['REQUEST_URI'] == '/pages/home.php'){ ?>
<nav class="navbar navbar-fixed-top navbar-transparent " role="navigation">
<?php// }elseif($_SERVER['REQUEST_URI'] == '/pages/admin-dashboard.php'){ ?>
<!-- <nav class="navbar navbar-default"> -->
<?php }else{ ?>
<nav class="navbar navbar-fixed-top navbar-default">

<?php } ?>


    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button id="menu-toggle" type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar bar1"></span>
        <span class="icon-bar bar2"></span>
        <span class="icon-bar bar3"></span>
      </button>
      <a class="navbar-brand" href="/pages/home.php"></i>VPRINTS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
            
            <li>
                <a href="home.php">
                     Home
                </a>
            </li>
            <li>
                <a href="products.php">
                     Products
                </a>
            </li>
             <li>
             	<?php if ($_SERVER['REQUEST_URI'] == '/pages/home.php'){ ?>

                <a href="#contact-us">
                     Contact Us
                </a>

             	<?php }else{ ?>


                <a href="home.php#contact-us">
                     Contact Us
                </a>

             	<?php } ?>
            </li>
            <?php if (isset($_SESSION['email'])){ ?>
            
            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo $email_h = strstr($email_h, '@', true); ?>
                     <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-with-icons">
                <?php if($_SESSION["email"]=="admin@gmail.com"){  ?>
                    <li>
                        <a href="myaccount.php">
                             <i class="pe-7s-ticket"></i> My Account
                        </a>
                    </li>
                <?php }else{ ?>
                    <li>
                        <a href="myaccount.php">
                             <i class="pe-7s-ticket"></i> My Account
                        </a>
                    </li>
                    <li>

                <?php } ?>
                        <a href="../pages/logout.php">
                              <i class="pe-7s-piggy"></i> Logout
                        </a>
                    </li>
                  </ul>
            </li>
            <?php }else{ ?>
            <li>
                <a href="login.php">
                     Login
                </a>
            </li>
            <?php } ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Cart
                <span class="badge">
                  <?php  
                    if(empty($_SESSION["cart"])){
                      echo $item_total = 0;
                    }else{
                      foreach ($_SESSION["cart"] as $key) {
                        $item_total += $key["qty"];
                      }
                      echo $item_total;
                    }
                  ?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="row-fluid" style="padding: 20px 30px">
                      
                    <h3>Shopping Cart</h3>
                    <?php
                      if(isset($_SESSION["cart"])){
                          $price_total = 0;
                      ?>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <!-- <th  style="border-bottom: none">ID</th> -->
                          <th  style="border-bottom: none">Product</th>
                          <th  style="border-bottom: none">Size</th>
                          <th  style="border-bottom: none">Price</th>
                          <th  style="border-bottom: none">Quantity</th>
                          <th  style="border-bottom: none">Category</th>
                          <th  style="border-bottom: none">Action</th>
                        </tr>
                      </thead>
                      <tbody class="text-center" style="border-bottom: 1px solid #888888;">
                      <?php foreach ($_SESSION["cart"] as $item): ?>
                        <form class="cart-table" method="post" action="../controller/cart_control.php?action=remove&id=<?php echo $item['id'] ?>">
                        <input type="hidden" name="product_id" value="<?php echo $item["id"]; ?>">
                        <tr>
                        <!-- <td style="border-top: none"><?php// echo $item["id"]; ?></td> -->
                        <td style="border-top: none"><?php echo $item["name"]; ?></td>
                        <td style="border-top: none"><?php echo $item["size"] ?></td>
                        <td style="border-top: none">P<?php echo $item["price"]; ?></td>
                        <td style="border-top: none"><?php echo $item["qty"]; ?></td>
                        <td style="border-top: none"><?php echo $item["categoryname"]; ?></td>
                        <td style="border-top: none"><button type="submit" class="remove btn white-text teal" width="80%" value="<?php echo $item["name"]; ?>" >Remove</button></td>
                      </tr>
                      </form>
                      <?php $price_total += ($item["price"]*$item["qty"]); ?>
                      <?php $_SESSION["total"] = $price_total ?>
                      <?php endforeach ?>
                      </tbody>
                    </table>
                    <div class="row">
                      <div class="col-lg-4">
                        Total: P<?php echo $price_total; ?>
                      </div>
                      <div class="col-lg-4 text-right">
                      <form method="post" action="../controller/cart_control.php?action=empty">
                        <button type="submit" class="btn btn-fill" style="color:white;">Empty Cart</button>
                      </form>
                      </div>
                      <a href="shopping-cart.php" class="btn btn-fill" style="color:white;">Go To Cart</a>
                    </div>
                  </div>
                    <?php
                    }else{
                      ?>

                      <h5>Empty</h5>
                      
                      <?php
                    }
                    ?>
                </li>
              </ul>
              </li>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>

        <?php if ($_SERVER['REQUEST_URI'] == '/pages/home.php'): ?>
        	

   <div class="parallax filter-black">
        <div class="parallax-image">
            <img src="../img/about_5.jpg" style="top: 0px;">
        </div>
        <div class="small-info">
            <h1>Brace yourself!</h1>
            <h3>25% Off and Free global delivery for all products</h3>
        </div>
    </div>


<?php endif ?>

	


	