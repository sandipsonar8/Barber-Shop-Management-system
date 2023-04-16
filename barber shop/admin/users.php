<?php 
session_start();
$user=$_SESSION['user'];
require 'config.php';
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
  <title>User- ADMIN Panel</title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
</head>
<body class="bg-secondary">

<body class="bg-secondary">

  
    
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

              <li class="nav-item">
                <a href="products.php" class="nav-link">Products</a>
              </li>

              <li class="nav-item active">
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

  <div class="container-fluid">
<div class="row ">
  <div class="col-12">
    <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{ echo 'none'; } unset($_SESSION['showAlert']); ?> " class="alert alert-danger alert-dismissible mt-3">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>
        <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']); ?>
      </strong>
    </div>
    <div class="table-responsive mt-2">
      <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <td colspan="12">
            <h4 class="text-center text-white m-0">! ! ! Users ! ! !</h4>
          </td>
        </tr>
        <tr>
          <th class="text-white">User ID</th>
            <th class="text-white">Name</th>
          <th class="text-white">Mobile Number</th>
          
              
        </tr>
      </thead>
      <tbody>
        <?php 
          
          $stmt = $conn-> prepare("SELECT * FROM user ");
          $stmt->execute();
          $result = $stmt->get_result();
          $grand_total = 0;
          while($row = $result->fetch_assoc()):
         ?>
         <tr>
           <td class="text-white"><?= $row['uid'] ?></td>
            <td class="text-white"><?= $row['fname']." ".$row['lname'] ?></td>
           <td class="text-white"><?= $row['mobile'] ?></td>      
           
                               

          
           
            
         </tr>
         
       <?php endwhile; ?>
       
      </tbody>
      </table>
    </div>
  </div>
</div>
</div>


  
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
</html>