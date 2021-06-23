<?php 
session_start();
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include('../dbConnection.php');


if($_SESSION['is_login']==true){
    $rEmail= $_SESSION['rEmail'];
}else{
    echo"<script>location.href='RequesterLogin.php';</script>" ;
}
$sql = "SELECT r_name, r_email, r_imageName FROM requesterlogin_tb WHERE r_email= '$rEmail'" ;
$result = $conn->query($sql);
$row= $result->fetch_assoc();

if($result->num_rows==1){
    //$row= $result->fetch_assoc();
    $rName = $row['r_name'];  
    $_SESSION['profilePic'] = $row['r_imageName'];
}
if(isset($_REQUEST['nameupdate'])){
if($_REQUEST['rName'] == ""){
    $passmsg =  '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
}
else{
    if(!($_FILES['rImageUpdate']['name']=="")){
        
        $rName = $_REQUEST['rName'];
        $filename = $_FILES['rImageUpdate']['name'];
        $tempname = $_FILES['rImageUpdate']['tmp_name'];
        move_uploaded_file($tempname, '../upload-images/'. $filename);
        $oldimage  =  $_SESSION['profilePic'] ;
        //echo 'hello';
        if($oldimage){
        unlink('../upload-images/'.$oldimage);
        } 
         $_SESSION['profilePic']= $filename ;
        $sql = "UPDATE requesterlogin_tb SET r_name = '$rName', r_imageName='$filename' WHERE r_email='$rEmail'";
         if($conn->query($sql)==TRUE){
        $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
    }
    else{
        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
    }
    }
    if($_FILES['rImageUpdate']['name']==""){
        $sql = "UPDATE requesterlogin_tb SET r_name = '$rName' WHERE r_email='$rEmail'";
         if($conn->query($sql)==TRUE){
        $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
    }
    else{
        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update </div>';
    }
    }
  

  /*  $rName = $_REQUEST['rName'];
     $sql = "UPDATE requesterlogin_tb SET r_name = '$rName' WHERE r_email='$rEmail'";
     if($conn->query($sql)==TRUE){
        $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
    }
    else{
        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
    } */ 
}
}
include('includes/header.php') ;
?>

    <div class="col-sm-6 mt-5" > <!-- start profile area second column-->
    <form action=" " method="post" class="mx-5"  enctype="multipart/form-data">
    <div class="form-group ">
    <label for="rEmail" class="mb-2">Email</label> <input class="form-control" type="email" name="rEmail" id="rEmail" readonly
    value="<?php echo $rEmail; ?>">
    </div>

    <div class="form-group my-3">
    <label for="rName" class="mb-2">Name</label> <input class="form-control" type="text" name="rName" id="rName" 
    value="<?php echo $rName;?>">
    </div>

    <div class="form-group">
    <label for="rImageUpdate" class="mb-2">Update Profile Image</label>
     <input class="form-control bg-secondary text-white" 
    type="file" name="rImageUpdate" 
    id="rImageUpdate">
    </div>

    <button type="submit" class="btn btn-danger mt-3" name="nameupdate">Update</button>

    <?php if(isset($passmsg)){echo $passmsg ;}
       
    ?>
    </form>
    </div>  <!-- end profile area second column-->

   

   <?php include('includes/footer.php') ?>