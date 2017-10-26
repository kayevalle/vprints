<html><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">

  
  

  
  
  

  


<script src="../js/jquery-3.1.1.js"></script>
  

  
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
  

  

  
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  

  

  <style type="text/css">
    body {
    padding: 1em;
}

/* Mimic Bootstrap's .nav-tabs>li(.active)>a 
   when using radio buttons instead of links in tab headers */
/*.nav-tabs>li>label
{
    display: inline-block;
    padding: 1em;
    margin: 0;
    border: 1px solid transparent;
    cursor: pointer;
}
.nav-tabs>li.active>label
{
    cursor: default;
    border-color: #ddd;
    border-bottom-color: white;
}*/

  </style>

  <title></title>

  
    

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">




  
</head>

<body>

			<div data-tabs="tabs" id="tabs">
                  
                  <input type="radio" name="paymentmethod" id="cod" class="with-gap" value="cod">
                  <label for="cod" data-target="#cashod" onclick="$(this).tab('show')">Cash on Delivery</label>
                  
                  <input type="radio" name="paymentmethod" id="bank" class="with-gap" value="bank">
                  <label for="bank" data-target="#bankDeposit" onclick="$(this).tab('show')">Bank Deposit</label>
                  <input type="radio" name="paymentmethod" id="creditcard" class="with-gap" value="creditcard">
                  <label for="creditcard" data-target="#credit" onclick="$(this).tab('show')">Credit Card</label>
              
              </div>

              <div class="tab-content">
                <div class="tab-pane" id="cashod">COD</div>
                <div class="tab-pane" id="bankDeposit">
                  <div class="panel">
                    <div class="panel">
                      <div class="form-group col s6">
                        <h5>Bank Details</h5>
                          <div class="form-group col s12">
                            <p>Account Name:<b>vprints</b></p>
                          </div>   
                          <div class="form-group col s7">
                            <p>Account Number:<b>2345678901</b> </p>

                          </div>          
                        </div>
                        
                      </div>
                  </div>
                </div>
                <div class="tab-pane" id="credit">
                  <div class="panel">
                  <div class="form-group col s6">
                      <div class="form-group input-field col s12">
                        <input type="text" name="accountname" id="accountname">
                        <label for="accountname">Account Name</label>
                      </div>   
                      <div class="form-group input-field col s7">
                        <input type="text" name="accountnumber" id="accountnumber" maxlength="16">
                        <label for="accountnumber">Account Number</label>

                      </div>
                      <div class="col s1"><label for="dash"></label><p id="dash" class="form-control-static">-</p></div>
                      <div class="form-group input-field col s3">
                        <label for="security" class="right"></label>
                        <input type="text" name="security" id="security">
                      </div>        
                      <div class="col s1">
                        <label for="tip"></label>
                        <i class="fa fa-question-circle" id="tip" data-toggle="tooltip" data-placement="top" title="Go to Cart"></i>
                      </div>           
                    </div>
                    
                  </div>
                </div>
              </div>

<script src="../js/bootstrap.js"></script>
<script src="../js/gsdk-radio.js"></script>
 <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
<script type="text/javascript">//<![CDATA[
$(window).load(function(){
$('input[name="intervaltype"]').click(function () {
    //jQuery handles UI toggling correctly when we apply "data-target" attributes and call .tab('show') 
    //on the <li> elements' immediate children, e.g the <label> elements:
    $(this).closest('label').tab('show');
});
});//]]> 

</script>





</body></html>


<div class="panel panel-default" id="step1">
      <div class="panel-heading">Delivery</div>
        <div class="panel-body" id="checkoutstep">
          <form data-toggle="validator" role="form" id="checkoutstep1">
          
          <div class="col-sm-12">
            <h5>Delivery Address</h5>
          </div>
          <div class="row">
            <div class="form-group col-lg-6">
              <label for="inputfirstname">Firstname</label>
              <input type="text" class="form-control" id="inputfirstname" data-error="Please enter first name" required>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-lg-6">
              <label for="inputlastname">Lastname</label>
              <input type="text" class="form-control" id="inputlastname" data-error="Please enter last name" required>
              <div class="help-block with-errors"></div>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-lg-6">
              <label for="inputaddress">Address (House Number, Building and St. Name)</label>
              <input type="text" class="form-control" id="inputaddress" data-error="Please enter address information" required>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-lg-6">
              <label for="inputbarangay">Barangay</label>
              <input type="text" class="form-control" id="inputbarangay" data-error="Please enter barangay" required>
              <div class="help-block with-errors"></div>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-lg-6">
              <label for="inputmunicipality">City/Municipality</label>
              <input type="text" class="form-control" id="inputmunicipality" data-error="Please enter city / municipality" required>
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-lg-6">
              <label for="inputprovince">Province</label>
              <input type="text" class="form-control" id="inputprovince" data-error="Please enter province" required>
              <div class="help-block with-errors"></div>
            </div>
            </div>

            <div class="col s12" style="margin-bottom: 20px;font-size: 12px">*all fields required</div>
            <div class="form-group">
              <button type="submit" class="btn teal">Next Step: Billing Details</button>
            </div>
            </form>
        </div>
      </div>