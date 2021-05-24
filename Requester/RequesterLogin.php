<?php 
include('../dbConnection.php');

session_start();
if(!isset($_SESSION['is_login'])){
if(isset($_REQUEST['rEmail'])){
$rEmail = mysqli_real_escape_string($conn,trim($_REQUEST['rEmail']));
$rPassword =  mysqli_real_escape_string($conn,trim($_REQUEST['rPassword']));
/*  $sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE 
r_email='".$rEmail."' AND r_password='".$rPassword."' limit 1" ;
 */

 if(($rEmail=="") || ($rPassword=="")){
    $msg = "All Fields Are Required";
 }
 else{
      //
 $sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE r_email='".$rEmail."'";

 $result = $conn->query($sql);

 //
 $row = $result->fetch_assoc();
 $pass_check = password_verify($rPassword , $row['r_password']);
 if($pass_check){
if($result->num_rows == 1){
    $_SESSION['is_login'] = TRUE ;
    $_SESSION['rEmail'] = $_REQUEST['rEmail'];

   echo "<script>location.href='RequesterProfile.php' ;</script>";
    exit;
}
 }
 else{
    /* $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password</div>'; */
    $msg = "Enter Valid Email and Password";
}
 }


/* 
if($result->num_rows == 1){
    $_SESSION['is_login'] = TRUE ;
    $_SESSION['rEmail'] = $_REQUEST['rEmail'];
   echo "<script>location.href='RequesterProfile.php' ;</script>";
    exit;

}
else{
    $msg = '<div class="alert alert-warning mt-2 col-sm-4">Enter Valid Email and Password</div>';
} */
}
}

//this else part is for already logged in user who is trying to login again
else{
    echo "<script>location.href='RequesterProfile.php' ;</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="../CSS/all.min.css">

    <title>Requester Login</title>
    <style>
        body{
            background: linear-gradient(120deg, #4E4E50 50%, #747474 50%);
            margin:auto;
           
        }
    #b2h{
        color:white;
    }
   #b2h:hover{
    background-color:white;
    color:black;
   }
   .form-grad{
        background: linear-gradient(120deg, #0B0C10 48%, #747474 48%);
   }

    </style>
</head>
<body  class="text-white "  >
<div class="container " >
    
    <div class="row justify-content-center mt-5" >
    <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-6">
   
    <form action="" method="POST" class="p-4 bg-dark form-grad" style="border:2px solid white; box-shadow:3px 1px 8px 8px white;">
   
    <div class="text-center" style="font-size:30px;">
    <i class="fas fa-users-cog"></i>
    <span  >Online Service Maintenance System</span>
    </div>

<p class="text-center mt-2" style="font-size:20px;"> 
<i class="fas fa-user-secret text-danger"></i>Requester Area</p>


    <div class="form-group">
    <i class="fas fa-user"></i><label for="email" class="fw-bold pl-2 mb-2">Email</label>
    <input type="email" class="form-control mb-2" placeholder="Email" name="rEmail"> 
    <small>We'll never share your Email with anyone else </small>
    </div>

    <div class="form-group mt-2">
    <i class="fas fa-key"></i><label for="pass" class="fw-bold pl-2 mb-2">Password</label>
    <input type="password" class="form-control mb-2" placeholder="Password" name="rPassword"> 
     <small class="text-danger text-center fw-bold"><?php if(isset($msg)){echo $msg;} ?></small>
    </div>
    <div class="d-grid gap-2">
    <button type="submit" class="shadow-sm btn btn-outline-danger mt-3 fw-bold ">Login</button>
    </div>
    <div class="text-center d-grid gap-2"><a class="btn btn-info mt-3 fw-bold shadow-sm"
     href="../index.php"  id="b2h">Back to Home</a></div>
    </div>
   
    </form>
    
    </div>
    </div>


<!--javascript files-->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>

</body>
</html>