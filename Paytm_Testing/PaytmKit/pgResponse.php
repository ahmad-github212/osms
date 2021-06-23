<?php
//stop notice
error_reporting(0);

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

include('dbConnection.php'); //for database connection
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");



$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
//	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
	//	echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.

		$orderid = $_POST['ORDERID'];
		$txnid = $_POST['TXNID'];
		$txnamount = $_POST['TXNAMOUNT'];
		$paymentmode = $_POST['PAYMENTMODE'];
		$currency = $_POST['CURRENCY'];
		$txndate = $_POST['TXNDATE'];
		$gatewayname = $_POST['GATEWAYNAME'];
		$banktxnid = $_POST['BANKTXNID'];
		$bankname = $_POST['BANKNAME'];

		//$email = $_COOKIE['email'];
		//$mobile = $_COOKIE['mobile'];

		
		
		//$productname = $_COOKIE['productname'];
		/*
		
		$quantity = $_COOKIE['quantity'];
		
		$psellingcost = $_COOKIE['psellingcost'];
 */
		//echo '<br>email '.$email.'<br>';
		//echo '<br>mobile '.$mobile.'<br>';
		/* echo '<br>pname '.$pname.'<br>';
		echo '<br>quantity '.$quantity.'<br>'; */
		
		/*echo '<br>pname '.$pname.'<br>';
		echo '<br>psellingcost '.$psellingcost.'<br>';
		 */
		

		echo '
			<div  class="container  bg-light text-center p-4" style="margin-top:20vh;">
			<div class="text-success fw-bold" style="font-size:30px;">Transaction is Successfull</div>
			
			<div class="row  my-4 text-center">
			<div class=" col-sm-6  text-right text-secondary fw-bold" style="font-size:23px;">ORDER ID</div>
			<div class="col-sm-6 text-left fw-bold text-primary">'.$orderid.'</div>
			</div>

			<div class="row mb-4 text-center">
			<div class="col-sm-6  text-secondary fw-bold" style="font-size:23px;">TXN AMOUNT</div>
			<div class="col-sm-6 fw-bold text-primary">Rs.  '.$txnamount.'/-</div>
			</div>
			
			<div class="row mb-4 justify-content-center">
			<a href="../../product.php" class="btn btn-info  col-3 col-sm-2 " style="text-align:center">Back </a>
			</div>
			
			</div>
		';

	/* 	echo '<br>'.$orderid ;
		echo '<br>'.$txnid ;
		echo '<br>'.$txnamount ; */
		
		//details of transaction 
		 $sql1 = "INSERT INTO transaction_tb (orderid,txnid,txnamount,paymentmode,currency,txndate,gatewayname,
		 			banktxnid,bankname) 
					 VALUES ('$orderid','$txnid','$txnamount','$paymentmode','$currency','$txndate',
					 '$gatewayname', '$banktxnid','$bankname')";
		
		$result1 = $conn->query($sql1);
		/* if($result1 == true){
			echo "<br><br> successfull <br><br>";
		}else{
			echo "<br><br> some problem with database <br><br>";
		}

		echo '<br>pleft '.$_COOKIE['pleft'].'<br>';
		echo '<br>pid '.$_COOKIE['pid'].'<br>';
 */

		//updating the assets_tb for available quantity left
		
		 $pleft = $_COOKIE['pleft'];
		$pid = $_COOKIE['pid'];
		/*  echo '<br>pleft '.$pleft.'<br>';
		echo '<br>pid'.$pid.'<br>';  */

		$sql2 = "UPDATE assets_tb SET pava='$pleft' WHERE pid='$pid'" ;
		$result2 = $conn->query($sql2);
		/* if($result2 == true){
			echo "<br><br> successfully updated <br><br>";
		}else{
			echo "<br><br> failed updated <br><br>";
		}  */
				 
	}
	else {
		echo "<b>Transaction is failed</b>" . "<br/>";
	}

	/* if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	} */
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Transactio Status</title>

	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	
</body>
</html>