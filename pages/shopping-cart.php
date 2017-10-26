<?php 
	include '../controller/dbcon.php'; 
  session_start();
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<?php include 'parts/head.php'; ?>
  <style>
    /*body {
      font-family: 'Raleway', sans-serif;
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      margin: 0px !important;
    }*/
    table > tr,td{
      /*border: 1px solid red;*/
    }
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
          
          <div class="row">
                <div class="col-lg-12">
                    <h4  style="color:#2CA8FF">Shopping Cart Table</h4>
                </div>
                <div class="col-lg-12">
                    <?php if (empty($_SESSION['cart'])){ ?>
                      <h3>Cart Empty</h3>
                    <?php }else{ ?>
                    <table class="table table-shopping">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Product</th>
                                <th class="th-description">Size</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Qty</th>
                                <th class="text-right">Category</th>
                                <th class="text-right">Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($_SESSION["cart"] as $item): ?>
                        <form class="cart-table" method="post" action="../controller/cart_control.php?action=updateqty&id=<?php echo $item['id'] ?>" >
                        <input type="hidden" name="product_id" class="hidden_id" value="<?php echo $item["id"]; ?>">
                            <tr>
                                <td>
                                    <div class="img-container">
                                        <img src="<?php echo $item["image"]; ?>" alt="...">
                                    </div>
                                </td>
                                <td class="td-name">
                                    <?php echo $item["name"]; ?>
                                </td>
                                <td class=" text-left">
                                    <p><?php echo $item["size"]; ?>
                                     
                                    </p>
                                </td>

                                <td class="td-number">
                                    <small>P</small><?php echo $item["price"]; ?>
                                </td>
                                <td class="td-number">
                                    <small>x</small>
                                    <input type="text" name="updated_qty" style="background:transparent; border:none; text-align:center; border-bottom:1px solid #777; width:30px;" value="<?php echo $item['qty']; ?>" >
                                </td>
                                <td class="text-right">
                                    <small></small><?php echo $item["categoryname"]; ?>
                                </td>
                                <td class="td-number">
                                    <small>P</small><?php echo $item["price"]*$item["qty"]; ?>
                                </td>
                                
                                <td class="td-actions">
                                    <button type="submit" rel="tooltip" data-placement="left" title="Update" class="btn btn-info btn-simple btn-icon ">

                                        <i class="fa fa-check"></i>
                                        

                                    </button>
                                    <a onclick="remove(<?php echo $item["id"]; ?>);" rel="tooltip" data-placement="left" title="Remove Item" class="btn btn-danger btn-simple btn-icon">

                                        <i class="fa fa-times"></i>

                                    </a>
                                </td>
                            </tr>
                                  </form>
                       <?php //$price_total += ($item["price"]*$item["qty"]); ?>
                            <?php endforeach ?>
                            
                            <tr>
                                <td></td>
                                <td colspan="2"></td>
                                <td></td>
                                <td class="td-total">
                                   Total
                                </td>
                                <td class="td-price">
                                    <small>P </small><?php echo $_SESSION["total"]; ?>
                                </td>
                                <td> <a href="checkout.php" type="button" class="btn btn-info btn-fill btn-l">Complete Purchase <i class="fa fa-chevron-right"></i></a></td>

                                <td></td>
                            </tr>
                      
                        </tbody>
                    </table>
                  
                    <?php } ?>

                </div>
            </div>
        </div>
                  
    </div>
  </div>
  
           

	<?php include 'parts/footer.php'; ?>
	<?php include 'parts/allscripts.php'; ?>

  <script type="text/javascript">
  var qty = $('.item-qty').val();

  $('.btn-add').click(function(){
    qty<10?qty++:qty=10;
    $('.item-qty').val(qty);
  });
  $('.btn-sub').click(function(){
    qty>1?qty--:qty=1;
    $('.item-qty').val(qty);
  });

function remove(id){

  swal({
    title: 'Remove item?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Remove'
  }).then(function () {

    
    $.ajax({
      url: "../controller/cart_control.php?action=remove&id="+id,
      type: "post"
    }).done(function(data){


            swal({
                title: "Item removed!",
                type: "success",
            }).then(function(){
                location.reload();
            });

    }).fail(function(){

    }).always(function(){

    });

    })
  };
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

$(document).ready(function(){
   $('.btn-tooltip').tooltip();
});

</script>
</body>
</html>

