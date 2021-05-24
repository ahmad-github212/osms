<?php 
session_start();
define('TITLE' ,'Work Report');
define('PAGE','workreport');
include('../dbConnection.php');
include('includes/header.php');
if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>

<!--  start 2nd column -->
<div class="col-sm-9 col-md-10 mt-5 text-center p-3">
<form action="" method="post" >
<div class="form-group row d-print-none">
<div class="form-group col-sm-2">
<input type="date" class="form-control" id="startdate" name="startdate">
</div>
<div class="from-group col-md-1 pt-2 text-white text-center fw-bold mb-3">to</div>

<div class="form-group col-md-2">
<input type="date" class="form-control" id="enddate" name="enddate">
</div>

<div class="form-group col-md-1">
<input type="submit" class="btn btn-secondary"  name="searchsubmit" value="Search">
</div>

</div>
</form>

<?php 
if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    $sql= "SELECT * FROM assignwork_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo '<p class="bg-dark text-white p-2 mt-4 fw-bold" style="opacity:0.85;">Assigned Work Details</p>';
        echo '<table class="table fw-bold table-hover" style="opacity:0.85;">';
        echo '<thead>';
        echo '<tr class="bg-dark text-white">';
        echo '<th scope="col">Req ID</th>';
        echo '<th scope="col">Request Info</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Address</th>';
        echo '<th scope="col">City</th>';
        echo '<th scope="col">Mobile</th>';
        echo '<th scope="col">Technician</th>';
        echo '<th scope="col">Assigned Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($row= $result->fetch_assoc()){
            echo '<tr class="bg-light text-dark">';
        echo '<td>'.$row["request_id"].'</td>';
        echo '<td>'.$row["request_info"].'</td>';
       echo '<td>'.$row["requester_name"].'</td>';
        echo '<td>'.$row["requester_add1"].' '.$row["requester_add2"].'</td>';
       echo '<td>'.$row["requester_city"].'</td>';
       echo '<td>'.$row["requester_mobile"].'</td>';
        echo '<td>'.$row["assign_tech"].'</td>';
        echo '<td>'.$row["assign_date"].'</td>';
        
        echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '<tr>';
        echo '<td>';
        echo '<input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()">';
        echo '</td>';
        echo '</tr>';
    }
    else{
        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
    }
}
?>

</div>
<!-- end 2nd column -->



<?php
include('includes/footer.php');
?>