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
     while($row = $result->fetch_assoc()){
         echo '<div class="card mt-5 mx-5">';
         echo '<div class="card-header text-danger fw-bold">';
        echo 'Request ID: '. $row['request_id'];
         echo'</div>';

         echo '<div class="card-body">';

         echo '<h5 class="card-title">';
         echo 'Request Info: '.$row['request_info'];
         echo '</h5>';
         
        echo '<p class="card-text text-success">';
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
}
?>
</div> <!-- end 2nd column -->

<div id="overlay" onclick="off()">
  <div id="text"><?php include('assignworkform.php'); ?></div>
</div>

<script>
function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}
</script>

<?php include('assignworkform.php'); ?>

<?php
include('includes/footer.php');
?>