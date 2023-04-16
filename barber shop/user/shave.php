<?php
require 'config.php';
session_start();
$uid=$_SESSION['user'];
if($uid!=""){

}
else{
  header('location:../index.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet"  href="fontawesome-free-5.13.1-web/css/all.css">
    <title>Ashirvad Hair Salon/Spa</title>
    <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
  </head>
  <body class="bg-secondary">

  <header>
   
   <nav class="navbar navbar-dark bg-dark navbar-expand-md">
	 <a class="nav-brand text-white" href="dashboard.php" >
	 Ashirvad Hair Salon/Spa
		 </a>

	 <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
	 <div class="collapse navbar-collapse" id="navbarToggler">

	 <ul class="navbar-nav ml-auto">
   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hair Cut
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item " href="haircut.php">Boys</a>
          <a class="dropdown-item" href="haircut1.php">Girls</a>
          
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Hair Straightening
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item " href="hairstraightening.php">Boys</a>
          <a class="dropdown-item" href="hairstraightening1.php">Girls</a>
          
        </div>
      </li>  
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Hair Color
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item " href="haircolor.php">Boys</a>
          <a class="dropdown-item" href="haircolor1.php">Girls</a>
          
        </div>
      </li>  
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Facial
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="facial.php">Boys</a>
          <a class="dropdown-item" href="facial1.php">Girls</a>
          
        </div>
      </li>  
	  <li class="nav-item active">
			 <a href="shave.php" class="nav-link">Shaves</a>
		   </li> 
		   <li class="nav-item ">
			 <a href="bleech.php" class="nav-link">Bleech</a>
		   </li> 

		    <li class="nav-item ">
			 <a href="mustach.php" class="nav-link">Mustach</a>
		   </li> 

		    <li class="nav-item">
			 <a href="spa.php" class="nav-link">Spa</a>
		   </li> 		   
	  
           <li class="nav-item">
			 <a href="bookings.php" class="nav-link">Bookings</a>
		   </li> 	 
	 

		   <li class="nav-item ">
			 <a href="logout.php" class="nav-link">Logout</a>
		   </li> 
		   

		 </ul>


	   </div>
   </nav>

</header>
<div class="container">
  <div id="message"></div>
  <div class="row">
    
  </div>
  <div class="row mt-2 pb-3">
    <?php 
    $type="shave";
    $gender="boys";
    $stmt = $conn->prepare("SELECT *  FROM product WHERE type='$type' AND gender='$gender'");
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()):
     ?>
     <div class="col-sm-6 col-md-4 col-lg-3 mb-2 ">
     <div class="card-deck">
        <div class="card p-2 border-secondary mb-2 bg-dark">
        <img src="<?= $row['pimage'] ?>" height="150px" width="235px" alt=""> 
          <div class="card-body p-1">
            <h4 class="card-title text-center text-white">
              <?= $row['pname'] ?> 
            </h4>
            <h4 class="card-title text-center text-danger">
              Rs. <?= $row['price'] ?>/- 
            </h4>    
            <h4 class="card-title text-center text-warning">
               <?= strtoupper($row['gender']) ?>
            </h4>     
        
          </div>
          <div class="card-footer p-1">
          
             <a href="booking.php?pid=<?= $row['pid'] ?>">
             <button class="btn btn-info btn-block"><i class="fas "></i>&nbsp;&nbsp;Book Slot&nbsp;&nbsp;</button>
             </a>
          </div>
        </div>         
       </div>
     </div>
   <?php endwhile; ?>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
	<style type="text/css">
  *{
  margin: 0%;
  
}
.dropdown:hover>.dropdown-menu {
  display: block;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
</style>
</body>
</html> 