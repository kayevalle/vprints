<?php 
	include '../controller/dbcon.php'; 
  session_start();
  $id = $_GET['id'];
  
  $product = mysql_query("SELECT * FROM product_table WHERE product_id = '$id'");
   $items = mysql_fetch_assoc($product);
  // while($row = mysql_fetch_assoc($product)) {
  //   $items[]=$row;
    
  // }
  $name = $items["product_name"];
 // echo $name;
  $availsize = mysql_query("SELECT `product_size`,`product_qty` FROM `product_table` WHERE `product_name` = '$name'");
  while($size = mysql_fetch_assoc($availsize)){
    $sizes[] = $size;
  }
//  echo $sizes[2];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'parts/head.php'; ?>
  <style>
    /*body {
      font-family: 'Raleway', sans-serif;
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      margin: 0px !important;
    }*/
    .stable{
      width: 100%;
      display: table;
      border: none;
      border-collapse: collapse;
      border-spacing: 0;
      color: #888888;
    }
    .sthead{
      border-bottom: 1px solid #888888;
      display: table-header-group;
      vertical-align: middle;
      border-color: inherit;
      color: #888888;
    }
    .str{
      display: table-row;
      vertical-align: inherit;
      border-color: inherit;
    }
    .sth{
      padding: 15px 5px;
      display: table-cell;
      text-align: left;
      vertical-align: middle;
      border-radius: 2px;
      color: #888888;
    }
    .std{
      padding: 15px 5px;
      display: table-cell;
      text-align: left;
      vertical-align: middle;
      border-radius: 2px;
    }
  </style>
</head>
<body class="ecommerce">

