<?php 
include('../dbConnection.php');

session_start();
if(!isset($_SESSION['is_adminlogin'])){
if(isset($_REQUEST['aEmail'])){
$aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
$aPassword =  mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
$sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE 
a_email='".$aEmail."' AND a_password='".$aPassword."' limit 1" ;

$result = $conn->query($sql);

if($result->num_rows == 1){
    $_SESSION['is_adminlogin'] = TRUE ;
    $_SESSION['aEmail'] = $_REQUEST['aEmail'];
   echo "<script>location.href='dashboard.php' ;</script>";
    exit;

}
else{
    $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password</div>';
}
}
}
else{
    echo "<script>location.href='dashboard.php' ;</script>";
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

    <title>Admin Login</title>
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
<body  class="text-white bg-secondary">
     <div class="container">
   <!-- <div class= "mt-5 mb-3 text-center" style="font-size:30px;">
    <i class="fas fa-users-cog"></i>
    <span>Online Service Maintenance System</span>
    </div>

    <p class="text-center" style="font-size:20px;"> <i class="fas fa-user-secret text-danger"></i>Admin Area</p>
-->

    <div class="row justify-content-center mt-5" >
    <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-6">
    <form action="" method="POST" class="p-4 form-grad"
     style="border:2px solid white; box-shadow:3px 1px 8px 8px white;">
   
   <div class= "text-center" style="font-size:30px;">
    <i class="fas fa-users-cog"></i>
    <span>Online Service Maintenance System</span>
    </div>

     <p class="text-center mt-2" style="font-size:20px;"> <i class="fas fa-user-secret text-danger"></i>Admin Area</p>


    <div class="form-group">
    <i class="fas fa-user"></i><label for="email" class="fw-bold pl-2 mb-2">Email</label>
    <input type="email" class="form-control mb-2" placeholder="Email" name="aEmail"> 
    <small>We'll never share your Email with anyone else </small>
    </div>

    <div class="form-group mt-2">
    <i class="fas fa-key"></i><label for="pass" class="fw-bold pl-2 mb-2">Password</label>
    <input type="password" class="form-control mb-2" placeholder="Password" name="aPassword"> 
    </div>
    <div class="d-grid gap-2">
    <button type="submit" class="shadow-sm btn btn-outline-danger mt-3 fw-bold ">Login</button>
    </div>
    <?php if(isset($msg)){echo $msg;} ?>
    
    <div class="text-center  d-grid gap-2"><a class="btn btn-info mt-3 fw-bold shadow-sm"
     href="../index.php" id="b2h">Back to Home</a></div>
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