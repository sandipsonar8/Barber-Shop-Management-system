<?php 
  session_start();
$user=$_SESSION['user'];
if($user==true)
{

}
else
{
  header("location:index.php");
}
  require 'config.php';
   $eid=$_GET['view'];
  $stmt = $conn-> prepare("SELECT * FROM product WHERE pid=?");
  $stmt->bind_param('i',$eid);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  
  $msg="";
 
    
    

 

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
              <li class="nav-item">
                <a href="add-product.php" class="nav-link">Add Product</a>
              </li>       

               <li class="nav-item active">
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
    <div class="col-md-6 bg-dark mt-2 rounded text-white ">
    <h2 class="text-center  p-1">View Product Information</h2>

    <table class="ml-5">
    <tr>
        <td class="pl-5 pb-3">Product Name:</td>
        <td class="pl-5 pb-3"> <?= $row['pname'] ?></td>
    </tr>
    <tr>
        <td class="pl-5 pb-3">Gender :</td>
        <td class="pl-5 pb-3">
        <?php
           if($row['gender']=="boys"){
            echo "Boys";
          }
          if($row['gender']=="girls"){
            echo "Girls";
          }
          if($row['gender']=="both"){
            echo "Both";
          }
           ?>
        </td>
    </tr>
    <tr>
        <td class="pl-5 pb-3">Type:</td>
        <td class="pl-5 pb-3">
        <?php

if($row['type']=="haircut"){
  echo "Hair Cut";
}
if($row['type']=="shave"){
  echo "Shave";
}
if($row['type']=="bleech"){
  echo "Bleech";
}
if($row['type']=="mustach"){
  echo "Mustach";
}
if($row['type']=="facial"){
  echo "Facial";
}
if($row['type']=="haircolor"){
  echo "Hair Color";
}
if($row['type']=="hairstraightening"){
  echo "Hair Straightening";
}
if($row['type']=="spa"){
  echo "Spa";
}

?>
        </td>
    </tr>
    <tr>
        <td class="pl-5 pb-3">Rate:</td>
        <td class="pl-5 pb-3">Rs. <?= $row['price'] ?>/-</td>
    </tr>
    <tr>
        <td class="pl-5 pb-3">Image:</td>
        <td class="pl-5 pb-3"> <img src="<?= $row['pimage'] ?>" height="100px" width="150px" alt=""></td>
    </tr>
    
    </table>
    
</div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
</html>