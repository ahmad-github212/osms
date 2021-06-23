<?php 
session_start();
define('TITLE' ,'Txn Details');
define('PAGE','transactionDetails');
include('../dbConnection.php');
include('includes/header.php');
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>


<!-- 2nd column start -->
<div class="col-sm-9 col-md-10 fw-bold">
<?php
$sql = "SELECT * FROM  transaction_tb" ;
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
   /*  while($row= $result->fetch_assoc()){
    echo '<tr class=" text-center bg-light" style="opacity:0.85; color:black;">' ;
    echo '<td>'.$row['r_login_id'].'</td>' ;
    echo '<td>'.$row['r_name'].'</td>' ;
    echo '<td>'.$row['r_email'].'</td>' ;
    
    echo '</tr>' ;
        } */

    echo '</tbody>

    </table>
    ';
?>

</div>

<?php
include('includes/footer.php');
?>