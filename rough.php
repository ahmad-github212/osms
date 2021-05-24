<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

</style>
</head>
<body>

<?php 
/*
$pass1= "thapa";
$str_pass1 = password_hash($pass1,PASSWORD_BCRYPT);
echo $str_pass1;

$pass_check1 = password_verify($pass1,$str_pass1);
echo '<br>';
echo $pass_check1;
if($pass_check1){
    echo '<br>loginned';
}else{
    echo '<br>not login';
}

$pass2= "thapa";
$str_pass2 = password_hash($pass2,PASSWORD_BCRYPT);
echo $str_pass1;

$pass_check2 = password_verify($pass2,$str_pass2);
echo '<br>';
echo $pass_check2;
if($pass_check2){
    echo '<br>loginned';
}else{
    echo '<br>not login';
}
if($str_pass1===$str_pass2){
    echo '<br>Same';
}else{
    echo '<br>Not same';
}
*/
?>
<?php 
if(isset($_FILES['image'])){
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    move_uploaded_file($file_tmp,"upload-images/".$file_name);
    
}
?>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="image" class="btn btn-sm" ><br><br>
<input type="submit">
</form>





<!--<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>  --> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>