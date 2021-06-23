<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css -->
   <link rel="stylesheet" href="../CSS/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="../CSS/all.min.css">

    <!--custom css -->
    <link rel="stylesheet" href="../CSS/custom.css">

    <title><?php echo TITLE ; ?></title>

  <style>
   body{
       font-weight:bold;
       background-image:url('../images/image7.jpg');
        
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top:70px;
    min-height:110vh;
 
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
<body>
<!-- top nav bar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-1 shadow " style="background-color:#0B0C10;height:12%;">
    <a href="dashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0 " style="font-size:35px;">OSMS</a>
    </nav>
    <!-- end top nav bar -->

     <div class="container-fluid "style="margin-top:50px;" ><!--start container -->
    <div class="row ">                              <!--start row -->
    <!-- start sidebar 1st column -->
    <nav class="col-sm-2 bg-secondary sidebar py-5 d-print-none" style="opacity:0.85;"> 
    <div class="sidebar-sticky">
    <ul class="nav flex-column ">
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'dashboard'){echo 'active';} ?>" 
    href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
    
    
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'work'){echo 'active';} ?>"
     href="work.php"><i class="fab fa-accessible-icon"></i>Work Order</a></li>
    
    
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'request'){echo 'active';} ?>"
     href="request2.php"><i class="fas fa-align-center"></i>Requests</a></li>
    

    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'assets'){echo 'active';} ?>"
     href="assets.php"><i class="fas fa-database"></i>Assets</a></li>


     <li class="nav-item"><a class="nav-link <?php if(PAGE == 'technician'){echo 'active';} ?>"
     href="technician.php"><i class="fab fa-teamspeak"></i>Technician</a></li>


    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'requesters'){echo 'active';} ?>"
     href="requester.php"><i class="fas fa-users"></i>Requesters</a></li>


     <li class="nav-item"><a class="nav-link <?php if(PAGE == 'sellreport'){echo 'active';} ?>"
     href="soldproductreport.php"><i class="fas fa-table"></i>Sell Report</a></li>

     <li class="nav-item"><a class="nav-link <?php if(PAGE == 'workreport'){echo 'active';} ?>"
     href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>


 <li class="nav-item"><a class="nav-link <?php if(PAGE == 'feedbacks'){echo 'active';} ?>"
     href="feedbacksOfRequesters.php"><i class="fas fa-comment-dots"></i>Feedbacks</a></li>

    <!-- <li class="nav-item"><a class="nav-link <?php if(PAGE == 'transactionDetails'){echo 'active';} ?>"
     href="transactionDetails.php"><i class="fas fa-table"></i>Txn Details</a></li>
-->

    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'changepass'){echo 'active';} ?>" 
    href="changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
    
    
    <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
    </div>
    </nav> <!--end side bar 1st column -->
