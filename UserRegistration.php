    <?php 
    //db connection
    /* include('dbConnection.php');

    if(isset($_REQUEST['rSignup'])){
    //checking for empty fields
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword']=="")){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required </div>';
    }

    else{
    //Email Already Registered
    $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST['rEmail']."'";
    $result = $conn->query($sql);
    if($result->num_rows==1){
         $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Exists </div>';
    }
    else{
    //catching the info of user in the variables
    $rName = $_REQUEST['rName'];
    $rEmail = $_REQUEST['rEmail'];
    $rPassword = $_REQUEST['rPassword'];

    //sql query
    $sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password) VALUES('$rName', '$rEmail', '$rPassword')";
    if($conn->query($sql) == TRUE){
         $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Created Successfully </div>';
    }
    else{
         $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
    }
    }
    }
    }
 */
//mic check

 include('dbConnection.php');

  if(isset($_REQUEST['rSignup'])){
    // Checking for Empty Fields
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "") || !(isset($_FILES['image']))){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    } else {
      $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST['rEmail']."'";
      $result = $conn->query($sql);
      
      if($result->num_rows > 0){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
      } else {
        // Assigning User Values to Variable
        $rName = $_REQUEST['rName'];
        $rEmail = $_REQUEST['rEmail'];
        $rPassword = password_hash($_REQUEST['rPassword'],PASSWORD_BCRYPT);

        $file_name = $_FILES['image']['name'];
         $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file( $file_tmp, "upload-images/".$file_name);
       
        $sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password, r_imageName) VALUES ('$rName','$rEmail', '$rPassword', '$file_name')";
        if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';
        
          //add code for direct redirection to profile bypassing login page
  
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
        }
      }
    }
  }
    ?>
    
    <div class="container bg-secondary text-white" id="registration" style="box-shadow:3px 1px
                8px 8px darkgray;">
    
       <!-- <h2 class="text-center mb-1">Create an Account</h2>-->
        <div class="row  mb-5 mt-2" >
            <div class="col-md-6 offset-md-3 my-4">
                <form action="" method="POST" class="p-4 m-3" style="border:2px solid white; box-shadow:3px 1px
                8px 8px white;" enctype="multipart/form-data">
                <div class="text-center" style="font-size:26px;">
                Create an Account
                </div>
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2 mb-1">Name</label>
                        <input type="text" class="form-control mb-2"placeholder="Name" name="rName">
                    </div>

                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2 mb-1">Email</label>
                        <input type="email" class="form-control"placeholder="Email" name="rEmail">
                    </div>
                    <small class="form-text mb-2">We will never share your email with anyone else</small>

                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2 mb-1">Password</label>
                        <input type="password" class="form-control mb-2"placeholder="Password" name="rPassword">
                    </div>

                  <div class="form-group">
                   <label for="image" class="mb-2 font-weight-bold">Upload Image</label>
                    <input type="file" class="form-control bg-secondary text-white"
                    name="image" id="image">
                    </div>

                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-danger mt-3 shadow-sm font-weight-bold"
                    name="rSignup">Sign Up </button>
                    </div>
                    <em style="font-size:10">Note - By clicking Sign Up, you agree to our Terms, Data Policy
                    and Cookie Policy</em>

                    <?php if(isset($regmsg)){echo $regmsg ; } ?>
                    
                </form>
            </div>    
        </div>
        </div>
     