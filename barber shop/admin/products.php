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
            <h4 class="text-center text-white m-0">! ! ! Products ! ! !</h4>
          </td>
        </tr>
        <tr>
          <th class="text-white">Product ID</th>
          <th class="text-white">Image</th>
          <th class="text-white">Product Name</th>
          <th class="text-white">Rate</th>
          <th class="text-white">Type</th>
          <th class="text-white">Gender</th>

          
          <th class="text-white">
            <i class="fas fa-book"></i>&nbsp;&nbsp;View 
          </th>

          <th class="text-white">
            <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit
          </th>

          <th class="text-white">
            <i class="fas fa-trash"></i>&nbsp;&nbsp;Delete
          </th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
          
          $stmt = $conn-> prepare("SELECT * FROM product ");
//          $stmt->bind_param("s",$user);
          $stmt->execute();
          $result = $stmt->get_result();
          $grand_total = 0;
          while($row = $result->fetch_assoc()):
         ?>
         <tr>
           <td class="text-white"><?= $row['pid'] ?></td>
           <input type="hidden" class="id" value="<?= $row['pid'] ?>">
           <td class="text-white"><img src="<?= $row['pimage'] ?>" width=50> </td>
           <td class="text-white"><?= $row['pname'] ?></td>
           <td class="text-white"><?= "Rs. ".$row['price']."/-" ?></td>
           <td class="text-white">
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
           <td class="text-white">
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

           <td>
              <a href="view-product.php?view=<?= $row['pid'] ?>" class="text-danger lead"><i class="fas fa-book text-white"> View</i></a>
            </td> 

          
           <td>
              <a href="edit-product.php?edit=<?= $row['pid'] ?>" class="text-danger lead"><i class="fas fa-pencil-alt text-white"> Edit</i></a>
            </td>
            <td>
              <a href="deleteproduct.php?remove=<?= $row['pid'] ?>" class="text-danger lead" onclick="return confirm(' Are You Sure You Want To Remove This Item? ');">
              <i class="fas fa-trash-alt text-white"> Delete</i></a>
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