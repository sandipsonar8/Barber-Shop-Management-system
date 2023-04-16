<?php 
  require 'config.php';
  session_start();
  error_reporting(0);
$user=$_SESSION['user'];
if($user==true)
{

}
else
{
  header("location:index.php");
}

  $msg="";
  if(isset($_POST['submit'])){
    $pName=$_POST['pName'];
    $price=$_POST['price'];
    $type=$_POST['type'];
    $gender=$_POST['gender'];
   
/*
    if($_POST['budgetfriendly']!=""){
      $budgetfriendly=$_POST['budgetfriendly'];
    }
    else{
      $budgetfriendly=0;
    }

*/
    

    //$p_code=$_POST['pCode'];
    //$p_type=$_POST['pType'];

    //$target_dir="../propertyimages/";
   /// $target_file=$target_dir.basename($_FILES['pImage']["name"]);
   // move_uploaded_file($_FILES['pImage']["tmp_name"],$target_file);

    $filename=$_FILES["pImage"]["name"];
	$tempname=$_FILES["pImage"]["tmp_name"];
	$folder="../productimages/".$filename;
	move_uploaded_file($tempname, $folder);


   // $astat="YES";
    $q="INSERT INTO product (pname,pimage,price,type,gender) VALUES ('$pName','$folder','$price','$type','$gender')";
    $d=mysqli_query($conn,$q);
    if($d){
      ?>
      <script>
      alert("Product Successfully Added");
      window.location.href = "add-product.php";
      </script>
      <?php

    }
    else{
      $msg="Error !";     
    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet"  href="fontawesome-free-5.13.1-web/css/all.css">
  <title>ADMIN Panel</title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
</head>
<body class="bg-secondary">

  <header>
    
      <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <a class="nav-brand text-white" href="admin-panel.php" >
        Ashirvad Hair Salon/Spa
            </a>

        <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarToggler">

        <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a href="add-product.php" class="nav-link">Add Product</a>
              </li>       

               <li class="nav-item">
                <a href="products.php" class="nav-link">Products</a>
              </li> 

              <li class="nav-item">
                <a href="users.php" class="nav-link">Users</a>
              </li>  

              <li class="nav-item">
                <a href="bookings.php" class="nav-link">Bookings</a>
              </li> 
              
              <li class="nav-item">
                <a href="acceptbooking.php" class="nav-link">Accept Booking</a>
              </li> 

              <li class="nav-item ">
                <a href="admin-logout.php" class="nav-link">Logout</a>
              </li>          
            </ul>


          </div>
      </nav>

  </header>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 bg-dark mt-2 rounded">
    <h2 class="text-center text-white p-1">Add Product Information</h2>
      <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
        <div class="form-group">
        <span class="text-white pb-1 pl-1">Product Name</span>
          <input type="text" name="pName" class="form-control" placeholder="Product Name" required>           
        </div>  
        <div class="form-group">
        <span class="text-white pb-1 pl-1">Rate</span>
          <input type="text" name="price" class="form-control" placeholder="Rate" required>           
        </div> 
        <div class="form-group">
        <div class="row mt-4">
        <div class="col-md-4  col-4 pt-1">
        <span class="text-white pb-1 pl-1"> Type:</span>
              </div>
              <div class="col-md-8 col-8">
               <select name="type" class="form-control" required>
               <option value="" selected>--- Select ---</option>
               <option value="haircut">Hair Cut</option>
               <option value="shave">Shave</option>
               <option value="bleech">Bleech</option>
               <option value="mustach">Mustach</option>
               <option value="facial">Facial</option>
               <option value="haircolor">Hair Color</option>
               <option value="hairstraightening">Hair Straightening</option>
               <option value="spa">Spa</option>
               </select>
              </div>
              </div>
              </div>


        <div class="form-group">

<div class="form-check">
   <div class="row">

       <div class="col-md-4 text-white">
        Gender :-
      </div>
   
      <div class="col-md-4">
      
          <input class="form-check-input" type="radio" name="gender" value="boys" id="flexCheckDefault" required>
          <label class="form-check-label text-white" for="flexCheckDefault">Boys</label>
      </div>
      <div class="col-md-4">
          <input class="form-check-input" type="radio" name="gender" value="girls" id="flexCheckDefault" required>
          <label class="form-check-label text-white" for="flexCheckDefault">Girls</label>
      </div>
      
  </div>
</div>  

</div>

        
        <div class="form-group">
          <div class="custom-file">
         
          <label for="inputPassword" class="col-form-label text-white">Upload Photo</label>
            <input type="file" name="pImage" class="form-control" required>
           
          </div>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add Product">
        </div>  
        <div class="form-group">
          <h4 class="text-center text-white"><?= $msg; ?></h4>
        </div>  
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 mt-1  p-2 bg-dark rounded">
      <a href="products.php" class="btn btn-primary btn-block btn-lg">Go to products page
      </a>
    </div>
  </div>
</div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>
</html>