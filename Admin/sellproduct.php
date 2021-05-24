<?php 
session_start();
define('TITLE' ,'Sell Product');
define('PAGE','assets');
include('../dbConnection.php');
include('includes/header.php');

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}
else{
    echo '<script>location.href="login.php"</script>';
}
?>

<?php
if(isset($_REQUEST['psubmit'])){
    if(($_REQUEST['cname']=="") || ($_REQUEST['cadd']=="") || ($_REQUEST['pname']=="") ||($_REQUEST['pquantity']=="")
    || ($_REQUEST['psellingcost']=="") || ($_REQUEST['totalcost']=="") || ($_REQUEST['selldate']=="")){
         $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    }
    else{
        $pid = $_REQUEST['pid'];
        $pava = $_REQUEST['pava']-$_REQUEST['pquantity'] ;

        $custname = $_REQUEST['cname'];
        $custadd = $_REQUEST['cadd'];
        $cpname = $_REQUEST['pname'];
        $cpquantity = $_REQUEST['pquantity'];
        $cpeach = $_REQUEST['psellingcost'];
        $cptotal = $_REQUEST['totalcost'];
        $cpdate = $_REQUEST['selldate'];

        $sql = "INSERT INTO customer_tb (custname,custadd,cpname,cpquantity,cpeach,cptotal,cpdate) VALUES
        ('$custname','$custadd','$cpname','$cpquantity','$cpeach','$cptotal','$cpdate')";

        if($conn->query($sql)==TRUE){
            $genid = mysqli_insert_id($conn);
            //session_start();
            $_SESSION['myid'] = $genid ;
            echo "<script>location.href='productsellsuccess.php';</script>";
        }
        $sqlup = "UPDATE assets_tb SET pava='$pava' WHERE pid='$pid'";
        $conn->query($sqlup);
    }
}
?>

<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-5 jumbotron px-4" style="background-color:lightgray; opacity:0.85">
<h3 class="text-center mt-4 mb-3 fw-bold">Customer Bill</h3>

<?php 
if(isset($_REQUEST['issue'])){
    $sql = "SELECT * FROM assets_tb WHERE pid={$_REQUEST['id']}";
    $result= $conn->query($sql);
    $row= $result->fetch_assoc();
}
?>

<form action="" method="post" class="fw-bold">

<div class="form-group mb-3 mt-2">
<label for="pid">Product ID</label>
<input type="text" class="form-control" id="pid" name="pid" readonly value="<?php if(isset($row['pid'])){echo $row['pid'];}?>">
</div>

<div class="form-group mb-3">
<label for="cname">Customer Name</label>
<input type="text" class="form-control" id="cname" name="cname">
</div>

<div class="form-group ">
<label for="cadd">Customer Address</label>
<input type="text" class="form-control" id="cadd" name="cadd">
</div>

<div class="form-group my-3">
<label for="pname">Product Name</label>
<input type="text" class="form-control" id="pname" name="pname" readonly
value="<?php if(isset($row['pname'])){echo $row['pname'];}?>">
</div>


<div class="form-group my-3" >
<label for="pava">Available</label>
<input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)" readonly
value="<?php if(isset($row['pava'])){echo $row['pava'];}?>">
</div>

<div class="form-group " id="mydiv">
<label for="pquantity">Quantity</label>
<input type="text" class="form-control" id="pquantity" name="pquantity" onkeypress="isInputNumber(event)">
</div>


<div class="form-group my-3">
<label for="psellingcost">Price Each</label>
<input type="text" class="form-control" id="psellingcost" name="psellingcost" 
onkeypress="isInputNumber(event)"
value="<?php if(isset($row['psellingcost'])){echo $row['psellingcost'];}?>">
</div>

<div class="form-group ">
<label for="totalcost">Total Price</label>
<input type="text" class="form-control" id="totalcost" name="totalcost" onkeypress="isInputNumber(event)">
</div>

<div class="form-group my-3 ">
<label for="selldate">Date</label>
<input type="date" class="form-control" id="selldate" name="selldate">
</div>

<div class="text-center  mb-3">
<button type="psubmit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
<a href="assets.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)){echo $msg ;} ?>
</form>
</div>
<!-- end 2nd column -->

<script>
function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
}
</script>


<?php
include('includes/footer.php');
?>
