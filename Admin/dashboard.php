<?php 
session_start();

define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('../dbConnection.php');
include('includes/header.php');

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}
else{
    echo '<script>location.href="login.php"</script>';
}

//request recieved
$sql= "SELECT * FROM submitrequest_tb";
$result = $conn->query($sql);
$numrow1 = $result->num_rows;

// assign work
$sql= "SELECT * FROM assignwork_tb";
$result = $conn->query($sql);
$numrow2 = $result->num_rows;

//no. of technicians
$sql= "SELECT * FROM technician_tb";
$result = $conn->query($sql);
$numrow3 = $result->num_rows;

?>


<!-- START 2nd column dashboard -->
<div class="col-sm-9 col-md-10 fw-bold">
 <div class="row text-center mx-5 ">
 
 <div class="col-sm-4 mt-5"> <!-- start column 1 request recieved card  -->
 <div class="card text-white bg-danger mb-3" style="max-width:18rem; opacity:0.88;">
 <div class="card-header">
    Requests Recieved
 </div>
 <div class="card-body">
 <h4 class="card-title"><?php if(isset($numrow1)){echo $numrow1;} ?></h4>
 <a class="btn text-white" href="request2.php">View</a>
 </div>
 </div>
 </div>  <!-- end  column 1 request recieved card -->

<div class="col-sm-4 mt-5"> <!-- start column2 assigned work card  -->
 <div class="card text-white bg-success mb-3" style="max-width:18rem;opacity:0.88;">
 <div class="card-header">
    Assigned Work
 </div>
 <div class="card-body">
 <h4 class="card-title"><?php if(isset($numrow2)){echo $numrow2;} ?></h4>
 <a class="btn text-white" href="work.php">View</a>
 </div>
 </div>
 </div>  <!-- end column2  assigned work card -->

<div class="col-sm-4 mt-5"> <!-- start column3 technician card -->
 <div class="card text-white bg-info mb-3" style="max-width:18rem;opacity:0.88;">
 <div class="card-header">
    No. of Technician
 </div>
 <div class="card-body">
 <h4 class="card-title"><?php if(isset($numrow3)){echo $numrow3;} ?></h4>
 <a class="btn text-white" href="technician.php">View</a>
 </div>
 </div>
 </div>  <!-- end column3 technician card -->

 </div> <!-- end dashboard row1-->

<div class="mx-5 mt-5 text-center">
<p class="bg-dark text-white p-2  fw-bold" style="opacity:0.85;">List of Requesters</p>

<?php 
$sql= "SELECT * FROM requesterlogin_tb" ;
$result = $conn->query($sql);
if($result->num_rows>0){
    echo ' 
    <table class="table table-hover fw-bold">
    
    <thead>
    <tr class="bg-dark text-white text-center" style="opacity:0.85;">
    <th scope="col" >Requester ID </th>
    <th scope="col"  >Name</th>
    <th scope="col" >Email</th>
    </tr>
    </thead>

    <tbody> ';
    while($row= $result->fetch_assoc()){
    echo '<tr class=" text-center bg-light" style="opacity:0.85; color:black;">' ;
    echo '<td>'.$row['r_login_id'].'</td>' ;
    echo '<td>'.$row['r_name'].'</td>' ;
    echo '<td>'.$row['r_email'].'</td>' ;
    
    echo '</tr>' ;
        }

    echo '</tbody>

    </table>
    ';
}
else{
    echo '0 results';
}
?>

</div>

</div>
<!-- end 2nd column dashboard -->


<?php
include('includes/footer.php');
?>
