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
  <title>Products- ADMIN Panel</title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
  <style>
   

  </style>
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

              <li class="nav-item">
                <a href="products.php" class="nav-link">Products</a>
              </li>

              <li class="nav-item">
                <a href="users.php" class="nav-link">Users</a>
              </li>          

              <li class="nav-item active">
                <a href="bookings.php" class="nav-link">Bookings</a>
              </li> 
              
              <li class="nav-item">
                <a href="acceptbooking.php" class="nav-link">Accept Booking</a>
              </li> 

              <li class="nav-item">
                <a href="admin-logout.php" class="nav-link">Logout</a>
              </li>          
            </ul>


          </div>
      </nav>

  </header>

  <div class="container-fluid">
<div class="row ">
  <div class="col-12">
    <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{ echo 'none'; } unset($_SESSION['showAlert']); ?> " class="alert alert-success alert-dismissible mt-3">
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
            <h4 class="text-center text-white m-0">! ! !  Bookings ! ! !</h4>
          </td>
        </tr>
        <tr>
          <th class="text-white">ID</th>
          <th class="text-white">User Name</th>
          <th class="text-white">User Number</th>
          <th class="text-white">Image</th>
          <th class="text-white">Product Name</th>
          <th class="text-white">Rate</th>
          

          
          <th class="text-white">
            <i class="fas fa-clock"></i>&nbsp;&nbsp;Timing 
          </th>

          <th class="text-white">
            <i class="fas "></i>&nbsp;&nbsp;Status
          </th>
          <th class="text-white">Reason</th>

         
          
        </tr>
      </thead>
      <tbody>
        <?php 
          
          
          
        
          $q="SELECT booking.bid, booking.hour, booking.min, booking.ampm, booking.status, booking.reason, product.pname, product.pimage, product.price, product.type, product.gender, user.uid, user.fname, user.lname, user.mobile
          FROM ((booking
          INNER JOIN product ON booking.pid = product.pid)
          INNER JOIN user ON booking.uid = user.uid) ";
          $d=mysqli_query($conn,$q);
          
          while($row=mysqli_fetch_assoc($d)):
         ?>
         <tr>
           <td class="text-white"><?= $row['bid'] ?></td>     
           <td class="text-white"><?= $row['fname']." ".$row['lname'] ?></td>     
           <td class="text-white"><?= $row['mobile'] ?></td>                      
           <td class="text-white"><img src="<?= $row['pimage'] ?>" width=50> </td>           
           <td class="text-white"><?= $row['pname'] ?></td>           
           <td class="text-white"><?= "Rs. ".$row['price']."/-" ?></td>           
           <td class="text-white">
              <?= $row['hour'].":".$row['min']." ".$row['ampm'] ?>
            </td> 

            
           
            <?php
          if($row['status']=="accepted"){
                echo '<td class="text-white bg-success">Accepted</td>';
          }
          if($row['status']=="pending"){
            echo '<td class="text-white bg-warning">Pending</td>';
            }
         if($row['status']=="rejected"){
                echo '<td class="text-white bg-danger">Rejected</td>';
            }
          ?>

<td class="text-white">
             <?php
                if($row['status']=="rejected"){
                  echo $row['reason'];
              }
              else{
                echo "----";
              }
              ?>
            </td> 
            
           
            
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