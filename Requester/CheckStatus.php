<?php 
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
//include('includes/header.php');
include('../dbConnection.php');
session_start();

if($_SESSION['is_login']==true){
    $rEmail= $_SESSION['rEmail'];
}else{
    echo"<script>location.href='RequesterLogin.php';</script>" ;
}
include('includes/header.php');
?>

<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-3">
<form action="" method="post" class="d-print-none" >
<div class="form-group" style="float:left;">
<label for="checkid">Enter Request ID: </label>
<input type="text" name="checkid" id="checkid" class="form-control" onkeypress="isInputNumber(event)">
</div>
<button type="submit" class="btn btn-danger mt-4 mx-3 d-print-none" name="search">Search</button>
</form>

<?php 
if(isset($_REQUEST['search'])){
    if($_REQUEST['checkid']==""){
         echo '<div class="alert alert-danger  mt-4">Fill All Fields</div>' ;
    }
    else{
    $sql = "SELECT * FROM assignwork_tb WHERE request_id={$_REQUEST['checkid']}";
    $result = $conn->query($sql) ;
    $row = $result->fetch_assoc() ;
    $row_request_id = isset($row['request_id'])?($row['request_id']):('') ;
    if($_REQUEST['checkid']==$row_request_id){

?>

<h3 class="text-center mt-5">Assigned Work Details</h3>
<table class="table table-bordered  text-white ">
<tbody>
<tr>
<td>Request ID</td>
<td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
</tr>

<tr>
<td>Request Info</td>
<td><?php if(isset($row['request_info'])){echo $row['request_info'];} ?></td>
</tr>

<tr>
<td>Description</td>
<td><?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?></td>
</tr>

<tr>
<td>Name</td>
<td><?php if(isset($row['requester_name'])){echo $row['requester_name'];} ?></td>
</tr>

<tr>
<td>Address</td>
<td><?php if(isset($row['requester_add1']) && isset($row['requester_add2'])){echo $row['requester_add1'].'  '.$row['requester_add2'];} ?></td>
</tr>

<tr>
<td>City</td>
<td><?php if(isset($row['requester_city'])){echo $row['requester_city'];} ?></td>
</tr>

<tr>
<td>State</td>
<td><?php if(isset($row['requester_state'])){echo $row['requester_state'];} ?></td>
</tr>

<tr>
<td>Pincode</td>
<td><?php if(isset($row['requester_zip'])){echo $row['requester_zip'];} ?></td>
</tr>

<tr>
<td>Email</td>
<td><?php if(isset($row['requester_email'])){echo $row['requester_email'];} ?></td>
</tr>

<tr>
<td>Mobile</td>
<td><?php if(isset($row['requester_mobile'])){echo $row['requester_mobile'];} ?></td>
</tr>

<tr>
<td>Assigned Date</td>
<td><?php if(isset($row['assign_date'])){echo $row['assign_date'];} ?></td>
</tr>

<tr>
<td>Technician Name</td>
<td><?php if(isset($row['assign_tech'])){echo $row['assign_tech'];} ?></td>
</tr>

<tr>
<td>Customer Sign</td>
<td></td>
<tr>
<td>Technician Sign</td>
<td></td>
</tr>
</tr>
</tbody>
</table>

<div class="text-center">
<form action="CheckStatus.php" class="mb-3 d-print-none">
<input type="button" class="btn btn-danger" value="Print" onClick="window.print()">
<input type="submit" class="btn btn-secondary" value="Close">
</form>
</div>

<?php }
else{
    echo '<div class="alert alert-warning  mt-4">Your Request is Pending</div>' ;
}
    }
}?>

</div><!-- end 2nd column -->

<script>
function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
}
</script>

<?php 
include('includes/footer.php');
?>