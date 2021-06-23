<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- bootstrap cdn -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <!-- font awesome css -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css">

    <title>OSMS</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
            integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
            crossorigin="anonymous" />
    <style>
        html{
             scroll-behavior:smooth;
        }
        body{
             background-color: #f7f7f7;
        }
      .details{
          margin:10px 0;
          background-color: #fff;
          padding:20px 30px;
          position: relative;
          z-index:1;
          color:orange;
          font-size:20px;

          
      }
      .details:hover{
         color:#FFB404;
      }
      .details h2{
          font-size: 22px;
          text-transform: uppercase;
          transition: 0.6s all;
          color:#fff;
          
      }
      .details p{
          font-size:20px;
          transition: 0.6s all;
          color:#fff;
          height:60px;
          overflow:hidden;
          font-style:italic;
         
      }
      .details a{
          text-decoration: none;
          text-transform: capitalize;
          background-color: #f0ad4e;
          color:#fff;
          padding:6px 12px;
          display: inline-block;
          font-size:14px;
          border:1px solid #f0ad4e;
          transition: 0.6s all;
      }
      .details::before{
          content:"";
          width:5px;
          height:100%;
          background-color: #696969;
          position: absolute;
          left:0;
          top:0;
          z-index:-1;
          transition: 0.6s all;
      }
       .details:hover::before{
           width:100%;
       }
       .details:hover h2, .details:hover p{
           color:#fff;
       }
       .details:hover a{
        background-color: transparent;
        border: 1px solid #fff;
       }

       .details.showContent p{
         height: auto;
       }
       .details.showContent a.readmore-btn{
        background-color:red;

       }
    </style>
  
</head>
<body>
     <!-- Start Navigation -->
<nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top" style="background-color:#0B0C10;">
    <a href="index.php" class="navbar-brand mx-2">OSMS</a>
    <span class="navbar-text ">Customer's Happiness is our Aim</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-4" id="myMenu">
      <ul class="nav navbar-nav custom-nav" >
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link" >Services</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="product.php" class="nav-link" target="_blank">Products</a></li>
        
      </ul>
    </div>
  </nav> <!-- End Navigation -->


<!-- Start Header Jumbotron   -->

  <div class=" jumbotron back-image" style="background-image: url(images/image7.jpg);" >
    <div class="myclass mainHeading">
      <h1 class="text-uppercase text-danger font-weight-bold m-3">Welcome to OSMS</h1>
      <p class="fst-italic pclass m-3 text-white">Customer's Happiness is our Aim</p>
      <a href="Requester/RequesterLogin.php" class="btn btn-success m-3">Login</a>
      <a href="#registration" class="btn btn-danger">Sign Up</a>
    </div> 
  </div> <!-- End Header Jumbotron -->
  

<!-- start intro section-->
    <div class="container-fluid my-4 p-5 bg-secondary">
        <div class="jumbotron text-white bg-dark p-3 mb-2" style="background-color:#0B0C10; border:1px solid white;
         box-shadow:2px 2px 5px 4px white; border-radius:0;">
            <h3 class="text-center">OSMS Services</h3>
            <p>
                OSMS Services is India’s leading chain of multi-brand Electronics and Electrical service
        workshops offering
        wide array of services. We focus on enhancing your uses experience by offering world-class
        Electronic
        Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care
        services to
        keep the devices fit and healthy and customers happy and smiling”.

        With well-equipped Electronic Appliances service centres and fully trained mechanics, we
        provide quality
        services with excellent packages that are designed to offer you great savings.

        Our state-of-art workshops are conveniently located in many cities across the country. Now you
        can book
        your service online by doing Registration.
            </p>
        </div>
    </div>
    <!-- end intro section container-->

    <!-- start services section -->
    <div class="container text-center border-bottom text-white pt-3 mb-3" id="Services" 
    style="background-color:#0B0C10; box-shadow:3px 1px 8px 8px darkgray;">
    <h2>Our Services</h2>
    <div class="row mt-4 mb-4">
        <div class="col-sm-4">
        <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
        <h4 class="mt-4">Electronic Appliances</h4>
        </div>

        <div class="col-sm-4">
        <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
        <h4 class="mt-4">Preventive Maintenance</h4>
        </div>

        <div class="col-sm-4">
        <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
        <h4 class="mt-4">Fault Repair</h4>
        </div>
    </div>
    </div>
    <!-- stop services section-->

    <!--start registration form-->
       <?php  include('UserRegistration.php')?>
    <!-- end reg form container-->

