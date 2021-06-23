<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

//validate check

if(!isset($_REQUEST['pid'])){
echo '<script>location.href="product.php"</script>';
}
?>
<?php

$pid = $_REQUEST['pid'];
//echo '<br><br>'.$pid.'<br><br>';
$quantity = $_REQUEST['quantity'];
$pava = $_REQUEST['pava'];
$psellingcost = $_REQUEST['psellingcost'];
$pleft = $pava - $quantity ;

// $productname = $_REQUEST['pname'];
 /*
echo $pname ;
echo $quantity ; */
//cookie
setcookie('pid',$pid, time()+(300));
setcookie('pleft',$pleft, time()+(300));
//setcookie('productname',$productname, time()+(86400*30));

/* setcookie('quantity',$quantity, time()+(86400*30));

 setcookie('psellingcost',$psellingcost, time()+(86400*30));
 */

if(!$quantity>0){
   echo '<script>alert("quantity should be atleast 1");</script>';
echo '<script>location.href="product.php";</script>'  ;
}
if($pleft<0){
   echo '<script>alert("you cannot buy more than available products");</script>'; 
    echo '<script>location.href="product.php";</script>'  ;
}

$totalcost = $quantity * $psellingcost ;
/*echo $_REQUEST['pava'];
echo '<br>';
echo $_REQUEST['psellingcost'];*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="GENERATOR" content="Evrsoft First Page">

    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


</head>
<body>

<div class="container mt-5 ">
<div class="row">
<div class="col-sm-6 offset-sm-3 jumbotron bg-light">
<h3 class="mt-4 mb-4 text-center">Welcome to Payment Page</h3>

<form method="post" action="./Paytm_Testing/PaytmKit/pgRedirect.php" class="fw-bold text-secondary">
		
					<div class="form-group row">
					<label class="col-sm-4 col-form-label">ORDER ID</label>
                    <div class="col-sm-8">
					<input readonly id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>" class="form-control">
					</div>
                    </div>
				
					<div class="form-group row mt-3 mb-3">
					<label  class="col-sm-4 col-form-label">CUSTOMER ID</label>
                    <div class="col-sm-8">
					<input readonly class="form-control" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
				</div>
                    </div>
				
					<div class="form-group row">
					<!--<label class="col-sm-4 col-form-label">INDUSTRY_TYPE_ID ::*</label>-->
                    <div class="col-sm-8">
					<input type="hidden"  class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
				</div>
                    </div>
				
					<div class="form-group row">
					<!--<label class="col-sm-4 col-form-label">Channel ::*</label>-->
                    <div class="col-sm-8">
					<input type="hidden" class="form-control" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</div>
                    </div>
				
				
					<div class="form-group row">
					<label class="col-sm-4 col-form-label">TXN AMOUNT</label>
                    <div class="col-sm-8">
					<input readonly class="form-control" title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value=<?php echo$totalcost ; ?>>
					</div>
                    </div>

					
			<!-- 		<div class="form-group row my-3">
					<label class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
					<input type="email" required placeholder="enter your email" class="form-control"  
							name="email" id="email" >
					</div>
                    </div>
				
					<div class="form-group row my-3">
					<label class="col-sm-4 col-form-label">Mobile</label>
                    <div class="col-sm-8">
					<input type="text" required placeholder="enter your mobile number" class="form-control"
							name="mobile" id="mobile" >
					</div>
                    </div>
				 -->
					
					<div class="text-center mt-3 mb-3">
					<input class="btn btn-success" value="CheckOut" type="submit"	onclick="">
					</div>
		
	</form> 


</div>
</div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>