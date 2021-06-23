<?php 
$sql = "SELECT r_imageName FROM requesterlogin_tb WHERE r_email= '$rEmail'" ;
$result = $conn->query($sql);
$row= $result->fetch_assoc();

if($result->num_rows==1){
    //$row= $result->fetch_assoc();
    $_SESSION['profilePic'] = $row['r_imageName'];
}
?>