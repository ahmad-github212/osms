<?php 
session_start();
define('TITLE' ,'Add New Product');
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
    if(($_REQUEST['pname']=="") || ($_REQUEST['pdop']=="") || ($_REQUEST['pava']=="") ||($_REQUEST['ptotal']=="")
    ||($_REQUEST['poriginalcost']=="") || ($_REQUEST['psellingcost']=="") || (!isset($_FILES['pimage']['name'])) ){
         $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    }else{
        $pname = $_REQUEST['pname'];
        $pdop = $_REQUEST['pdop'];
        $pava = $_REQUEST['pava'];
        $ptotal = $_REQUEST['ptotal'];
        $poriginalcost = $_REQUEST['poriginalcost'];
        $psellingcost = $_REQUEST['psellingcost'];
    
        $pimagename = $_FILES['pimage']['name'];
        $pimagetmpname = $_FILES['pimage']['tmp_name'];

    
        $sql = "INSERT INTO assets_tb (pname,pdop,pava,ptotal,poriginalcost,psellingcost,pimage) VALUES ('$pname','$pdop',
        '$pava','$ptotal','$poriginalcost','$psellingcost','$pimagename')";
        
        if($conn->query($sql)==TRUE){
           $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added Successfully </div>';
           $pimagename = $_FILES['pimage']['name'];
            move_uploaded_file($pimagetmpname, 'product-images/'.$pimagename);
        }else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
        }
    }
}
?>

<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron px-5 fw-bold" style="background-color:lightgray; opacity:0.85;">
<h3 class="text-center mt-4 mb-3">Add New Product</h3>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="pname">Product Name</label>
<input type="text" class="form-control" id="pname" name="pname">
</div>

<div class="form-group my-3">
<label for="pdop">Date of Purchase</label>
<input type="date" class="form-control" id="pdop" name="pdop">
</div>

<div class="form-group">
<label for="pava">Available</label>
<input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
</div>

<div class="form-group my-3">
<label for="ptotal">Total</label>
<input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)">
</div>

<div class="form-group">
<label for="poriginalcost">Original Cost Each</label>
<input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)">
</div>

<div class="form-group my-3">
<label for="psellingcost">Selling Cost Each</label>
<input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
</div>

<!--choose file-->
<div class="form-group my-3">
<label for="pimage">Product Image</label>
<input type="file" class="form-control" id="pimage" name="pimage" >
</div>

<div class="text-center mb-3">
<button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
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