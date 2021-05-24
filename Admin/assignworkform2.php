<?php 
if(session_id()==''){
    session_start();
}


if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}
else{
    echo '<script>location.href="login.php"</script>';
}

if(isset($_REQUEST['view'])){
$sql = "SELECT * FROM submitrequest_tb WHERE request_id={$_REQUEST['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
}

if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}" ;
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?closed">';
    }
}/*else{
    echo 'unable to delete';
}*/

if(isset($_REQUEST['assign'])){
    if(($_REQUEST['request_id']=="") || ($_REQUEST['request_info']=="") || ($_REQUEST['requestdesc']=="") ||
    ($_REQUEST['requestername']=="") || ($_REQUEST['address1']=="") || ($_REQUEST['address2']=="") || 
    ($_REQUEST['requestercity']=="") || ($_REQUEST['requesterstate']=="") || ($_REQUEST['requestermobile']=="") ||
    ($_REQUEST['requesteremail']=="") || ($_REQUEST['requesterzip']=="") || ($_REQUEST['assigntech']=="") ||
    ($_REQUEST['inputDate']=="")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Required</div>';
    }
    else{
        $rid = $_REQUEST['request_id'];
        $rinfo = $_REQUEST['request_info'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['address1'];
        $radd2 = $_REQUEST['address2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rassigntech = $_REQUEST['assigntech'];
        $rdate = $_REQUEST['inputDate'];

        $sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc,  requester_name, requester_add1,
         requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile,
          assign_tech, assign_date) VALUES ('$rid', '$rinfo', '$rdesc','$rname','$radd1','$radd2','$rcity','$rstate',
          '$rzip','$remail','$rmobile','$rassigntech','$rdate')" ;

          if($conn->query($sql)==TRUE){
              $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Work Assigned Successfully</div>';
          }
          else{
              $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Assign Work</div>';
          }
    }
}
?>

<!-- start assigned work 3rd column -->

<div class="col-sm-5 mt-5 pt-5 mb-5 jumbotron" style="background-color:#d3d3d3; opacity:0.85;">
<form action="" method="post" class="px-3" >
    <h5 class="text-center">Assign Work Order Request</h5>
    <div class="form-group my-2">
    <label for="request_id" class="mb-2">Request ID</label>
    <input type="text" class="form-control" id="request_id" name="request_id" readonly 
    value="<?php if(isset($row['request_id'])) echo $row['request_id'];?>">
    </div>

    <div class="form-group my-2">
    <label for="request_info" class="mb-2">Request Info</label>
    <input type="text" class="form-control" id="request_info" name="request_info" 
    value="<?php if(isset($row['request_info'])) echo $row['request_info'];?>" >
    </div>

    <div class="form-group my-2">
    <label for="requestdesc" class="mb-2">Description</label>
    <input type="text" class="form-control" id="requestdesc" name="requestdesc"
    value="<?php if(isset($row['request_desc'])) echo $row['request_desc'];?>" >
    </div>

    <div class="form-group my-2">
    <label for="requestername" class="mb-2">Name</label>
    <input type="text" class="form-control" id="requestername" name="requestername" 
    value="<?php if(isset($row['requester_name'])) echo $row['requester_name'];?>">
    </div>

    <div class="form-group row my-2">
    <div class="form-group col-md-6">
    <label for="address1" class="mb-2">Address Line 1</label>
    <input type="text" class="form-control" id="address1" name="address1"
    value="<?php if(isset($row['requester_add1'])) echo $row['requester_add1'];?>" >
    </div>
    <div class="form-group col-md-6 ">
    <label for="address2" class="mb-2">Address Line 2</label>
    <input type="text" class="form-control" id="address2" name="address2"
    value="<?php if(isset($row['requester_add2'])) echo $row['requester_add2'];?>" >
    </div>
    </div>

    <div class="form-group row my-2">
    <div class="form-group col-md-4">
    <label for="requestercity" class="mb-2">City</label>
    <input type="text" class="form-control" id="requestercity" name="requestercity"
    value="<?php if(isset($row['requester_city'])) echo $row['requester_city'];?>" >
    </div>
    <div class="form-group col-md-4 ">
    <label for="requesterstate" class="mb-2">State</label>
    <input type="text" class="form-control" id="requesterstate" name="requesterstate"
    value="<?php if(isset($row['requester_state'])) echo $row['requester_state'];?>" >
    </div>
    <div class="form-group col-md-4 ">
    <label for="requesterzip" class="mb-2">Pin</label>
    <input type="text" class="form-control" id="requesterzip" name="requesterzip" onkeypress="isInputNumber(event)"
    value="<?php if(isset($row['requester_zip'])) echo $row['requester_zip'];?>" >
    </div>
    </div>

     <div class="form-group row my-2">
    <div class="form-group col-md-8">
    <label for="requesteremail" class="mb-2">Email</label>
    <input type="email" class="form-control" id="requesteremail" name="requesteremail"
    value="<?php if(isset($row['requester_email'])) echo $row['requester_email'];?>" >
    </div>
    <div class="form-group col-md-4 ">
    <label for="requestermobile" class="mb-2">Mobile</label>
    <input type="text" class="form-control" id="requestermobile" name="requestermobile" onkeypress="isInputNumber(event)"
    value="<?php if(isset($row['requester_mobile'])) echo $row['requester_mobile'];?>" >
    </div>
    </div>

    <div class="form-group row my-2">
    <div class="form-group col-md-6">
    <label for="assigntech" class="mb-2">Assign to Technician</label>
    <input type="text" class="form-control" id="assigntech" name="assigntech" >
    </div>
    <div class="form-group col-md-6 ">
    <label for="inputDate" class="mb-2">Date</label>
    <input type="date" class="form-control" id="inputDate" name="inputDate" >
    </div>
    </div>

    <div style="float:right;">
    <button type="submit" class="btn btn-success mr-3 my-2" name="assign">Assign</button>
    <button type="reset" class="btn btn-secondary my-2">Reset</button>
    </div>

</form>
<?php if(isset($msg)){echo $msg;}?>
</div><!-- end assigned work 3rd column -->

<script>
function isInputNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
}
</script>
