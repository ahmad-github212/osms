<?php 
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();

if($_SESSION['is_login']==true){
    $rEmail= $_SESSION['rEmail'];
}else{
    echo"<script>location.href='RequesterLogin.php';</script>" ;
}

//checking for empty fields
if(isset($_REQUEST['submitrequest'])){
    if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "")|| ($_REQUEST['requestername'] == "")
    || ($_REQUEST['requesteradd1'] == "")|| ($_REQUEST['requesteradd2'] == "")|| ($_REQUEST['requestercity'] == "")
    || ($_REQUEST['requesterstate'] == "")|| ($_REQUEST['requesterzip'] == "")|| ($_REQUEST['requesteremail'] == "")
    || ($_REQUEST['requestermobile'] == "")|| ($_REQUEST['requestdate'] == "")) {
       
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are Required</div>';
    }

    else{
        //saving data to the database
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rdate = $_REQUEST['requestdate'];

        $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2
        , requester_city, requester_state, requester_zip, requester_email, requester_mobile, requester_date) VALUES('$rinfo', 
        '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";

        if($conn->query($sql)==true){
            $genid = mysqli_insert_id($conn); //gives id of the recent request submitted
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Request Submitted Successfully</div>';
            $_SESSION['myid'] = $genid ; //id set on session
            echo"<script>location.href='SubmitRequestSuccess.php';</script>" ;
        }
        else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Submit your Request</div>';
        }
    }
}
?>

 <div class="col-sm-6 col-md-8 mt-5"> <!-- start service request form 2nd column-->

<form action="" method="post" class="mx-5">
<div class="form-group mb-2">
<label for="inputRequestInfo">Request Info</label><input type="text" class="form-control" name="requestinfo" 
id="inputRequestInfo" placeholder="Request Info">
</div>

<div class="form-group mb-2">
<label for="inputRequestDescription">Description</label><input type="text" class="form-control" 
name="requestdesc" id="inputRequestDescription" placeholder="Write Description">
</div>

<div class="form-group mb-2">
<label for="inputName">Name</label><input type="text" class="form-control" 
name="requestername" id="inputName" placeholder="Write Name">
</div>

<div class="form-group row mb-2">
<div class="form-group col-md-6" >
<label for="inputAddress">Address Line 1</label>
<input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1">
</div>

<div class="form-group col-md-6" >
<label for="inputAddress2">Address Line 2</label>
<input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="requesteradd2">
</div>
</div>

<div class="form-group row mb-2">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="requestercity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <input type="text" class="form-control" id="inputState" name="requesterstate">
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Pin</label>
        <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)">
      </div>
    </div>


<div class="form-group row mb-3">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requesteremail">
      </div>
      <div class="form-group col-md-3">
        <label for="inputMobile">Mobile</label>
        <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
      </div>
      <div class="form-group col-md-3">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="requestdate">
      </div>
    </div>

    <button type="submit" class="btn btn-danger my-3" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary my-3">Reset</button>


</form>
<?php if(isset($msg)){echo $msg ;} ?>
</div> <!-- end service request form 2nd column-->

<!--only number for input field -->
<script>
function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  } 
</script>

<?php 
include('includes/footer.php');
?>