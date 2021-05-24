<?php 
define('TITLE','Success');
include('includes/header.php');
include('../dbConnection.php');
session_start();

if($_SESSION['is_login']==true){
    $rEmail= $_SESSION['rEmail'];
}else{
    echo"<script>location.href='RequesterLogin.php';</script>" ;
}

$sql = "SELECT * FROM submitrequest_tb WHERE request_id= {$_SESSION['myid']}" ;
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
 
 echo "<div class='col-sm-4 ml-5 mt-5'>
        <table class='table text-white'>
        <tbody class='fw-bold'>
        <tr>
            <th>Request ID </th>
            <td>".$row['request_id']."</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>".$row['requester_name']."</td>
        </tr>

        <tr>
            <th>Email ID</th>
            <td>".$row['requester_email']."</td>
        </tr>

        <tr>
            <th>Request Info</th>
            <td>".$row['request_info']."</td>
        </tr>

        <tr>
            <th>Request Description</th>
            <td>".$row['request_desc']."</td>
        </tr>
</tbody>

</table>
 <input class='btn btn-danger d-print-none' type='button' value='Print' onClick='window.print()'>
 <a href='SubmitRequest.php' class='btn btn-secondary'>Close</a>
    </div>" ;
}
else{
    echo"failed";
}

include('includes/footer.php');
?>
