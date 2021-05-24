<?php 
define('TITLE', 'Requester Feedback');
define('PAGE', 'RequesterFeedback');
include('includes/header.php');
include('../dbConnection.php');
session_start();

if($_SESSION['is_login']==true){
    $rEmail= $_SESSION['rEmail'];
}else{
    echo"<script>location.href='RequesterLogin.php';</script>" ;
}

$sql = "SELECT r_name, r_email FROM requesterlogin_tb WHERE r_email= '$rEmail'" ;
$result = $conn->query($sql);

if($result->num_rows==1){
    $row= $result->fetch_assoc();
    $rName = $row['r_name'];  
}
$rEmail = $_SESSION['rEmail'];
if(isset($_REQUEST['submitFeedback'])){
if((!isset($_REQUEST['rName']))|| (!isset($_REQUEST['rEmail'])) || (!isset($_REQUEST['rFservice'])) ||
(!isset($_REQUEST['rate'])) || (!isset($_REQUEST['rExperience']))){
    $passmsg =  '<div class="alert alert-warning col-sm-6 col-md-10 mx-5 mt-2" role="alert">Fill All Fields</div>';
}
else{
    $rname = $_REQUEST['rName'];
    $rEmail1 = $_REQUEST['rEmail'];
    $rFservice = $_REQUEST['rFservice'];
    $rate = $_REQUEST['rate'];
    $rExperience = $_REQUEST['rExperience'];

    $sql = "INSERT INTO requesterfeedback (fbd_name, fbd_email, fbd_service, fbd_rate, fbd_experience)
    VALUES ('$rname', ' $rEmail1', '$rFservice', '$rate', '$rExperience')";

    if($conn->query($sql)==true){
        $passmsg = '<div class="alert alert-success col-sm-6 col-md-10 mx-5 mt-2">Feedback Submitted Successfully</div>';
    }
    else{
        $passmsg = '<div class="alert alert-danger col-sm-6 col-md-10 mx-5 mt-2">Unable to Submit Feedback</div>';
    }
}
}

?>

<div class="col-sm-6 col-md-6 mt-5">
<form action=" " method="post" class="mx-5">
    <div class="form-group">
    <label for="rEmail">Email</label> <input class="form-control" type="email" name="rEmail" id="rEmail" 
    value="<?php echo $rEmail; ?>" >
    </div>

    <div class="form-group">
    <label for="rName">Name</label> <input class="form-control" type="text" name="rName" id="rName" 
    value="<?php echo $rName;?> " >
    </div>

 <div class="form-group row my-3">
 <div style="font-size:30px; line-height:30px;" class="mb-2 fw-bold">How was our Service?</div>
 <div class="col-md-3 ">
    <label for="excellent" style="font-size:20px;" >Excellent</label>
    <input type="radio" name="rFservice" id="excellent" value="Excellent">
</div>
    <div class="col-md-3 ">
    <label for="verygood" style="font-size:20px;">Very Good</label>
    <input type="radio" name="rFservice" id="verygood" value="Very Good">
</div>
<div class="col-md-2 ">
    <label for="good" style="font-size:20px;">Good</label>
    <input type="radio" name="rFservice" id="good" value="Good">
    </div>

<div class="col-md-4 ">
    <label for="tobeimproved" style="font-size:20px;">To be improved</label>
    <input type="radio" name="rFservice" id="tobeimproved" value="To be improved">
    </div>
</div>

<div class="form-group row my-3 ">
    <div style="font-size:30px;line-height:30px;" class="mb-3 fw-bold">Rate Our Works & Services.</div>
        
    <div class="col-md-2 col-sm-2 col-2" >
        <label for="rate1" id="label1" onclick="changeOnCheck1()"><i class="fas fa-star fa-2x "></i></label>
        <input type="radio" id="rate1" name="rate" value="1" style="display:none;">
    </div>

    <div class="col-md-2 col-sm-2 col-2">
        <label for="rate2" id="label2" onclick="changeOnCheck2()"><i class="fas fa-star fa-2x "></i></label>
        <input type="radio" id="rate2" name="rate" value="2" style="display:none;">
    </div>

    <div class="col-md-2 col-sm-2 col-2">
        <label for="rate3" id="label3" onclick="changeOnCheck3()"><i class="fas fa-star fa-2x"></i></label>
        <input type="radio" id="rate3" name="rate" value="3" style="display:none;">
    </div>

    <div class="col-md-2 col-sm-2 col-2">
        <label for="rate4" id="label4" onclick="changeOnCheck4()"><i class="fas fa-star fa-2x"></i></label>
        <input type="radio" id="rate4" name="rate" value="4" style="display:none;">
    </div>

    <div class="col-md-2 col-sm-2 col-2">
        <label for="rate5" id="label5" onclick="changeOnCheck5()"><i class="fas fa-star  fa-2x"></i></label>
        <input type="radio" id="rate5" name="rate" value="5" style="display:none;">
    </div>
    </div>
   <!-- script for rating stars--> 
    <script>
        function changeOnCheck1(){
          var label1 = document.getElementById('label1');  
          label1.style.color = "red";}

          function changeOnCheck2() {
              changeOnCheck1();
          var label2 = document.getElementById('label2');
            label2.style.color = "red";}

            function changeOnCheck3() {
                    changeOnCheck1();
                    changeOnCheck2();
            var label3 = document.getElementById('label3');
            label3.style.color = "red";}

            function changeOnCheck4() {
                    changeOnCheck1();
                    changeOnCheck2();
                    changeOnCheck3();
            var label4 = document.getElementById('label4');
            label4.style.color = "red";}

    function changeOnCheck5() {
        changeOnCheck1();
        changeOnCheck2();
        changeOnCheck3();
        changeOnCheck4();
            var label5 = document.getElementById('label5');
            label5.style.color = "red";}
    </script>
<!-- end script for rating stars--> 

<div class="form-group mt-4">
<textarea class="form-control" placeholder="Describe your Experience with OSMS"
 name="rExperience" id="rExperience" style="resize:none;"></textarea>
</div>

<button type="submit" class="btn btn-info mt-3 text-white " name="submitFeedback">Submit</button>
    </form>
    <?php if(isset($passmsg)){echo $passmsg ;}  ?>
</div>

<?php 
include('includes/footer.php');
?>