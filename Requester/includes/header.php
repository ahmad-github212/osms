<?php 
/*
$rEmail= ;
$sql_img = "SELECT r_imageName FROM requesterlogin_tb WHERE r_email= '$rEmail'" ;
$result_img = $conn->query($sql_img);
$profileImage = "";
if($result_img->num_rows>0){
    $row = $result_img->fetch_assoc() ;
    $GLOBALS['profileImage'] = $row['r_imageName'];
}*/
//$profileImage = $_SESSION['profilePic'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">

    <!-- font awesome-->
    <link rel="stylesheet" href="../CSS/all.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="../CSS/custom.css">

    <title><?php echo TITLE ; ?></title>

    <style>
   body{
       background-image:url('../images/image7.jpg');
        
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top:70px;
    min-height:110vh;
    color:white;
   }
    .nav-link{
        color:white;
    }
    .nav-link.active{
        background-color:lightgray;
        color:black;

    }
    </style>
</head>
<body class="text-white" style="font-weight:bold;">
    <!-- top nav bar -->
    <nav class="navbar  navbar-dark fixed-top  flex-md-nowrap p-1 shadow-lg " style="background-color:#0B0C10; height:12%;">
    <a href="RequesterProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-0" style="font-size:35px;">OSMS</a>
    </nav>
    <!-- end top nav bar -->
    

    
    <div class="container-fluid" style="margin-top:50px;"><!--start container -->
    <div class="row ">                              <!--start row -->
    <nav class="col-sm-2 bg-secondary sidebar py-4"> <!-- start sidebar 1st column -->
    <div class="sidebar-sticky">
    <ul class="nav flex-column d-print-none">
    
    <?php //if(isset($profileImage)){echo $profileImage;}else {echo "default.png" ;} ?>
<?php //echo $_SESSION['profilePic']; ?>
    <li class="text-center"><img src="../upload-images/<?php 
    if(isset($_SESSION['profilePic'])){echo $_SESSION['profilePic'];}else {echo "default.png" ;} ?>" 
    class="img-fluid mb-3" alt="Error Img" style="border-radius:50%;"></li>
    
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'RequesterProfile'){echo 'active';} ?>" href="RequesterProfile.php"><i class="fas fa-user"></i>Profile</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'SubmitRequest'){echo 'active';} ?>" href="SubmitRequest.php"><i class="fab fa-accessible-icon"></i>Submit Request</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'CheckStatus'){echo 'active';} ?>" href="CheckStatus.php"><i class="fas fa-align center"></i>Service Status</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'Requesterchangepassword'){echo 'active';} ?>" href="Requesterchangepassword.php"><i class="fas fa-key"></i>Change Password</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'RequesterFeedback'){echo 'active';} ?>" href="RequesterFeedback.php"><i class="fas fa-comment-dots"></i>Requester Feedback</a></li>
    <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
    </div>
    </nav> <!--end side bar 1st column -->


  