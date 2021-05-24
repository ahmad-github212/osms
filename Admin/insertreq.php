<?php 
session_start();
define('TITLE' ,'Requesters');
define('PAGE','requesters');
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
if(isset($_REQUEST['reqsubmit'])){
    if(($_REQUEST['r_name']=="") || ($_REQUEST['r_email']=="") ||($_REQUEST['r_password']=="")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>' ;
    }else{
        $rname = $_REQUEST['r_name'];
        $remail = $_REQUEST['r_email'];
        $rpassword = $_REQUEST['r_password'];
        $sql = "INSERT INTO requesterlogin_tb (r_name,r_email,r_password) VALUES ('$rname', '$remail', '$rpassword')";
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
<div class="col-sm-6 mt-5 mx-3 jumbotron bg-light fw-bold" style="opacity:0.85;">
<h3 class="text-center my-4">Add New Requester</h3>
<form action="" method="post">
<div class="form-group ">
<label for="r_name">Name</label>
<input type="text" name="r_name" id="r_name" class="form-control">
</div>

<div class="form-group my-4">
<label for="r_email">Email</label>
<input type="text" name="r_email" id="r_email" class="form-control">
</div>

<div class="form-group">
<label for="r_password">Password</label>
<input type="text" name="r_password" id="r_password" class="form-control">
</div>

<div class="text-center my-3">
<button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">Submit</button>
<a href="requester.php" class="btn btn-secondary">Close</a>
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