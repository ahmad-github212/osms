<?php 
define('TITLE' ,'Requesters Feedbacks');
define('PAGE','feedbacks');
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
$sql_positive =  "SELECT * FROM  positivefeedback_tb";
$result_postive = $conn->query($sql_positive);
$email_positive_fbd = [];
if($result_postive->num_rows>0){
//$email_positive_fbd = [];
while($row_positive = $result_postive->fetch_assoc()){
    array_push($email_positive_fbd, $row_positive['email']);
}
}

$sql = "SELECT * FROM requesterfeedback ";
$result = $conn->query($sql);
/* $row_all = $result->fetch_assoc();

$row_common = array_intersect($row_positive, $row_all);
//print_r($row_common); */

if($result->num_rows>0){
    
    echo '<table class="table table-hover fw-bold">';
        echo '<thead>';
            echo '<tr class="bg-dark text-white" style="opacity:0.85;">';
                echo '<th scope="col">Name</th>';
                echo '<th scope="col">Email</th>';
                echo '<th scope="col">Service Status</th>';
                echo '<th scope="col">Rating</th>';
                echo '<th scope="col">Experience</th>';
                echo '<th scope="col">Action</th>';
               
            echo '</tr>';
        echo '<thead>';

        echo '<tbody>';
       
        while($row=$result->fetch_assoc()){
            echo '<tr class="bg-light text-dark" style="opacity:0.85;">';
           
            echo '<td>';
            echo '<span>';
            if(count($email_positive_fbd)>0){
           if(in_array($row['fbd_email'], $email_positive_fbd)){
                echo '<i class="fas fa-check-circle mx-2"></i>';
            }}
            echo '</span>';
            echo $row['fbd_name'];
            echo '</td>';

            echo '<td>'.$row['fbd_email'].'</td>';
            echo '<td>'.$row['fbd_service'].'</td>';
            echo '<td>'.$row['fbd_rate'].'</td>';
            echo '<td>'.$row['fbd_experience'].'</td>';
            echo '<td>' ;

            echo '<form action="" method="post">';
            echo '<input type="hidden" name="id" value='.$row["fbd_id"].'>
            <button class="btn btn-warning btn-sm mb-2 " name="addfeedback" value="addfeedback" type="submit">
            <i class="fas fa-plus"></i></button>';
            echo '</form>';

             echo '<form action="" method="post">';
            echo '<input type="hidden" name="id" value='.$row["fbd_id"].'>
            <button class="btn btn-secondary btn-sm" name="delete" value="Delete" type="submit">
            <i class="fas fa-trash-alt"></i></button>';
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



if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM requesterfeedback WHERE fbd_id= {$_REQUEST['id']}";
    if($conn->query($sql)==TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    }else{
        echo "Unable to delete data";
    }
}

//add to positivefeedback_tb

if(isset($_REQUEST['addfeedback'])){
    $sql1 = "SELECT * FROM requesterfeedback WHERE fbd_id={$_REQUEST['id']}" ;
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();
    
    $name = $row['fbd_name'];
    $email = $row['fbd_email'];
    $service = $row['fbd_service'];
    $rate = $row['fbd_rate'];
    $experience = $row['fbd_experience'];
    
    if($conn->query($sql1)){
        $sql2 = "INSERT INTO positivefeedback_tb (name,email,service,rate,experience) VALUES ('$name',
        '$email', '$service', '$rate','$experience')";


       if($conn->query($sql2)){
          // echo '<meta http-equiv="refresh" content="0;URL=?added"/>';
           echo'<div class="text-dark fw-bold alert alert-success col-md-4 col-sm-4 float-ride">
           inserted successfully</div>';
        
       }
       else{echo'<div class="text-dark fw-bold alert alert-success col-md-4 col-sm-4 float-ride">
           Insert Failed</div>';}
    }else{
        echo'<div class="text-dark fw-bold alert alert-success col-md-4 col-sm-4 float-ride">
           Selection failed</div>';
    }
    
}
?>
</div>

<!-- end 2nd column -->


<?php
include('includes/footer.php');
?>