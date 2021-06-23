
<?php 
include('./dbConnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <style>
   .main{
    background-color:black;
    color:white;
    display:flex;
    position:fixed;
    top:0;
    width:100%;
    height:10vh;
    box-sizing:border-box;
    line-height:10vh;
    z-index:1;
   
}
.child1{
    width:5%;
     box-sizing:border-box;
     font-size:5.5vh;
     margin-right:18 px;
     margin-left:5px;
     cursor:pointer;
}   
   
.child2{
    width:95%;
    text-align:center;
     box-sizing:border-box;
     font-size:4vh;
    
}
    </style>
</head>
<body style="padding-left:0px; padding-right:0px;">
<div class="main">
<div class="child1">OSMS</div>
<div class="child2">Buy Your Desired Product</div>
</div>


<?php 

echo '<script>
document.querySelector(".child1").addEventListener("click",()=>{location.href="index.php";});
</script>';

$sql = "SELECT * FROM assets_tb";
$result = $conn->query($sql);



echo '<div class="row" style="margin-top:70px; margin-right:10px; margin-left:10px;">';
while($row=$result->fetch_assoc()){

    
    /* $dtype = gettype($row['pava']);
    echo $dtype ; */
    $int_pava = (int)$row['pava'];
    /* echo $x ;
    $dtype = gettype($x);
    echo $dtype; */

  

    if($int_pava ==0){
        $msg = "out of stock";
        $disablebtn = "disabled";
        ?>

        <div class="card col-sm-3 mb-3" >
    <div class="card-body">
    <h3 class="card-header text-success text-capitalize"><?php echo $row['pname']; ?></h3>
    
    <div class="card-img-top" style="hieght:10%; border:1px solid black;"><img src="./Admin/product-images/<?php if(isset($row['pimage'])){echo $row['pimage'];}
     if($row['pimage']==""){echo "default"."."."png" ;}?>" alt="error image" 
    style="width:100%;"></div>
    
    <h4 class="card-title text-warning">Price : <?php echo $row['psellingcost']; //echo $row['pname'];  ?></h4>
    <div class="card-subtitle "><?php //echo $row['psellingcost']; ?></div>
    <h6 class="card-text text-info">Available : <?php echo $row['pava'] ;?></h6>
     <div class="text-danger"><?php  if(isset($msg)){echo $msg ;} ?></div>
    </div>
   
    <div class="form-group row mb-3 " >
    <form action="transaction.php" method="post">
    <label class="col-sm-4 text-center text-secondary fw-bold">Quantity : </label>
    <input type="number" class="btn btn-light border col-sm-3" name="quantity" id="quantity"
     value=1 >
   
<!--<input type="hidden" name="pname" id="pname" value="<?php // echo $row['pname']; ?>">-->
<input type="hidden" name="pava" id="pava" value="<?php echo $row['pava']; ?>">
<input type="hidden" name="psellingcost" id="psellingcost" value="<?php echo $row['psellingcost']; ?>">
<input type="hidden" name="pid" id="pid" value="<?php echo $row['pid']; ?>">

    <input type="submit" class="btn btn-primary border col-sm-4" name="buybtn" id="buybtn" value="Buy Now"
    <?php echo $disablebtn; ?>>
    </form>
    
    </div>
    </div>

        <?php
    }
    

    elseif(($int_pava <= 5) &&($int_pava >0 )){
        $msg = "hurry only few left!!!";
    
    ?>
    
    <div class="card col-sm-3 mb-3" >
    <div class="card-body">
    <h3 class="card-header text-success text-capitalize" style="font-size:23px;"><?php echo $row['pname']; ?></h3>
    
    <div class="card-img-top"><img src="./Admin/product-images/<?php if(isset($row['pimage'])){echo $row['pimage'];}
    if($row['pimage']==""){echo "default"."."."png" ;}?>" alt="error image" style="width:100%;"></div>
    
    <h4 class="card-title text-warning">Price : <?php echo $row['psellingcost']; //echo $row['pname'];  ?></h4>
    <div class="card-subtitle"><?php// echo $row['psellingcost']; ?></div>
    <h6 class="card-text text-info">Available : <?php echo $row['pava'] ;?></h6>
   <div class="text-danger"><?php  if(isset($msg)){echo $msg ;} ?></div>
    </div>
    
    <div class="form-group row mb-3">
    <form action="transaction.php" method="post">
     <label class="col-sm-4 text-center text-secondary fw-bold" >Quantity : </label>
    <input type="number" class="btn btn-light border col-sm-3" name="quantity" id="quantity" 
    value=1 >

<!--<input type="hidden" name="pname" id="pname" value="<?php //echo $row['pname']; ?>">-->
<input type="hidden" name="pava" id="pava" value="<?php echo $row['pava']; ?>">
<input type="hidden" name="psellingcost" id="psellingcost" value="<?php echo $row['psellingcost']; ?>">
<input type="hidden" name="pid" id="pid" value="<?php echo $row['pid']; ?>">

    <input type="submit" class="btn btn-primary border col-sm-4" name="buybtn" id="buybtn" value="Buy Now">
    </form>
    
    </div>
    </div>
   
    <?php
  
    }
    else{
        ?>
        <div class="card col-sm-3 mb-3" >
    <div class="card-body">
   <h3 class="card-header text-success text-capitalize" ><?php echo $row['pname']; ?></h3>
   
    <div class="card-img-top" ><img src="./Admin/product-images/<?php if(isset($row['pimage'])){echo $row['pimage'];}
    if($row['pimage']==""){echo "default"."."."png" ;}
     ?>" alt="no image" style="width:100%;"></div>
   
    <h4 class="card-title text-warning">Price : <?php echo $row['psellingcost']; //echo $row['pname'];  ?></h4>
    <div class="card-subtitle"><?php// echo $row['psellingcost']; ?></div>
    <h6 class="card-text text-info">Available : <?php echo $row['pava'] ;?></h6>
    </div>
    <div></div>
    <div class="form-group row mb-3 ">
    <form action="transaction.php" method="post">
    <label class="col-sm-4 text-center text-secondary fw-bold" >Quantity : </label>
    <input type="number" class="btn btn-light border col-sm-3" name="quantity" id="quantity" 
    value=1 >

<!--<input type="hidden" name="pname" id="pname" value="<?php //echo $row['pname']; ?>">-->
<input type="hidden" name="pava" id="pava" value="<?php echo $row['pava']; ?>">
<input type="hidden" name="psellingcost" id="psellingcost" value="<?php echo $row['psellingcost']; ?>">
<input type="hidden" name="pid" id="pid" value="<?php echo $row['pid']; ?>">

    <input type="submit" class="btn btn-primary border col-sm-4" name="buybtn" id="buybtn" value="Buy Now">
    </form>
    
    </div>
    </div>
        <?php
    }


}
 echo '</div>';
 
?>

  
</body>
</html>
