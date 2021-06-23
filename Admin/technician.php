<?php 
session_start();
define('TITLE' ,'Technician');
define('PAGE','technician');
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
<div class="col-sm-9 col-md-10 mt-5 text-center fw-bold">
<p class="bg-dark text-white p-2 fw-bold" style="opacity:0.85;">List of Technicians</p>

<?php 
$sql = "SELECT * FROM technician_tb";
$result= $conn->query($sql);
if($result->num_rows>0){
    echo '<table class="table table-hover">';
    echo '<thead>';
    echo '<tr class="bg-dark text-white" style="opacity:0.85;">';
    echo '<th scope="col">Emp ID</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">City</th>';
    echo '<th scope="col">Mobile</th>';
    echo '<th scope="col">Email</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
        while($row=$result->fetch_assoc()){
            echo '<tr class="bg-light text-dark fw-bold" style="opacity:0.85;">';
            echo '<td>'.$row['empid'].'</td>';
            echo '<td>'.$row['empName'].'</td>';
            echo '<td>'.$row['empCity'].'</td>';
            echo '<td>'.$row['empMobile'].'</td>';
            echo '<td>'.$row['empEmail'].'</td>';
            echo '<td>';
            echo '<form action="editemp.php" method="post" class="d-inline">';
            echo '<input type="hidden" name="id" value='.$row["empid"].'>
         <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button>';
            echo '</form>';

            echo '<form action="" method="post" class="d-inline">';
            echo '<input type="hidden" name="id" value='.$row["empid"].'>
         <button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>';
            echo '</form>';

            echo '</td>';
            echo '</tr>';
        }
    echo '</tbody>';
    echo '</table>';
    
}else{
    echo '0 results';
}
?>

</div>
<!-- 2nd column end -->

<?php
if(isset($_REQUEST['delete'])){
    $sql= "DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}" ;
    if($conn->query($sql)==TRUE){
        echo '<meta http-equiv="refresh" content="0; url=?deleted"/>';
    }
    else{
        echo 'Unable to delete';
    }
}
?>

</div>  <!-- end row-->

<div style="float:right;"> <a href="insertemp.php" class="btn btn-danger mx-2"><i class="fas fa-plus fa-2x"></i></a>
</div>

</div>   <!--end container-->
   

<!--javascript-->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html> 


