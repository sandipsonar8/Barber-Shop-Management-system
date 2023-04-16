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

              <li class="nav-item">
                <a href="bookings.php" class="nav-link">Bookings</a>
              </li> 
              
              <li class="nav-item active">
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
            <h4 class="text-center text-white m-0">! ! ! Accept Bookings ! ! !</h4>
          </td>
        </tr>
        <tr>
          <th class="text-white">Booking ID</th>
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

         
          
        </tr>
      </thead>
      <tbody>
        <?php 
          
          
          
        $status="pending";
          $q="SELECT booking.bid, booking.hour, booking.min, booking.ampm, booking.status, booking.reason, product.pname, product.pimage, product.price, product.type, product.gender, user.uid, user.fname, user.lname, user.mobile
          FROM ((booking
          INNER JOIN product ON booking.pid = product.pid)
          INNER JOIN user ON booking.uid = user.uid) WHERE booking.status='$status'";
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

            
           
           <td class="text-white">
           <a href="accept-booking.php?bid=<?= $row['bid'] ?>" class="text-success lead" ><button class="btn  btn-success"> Accept</button></a>
           ||
           <a href="accept-booking.php?bid=<?= $row['bid'] ?>" class="text-success lead" data-toggle="modal" data-target="#modalContactForm"><button class="btn  btn-danger"> Reject</button></a>

            </td> 
            
           
            
         </tr>
         <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">Reject Booking</h2>
            </div>
            <form action="" method="post">
            <div class="modal-body mx-3">
                
                <div class="md-form mb-5">
                    <input type="hidden" name="bid" value="<?= $row['bid'] ?>">
					<label data-error="wrong" data-success="right" for="email">Reason:</label>
                    <textarea name="reason" id="" cols="30" rows="5" class="form-control"></textarea>
                 </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            <input type="submit" name="submit" id="send" class="btn btn-info" value="SUBMIT">
                
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
         
       <?php endwhile; ?>
       
      </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
    $reason=$_POST['reason'];
    $bid=$_POST['bid'];
    $st="rejected";

    $q="UPDATE booking SET reason='$reason', status='$st' WHERE bid='$bid'";
    $d=mysqli_query($conn,$q);

    if($d){
        ?>
					<script>
					alert("Booking Rejected");
					window.location.href = "acceptbooking.php";
					</script>
					<?php

    }
}

?> 
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
</html>