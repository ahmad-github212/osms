<?php 
session_start();
define('TITLE' ,'Update Technician');
define('PAGE','technician');
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
if(isset($_REQUEST['empsubmit'])){
    if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") 
    || ($_REQUEST['empEmail'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>' ;
    }else{
    $eName = $_REQUEST['empName'];
   $eCity = $_REQUEST['empCity'];
   $eMobile = $_REQUEST['empMobile'];
   $eEmail = $_REQUEST['empEmail'];
   $sql = "INSERT INTO technician_tb (empName, empCity, empMobile, empEmail) VALUES ('$eName', '$eCity','$eMobile', '$eEmail')";       
    if($conn->query($sql)==TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added Successfully</div>' ;
        }
        else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add</div>' ;
        }
    }
}
?>

<!-- 2nd column start -->
<div class="col-sm-4 col-md-5 mt-3 jumbotron bg-light" style="opacity:0.85; margin-left:10px;">
<h3 class="text-center" style="font-size:25px; font-weight:bold;">Add New Technician</h3>
<form action="" method="post" class="fw-bold">
<div class="form-group">
      <label for="empName">Name</label>
      <input type="text" class="form-control" id="empName" name="empName" placeholder="Name">
    </div>
    <div class="form-group ">
      <label for="empCity">City</label>
      <input type="text" class="form-control" id="empCity" name="empCity" placeholder="City">
    </div>
    <div class="form-group my-3">
      <label for="empMobile">Mobile</label>
      <input type="text" class="form-control" id="empMobile" name="empMobile" 
      onkeypress="isInputNumber(event)" placeholder="Mobile">
    </div>
    <div class="form-group">
      <label for="empEmail">Email</label>
      <input type="email" class="form-control" id="empEmail" name="empEmail" placeholder="Email">
    </div>
    <div class="text-center my-3">
      <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Submit</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)){echo $msg ;} ?>
</form>
</div>

<!-- 2nd column end -->

<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>

<?php 
include('includes/footer.php');
?>