<?php include 'parts/header.php'; ?>

	<div class="wrapper">
  <div class="space-100"></div>
    <div class="section">
        <div class="container">
          <div class="row">
          
            
          
          
           <form method="post" action="../controller/cart_control.php?action=add" class="addtocart">
            <input type="hidden" name="product_name" value="<?php echo $items['product_name'] ?>" class="id">

            <div class="col-md-6">
               <div class="tab-content">
                            <div class="tab-pane active" id="product-page1">
                                 <img src="<?php echo $items['product_image'] ?>" width="455px">
                              </div>
                </div>
                
                <div class="clearout"></div>

            </div>
            <div class="col-md-6">
                <div class="product-details">
                  <a href="#">
                      <h3 class="title"><?php echo $items["product_name"] ?></h3>
                  </a>

                  <p class="stock"></p>

                <?php //foreach// ($sizes as $key => $value): ?>
                  <?php 
                  // $stock = $sizes[$key]["product_qty"];
                  //  if ($stock >= 5){ ?>
                    <!-- <p><span  class="text-success">In Stock!</span></p>
                    <?php //}elseif(($stock == 4) || ($stock >=4)){ ?>
                    <p><span  class="text-warning">Limited Stock!</span></p>
                    <?php //}else{ ?>
                    <p><span  class="text-danger">Out of Stock!</span></p>
                  <?php// } ?>
                <?php// endforeach ?> -->
                  <span class="price">P <?php echo $items["product_price"] ?></span>
                  
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                          Size &amp; Fit <span class="caret"></span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                      <div class="row">
                      <div class="col l12">
                        <?php if ($items["category_id"] != 3){ ?>
              
                          <p>Size Chart</p>
                            <table class="stable">
                              <thead class="sthead" style="border-bottom: 1px solid #888888;">
                                <tr class="str">
                                  <th class="sth">(cm)</th>
                              
                                  <th class="sth">S</th>
                                  <th class="sth">M</th>
                                  <th class="sth">L</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="str">
                                  <th class="sth">Chest</th>
                                
                                  <td class="std">90</td>
                                  <td class="std">100</td>
                                  <td class="std">108</td>
                                  
                                </tr>
                                <tr class="str">
                                  <th class="sth">Length</th>
                                
                                  <td class="std">69</td>
                                  <td class="std">74</td>
                                  <td class="std">78</td>
                                  
                                </tr>
                              </tbody>
                            </table>
                          <?php }else{ ?>
                          <p>Size Chart</p>
                            <table class="stable">
                              <thead class="sthead">
                                <tr class="str">
                                  <th class="sth">(cm)</th>
                              
                                  <th class="sth">S</th>
                                  <th class="sth">M</th>
                                  <th class="sth">L</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="str">
                                  <th class="st">Chest</th>
                                
                                  <td class="std">28</td>
                                  <td class="std">32</td>
                                  <td class="std">36</td>
                                  
                                </tr>
                                <tr class="str">
                                  <th class="sth">Length</th>
                                
                                  <td class="std">35</td>
                                  <td class="std">40</td>
                                  <td class="std">45</td>
                                  
                                </tr>
                              </tbody>
                            </table>
                            
                          <?php } ?>
                          </div></div>
                      </div>
                    </div>
                  </div>
                  
                   
                </div> <!-- Accordion  -->
                <div class="actions">
                <div class="row">
                <div class="col-lg-12">
                <div class="pull-left">
                  <div class="form-group col-lg-4">

                        <select name="product_size" class="selectpicker" data-style="btn" data-menu-style="dropdown-blue" tabindex="-98">
                          
                          <?php foreach ($sizes as $key => $value): ?>
                            
                          <option value="<?php echo $sizes[$key]["product_size"] ?>"><?php echo $sizes[$key]["product_size"] ?>
                          
                          
                            
                          </option>

                          <?php endforeach ?>
                          
                        </select>

                  </div>
                </div>
                <div class=" col-lg-4">
                  <p><span class="size_qty"><?php echo $items["product_qty"]; ?></span> items left</p>
                </div>
                </div>
                
                </div>
                
                  <div class="col-lg-4 form-group">
                    
                    
                    <div class="input-group">
                          <span class="input-group-btn">
                            <a class="btn btn-add btn-block">+</a>
                          </span>
                          <input type="text" name="product_qty" class="form-control item-qty" value="1" size="4">
                          <span class="input-group-btn">
                            <a class="btn btn-sub btn-block">-</a>
                          </span>
                    </div>
                  </div>
                </div>
                <div class="pull-right">
                  <button class="btn btn-danger btn-simple btn-hover" rel="tooltip" title="" data-placement="left" data-original-title="Add to wishlist">
                  </button>
                  <button type="submit" class="btn btn-fill">Add to Cart</button>
                </div>

            </div>

            </form>
            
          </div>
          </div>
                  
        </div>
    </div>
    
  
  
           

	<?php include 'parts/footer.php'; ?>
	<?php include 'parts/allscripts.php'; ?>

  <script type="text/javascript">
  var qty = $('.item-qty').val();


  $('.btn-add').click(function(){
    qty< <?php echo $items["product_qty"]; ?>?qty++:qty=<?php echo $items["product_qty"]; ?>;
    $('.item-qty').val(qty);
  });
  $('.btn-sub').click(function(){
    qty>1?qty--:qty=1;
    $('.item-qty').val(qty);
  });

  $(this).click(function(){

    $.notify({
        // options
        message: 'Item/s added to cart' 
      },{
        // settings
        type: 'success'
      });
  });

  // function updateQty(opt){
  //   var qty = $('.item-qty').val();
  //   alert(qty);
  //   switch  opt{
  //     case 'add':
  //           qty++;
  //           $('.item-qty').val(qty);
  //         break;
  //     case 'sub':
  //           qty>1?qty--:qty=1;
  //         break;
  //   }
  //   $('item-qty').val(qty);
  // }


  $('.selectpicker').change(function(){
      var size = $(this).val();
      var name = $(".id").val();
      //alert(size+" "+name);
      $.ajax({
        url: "../controller/quantity_control.php",
        type: "post",
        data: {size:size, name:name}
      }).done(function(data){
        //alert(data);
        $('.size_qty').text(data);
      }).fail(function(){

      }).always(function(){

      });
  });
</script>
</body>
</html>