<!-- selecting feedback -->
<?php 
$sql = "SELECT * FROM positivefeedback_tb";
$result = $conn->query($sql);
if($result->num_rows>0){
    $names = [];
    $services =[];
    $rates = [];
    $experiences =[];
    
    while($row=$result->fetch_assoc()){
        array_push($names,$row['name']);
        array_push($services,$row['service']);
        array_push($rates,$row['rate']);
        array_push($experiences,$row['experience']);
    }
}
?>

<!-- start sticky slider -->

    <div class="container-fluid">
      <h2 class="text-center mb-3 text-dark">Happy Customers</h2>
        <div class="row slider">
         <?php 
        if((count($names)>3) && (count($rates)>3) && (count($services)>3) && (count($experiences)>3)){
            for($i=0;$i<count($names);$i++){
            echo '<div class="col-md-12">
            <div class="details bg-secondary">
            <div><span>User : '.$names[$i].'</span><br><span>How Was Our Service? '.$services[$i].'</span><br>
            <span>Ratings : '.$rates[$i].' /5 <i class="fas fa-star"></i></span>
            </div>
            <p>How Was Your Experience? <br>'.$experiences[$i].'</p>
            <a href="javascript:void();" class="readmore-btn">Read More</a>
            </div>
            </div>';
            }
        }
        else{
            $test_names = ["Sohan", "Shadab", "Rajkumar"];
            $test_rates = [4, 5, 4];
            $test_services = ["Good", "Very Good", "Excellent"];
            $test_experiences = ["Services are awesome and works are efficient", "Very Good Start-up", 
            "New way of repairing"];
            
            for($i=0;$i<3;$i++){
            echo '<div class="col-md-12">
            <div class="details bg-secondary">
            <div><span>User : '.$test_names[$i].'</span><br><span>How Was Our Service? '.$test_services[$i].'</span><br>
            <span>Ratings : '.$test_rates[$i].' /5 <i class="fas fa-star"></i></span>
            </div>
            <p>How Was Your Experience? <br>'.$test_experiences[$i].'</p>
            <a href="javascript:void();" class="readmore-btn">Read More</a>
            </div>
            </div>';
            }
        }

        ?>  

           
        </div>
    </div>

<!-- end sticky slider -->


<!-- start contact us-->
<div class= "container bg-light mt-5  px-4 py-3 shadow-lg " id="Contact">
<h2 class="text-center mb-4">Contact Us</h2>
<div class="row">

<!-- start 1stcolumn-->
    <?php include('contactform.php')?> 
<!--end of 1st column-->

<div class="col-md-4 text-center"><!-- start 2nd column-->
<strong>Headquarter:</strong><br>
OSMS pvt Ltd,<br>
Ashok Nagar, Ranchi<br>
Jharkhand - 4356721<br>
Phone: 1234556765<br>
<a href="#" target="_blank">www.osms.com</a><br>

<strong>Branch:</strong><br>
OSMS pvt Ltd,<br>
New Ashok Nagar, Ranchi<br>
Jharkhand - 4356721<br>
Phone: 1234556765<br>
<a href="#" target="_blank">www.osms.com</a>
</div><!-- end 2nd column-->

</div>
</div>
<!--end contact us-->


<!--start footer-->
 <footer class="container-fluid bg-dark text-white mt-5" id="footerContainer" style="border-top: 3px solid #DC3545;">
    <div class="container" id="footerSubContainer ">
      <!-- Start Footer Container -->
      <div class="row py-3" id="footerRow">
        <!-- Start Footer Row -->
        <div class="col-md-4 col-sm-12" id="col1">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us : </span>
          <a href="#" target="_blank" class="pr-2 fi-color" ><i class="fab fa-facebook-f"style="color:red;"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"style="color:red;"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"style="color:red;"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"style="color:red;"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-instagram" style="color:red;"></i></a>
        </div> <!-- End Footer 1st Column -->

         <div class="col-md-4 col-sm-12 ">
          <!-- Start Footer 2nd Column -->
          <small> Designed by Ahmad Shadab Ansari &copy; 2021.
          </small>
        </div>
        <div class="col-md-4 col-sm-12 text-right">
          <small class="ml-2"><a href="Admin/login.php" class="">Admin Login</a></small>
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->

        
<!-- end footer-->

    
    <!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/all.min.js"></script>

  <!-- jquery cdn -->
 

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
            integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
            crossorigin="anonymous"></script>

    <script>
        $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                           
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        

    </script>

<script>
  $(".readmore-btn").on('click',function(){
    $(this).parent().toggleClass("showContent");
    
    var replaceText = $(this).parent().hasClass('showContent')? "Read Less" : "Read More";
    $(this).text(replaceText)
  });
</script>

</body>
</html>