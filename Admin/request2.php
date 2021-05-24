<?php 
session_start();
define('TITLE' ,'Requests');
define('PAGE','request');
include('../dbConnection.php');
include('includes/header.php');

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}
else{
    echo '<script>location.href="login.php"</script>';
}
?>

<!-- start 2nd column -->

<div class="col-sm-4 mb-5" >
<?php 
$sql = "SELECT request_id, request_info, request_desc, requester_date FROM submitrequest_tb" ;
$result = $conn->query($sql);

if($result->num_rows > 0){

for($i=1; $i<4; $i++)
{
$row = $result->fetch_assoc();
 echo '<div class="card mt-5 mx-5" style="height:280px; width:320px;opacity:0.85;">';
         echo '<div class="card-header text-danger fw-bold">';
        echo 'Request ID: '. $row['request_id'];
         echo'</div>';

         echo '<div class="card-body">';

         echo '<h5 class="card-title">';
         echo 'Request Info: '.$row['request_info'];
         echo '</h5>';
         
        echo '<p class="card-text text-success text-truncate border">';
         echo $row['request_desc'];
         echo '</p>';

         echo '<p class="card-text text-primary">';
         echo 'Request Date: '.$row['requester_date'];
         echo '</p>';

         
         echo '<div style="float:right">' ;
         echo '<form action="" method="post">';
         echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
         echo '<input type="submit" value="View" class="btn btn-danger" name="view">' ;
         echo '<input type="submit" value="Close" class="btn btn-secondary mx-3" name="close">' ;
         echo '</form>';
         echo '</div>' ;
         
         echo '</div>' ;

         echo '</div>';

}
?>
</div><!--end 2nd column -->

<?php include('assignworkform2.php'); ?>

<div class="row"> <!--start 3rd row -->
 <!-- start 3rd row columns-->
<?php 

     while($row = $result->fetch_assoc()){
         echo '<div class="col-sm-3 mb-5">' ;
         echo '<div class="card mt-3 mx-1" style="height:280px; width:320px;">';
         echo '<div class="card-header text-danger fw-bold">';
        echo 'Request ID: '. $row['request_id'];
         echo'</div>';

         echo '<div class="card-body">';

         echo '<h5 class="card-title">';
         echo 'Request Info: '.$row['request_info'];
         echo '</h5>';
         
       echo '<p class="card-text text-success border text-truncate p-2">';
         echo $row['request_desc'];
         echo '</p>';

         echo '<div class="card-text text-primary" >';
         echo 'Request Date: '.$row['requester_date'];
         echo '</div>';

          echo '<div style="float:right;" class="mt-3" >' ;
         echo '<form action="" method="post" >';
         echo '<input type="hidden" name="id" value='.$row["request_id"].' >';
         echo '<input type="submit" value="View" class="btn btn-danger name="view">' ;
         echo '<input type="submit" value="Close" class="btn btn-secondary mx-3" name="close">' ;
         echo '</form>';
         
         echo '</div>' ;

         echo '</div>' ;
         
         echo '</div>';
         echo '</div>';
     }
}

?>
<!-- end 3rd row columns-->
</div> <!-- end 3rd row -->

<?php
include('includes/footer.php');
?>