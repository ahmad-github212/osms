<?php 
define('TITLE' ,'Work Order');
define('PAGE','work');
include('../dbConnection.php');
include('includes/header.php');
session_start();

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}
else{
    echo '<script>location.href="login.php"</script>';
}

?>

 <!--start 2nd column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
<?php 
$sql = "SELECT * FROM assignwork_tb ";
$result = $conn->query($sql);
if($result->num_rows>0){
    
    echo '<table class="table table-hover fw-bold">';
        echo '<thead>';
            echo '<tr class="bg-dark text-white" style="opacity:0.85;">';
                echo '<th scope="col">Req ID</th>';
                echo '<th scope="col">Req Info</th>';
                echo '<th scope="col">Name</th>';
                echo '<th scope="col">Address</th>';
                echo '<th scope="col">City</th>';
                echo '<th scope="col">Mobile</th>';
                echo '<th scope="col">Technician</th>';
                echo '<th scope="col">Assigned Date</th>';
                echo '<th scope="col">Action</th>';
            echo '</tr>';
        echo '<thead>';

        echo '<tbody>';
        while($row=$result->fetch_assoc()){
            echo '<tr class="bg-light text-dark" style="opacity:0.85;">';
            echo '<td>'.$row['request_id'].'</td>';
            echo '<td>'.$row['request_info'].'</td>';
            echo '<td>'.$row['requester_name'].'</td>';
            echo '<td>'.$row['requester_add1'].' '.$row['requester_add2'].'</td>';
            echo '<td>'.$row['requester_city'].'</td>';
           echo '<td>'.$row['requester_mobile'].'</td>';   
            echo '<td>'.$row['assign_tech'].'</td>';
            echo '<td>'.$row['assign_date'].'</td>';
            echo '<td>' ;
            echo '<form action="viewassignwork.php" method="post">';
            echo '<input type="hidden" name="id" value='.$row["request_id"].'>
            <button class="btn btn-warning btn-sm mb-2" name="view" value="View" type="submit"><i class="far fa-eye"></i></button>';
            echo '</form>';

             echo '<form action="" method="post">';
            echo '<input type="hidden" name="id" value='.$row["request_id"].'>
            <button class="btn btn-secondary btn-sm" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
            echo '</form>';

            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';

    echo '</table>';
   
}
else{
    echo ' 0 result';
}

if(isset($_REQUEST['id'])){
    $sql = "DELETE FROM assignwork_tb WHERE request_id= {$_REQUEST['id']}";
    if($conn->query($sql)==TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    }else{
        echo "Unable to delete data";
    }
}
?>
</div>
<!-- end 2nd column -->

<?php
include('includes/footer.php');
?>