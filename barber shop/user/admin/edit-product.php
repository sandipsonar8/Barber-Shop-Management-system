<?php 
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
  require 'config.php';
   $eid=$_GET['edit'];
  $stmt = $conn-> prepare("SELECT * FROM product WHERE pid=?");
  $stmt->bind_param('i',$eid);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  
  $msg="";
  if(isset($_POST['submit'])){
    $pName=$_POST['pName'];
    $price=$_POST['price'];
    $type=$_POST['type'];
    $gender=$_POST['gender'];

    $filename=$_FILES["pImage"]["name"];
	$tempname=$_FILES["pImage"]["tmp_name"];
	$folder="../productimages/".$filename;
	move_uploaded_file($tempname, $folder);
    
  if($filename!=""){
  	$folder="../productimages/".$filename;
    move_uploaded_file($tempname, $folder);
  }
  else{
    $folder=$row['pimage'];

  }

  if($pName!=""){

  }
  else{
    $pName=$row['pname'];

  }

  if($price!=""){

  }
  else{
    $price=$row['price'];

  }

  if($type!=""){

  }
  else{
    $type=$row['type'];

  }



  if($gender!=""){

  }
  else{
    $gender=$row['gender'];

  }

  
    


 
      $stmt1 = $conn->prepare("UPDATE product SET  pname=?, pimage=?,  price=?, type=?, gender=?     WHERE pid=?");
    $stmt1->bind_param("sssssi", $pName,$folder,$price,$type,$gender,$eid);
    $dat=$stmt1->execute();
      if($dat){
        ?>
					<script>
					alert("Property Upadated Successfully");
					window.location.href = "edit-product.php?edit=<?= $eid ?>";
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
              PG.com
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

              <li class="nav-item ">
                <a href="merchants.php" class="nav-link">Merchants</a>
              </li> 

              <li class="nav-item">
                <a href="orders.php" class="nav-link">Orders</a>
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
    <h2 class="text-center text-white p-1">Edit Product Information</h2>
    <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">   
            <div class="form-group">
        <span class="text-white">Property Name :-</span>
          <input type="text" name="pName" class="form-control" placeholder="Property Name" value="<?= $row['pname'] ?>">           
        </div>  
        <div class="form-group">
        <span class="text-white">Price in number :-</span>
          <input type="text" name="price" class="form-control" placeholder="Price in number" value="<?= $row['price'] ?>">           
        </div> 

        <div class="form-group">
        <div class="row">
          <div class="col-md-6 text-white">
            Gender (Current Value) :-
          </div>
          <div class="col-md-6 text-white">
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
          </div>
        </div>
        </div>

        <div class="form-group">

<div class="form-check">
   <div class="row">

       <div class="col-md-4 text-white">
        Gender :-
      </div>
   
      <div class="col-md-2">
      
          <input class="form-check-input" type="radio" name="gender" value="boys" id="flexCheckDefault" >
          <label class="form-check-label text-white" for="flexCheckDefault">Boys</label>
      </div>
      <div class="col-md-2">
          <input class="form-check-input" type="radio" name="gender" value="girls" id="flexCheckDefault" >
          <label class="form-check-label text-white" for="flexCheckDefault">Girls</label>
      </div>
      <div class="col-md-2">
          <input class="form-check-input" type="radio" name="gender" value="both" id="flexCheckDefault" >
          <label class="form-check-label text-white" for="flexCheckDefault">Both</label>
      </div>    
  </div>
</div>  

</div>

<div class="form-group">
        <div class="row">
          <div class="col-md-6 text-white">
          Type (Current Value) :-
          </div>
          <div class="col-md-6 text-white">
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
          </div>
        </div>
        </div>


        <div class="form-group">
        <div class="row mt-4">
        <div class="col-md-4  col-4 pt-1">
        <span class="text-white pb-1 pl-1"> Type:</span>
              </div>
              <div class="col-md-8 col-8">
               <select name="type" class="form-control" >
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
        <div class="row">
          <div class="col-md-6 text-white pt-4">
         Property Image (Current) :-
          </div>
          <div class="col-md-6 text-white">
          <img src="<?= $row['pimage']  ?>" height="100" width="200" alt="">
          </div>
        </div>
        </div> 
        
        <div class="form-group">
          <div class="custom-file">
         
          <label for="inputPassword" class="col-form-label text-white">Upload Photo</label>
            <input type="file" name="pImage" class="form-control">
           
          </div>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-danger btn-block" value="Update Property Details">
        </div>  
        <div class="form-group">
          <h4 class="text-center text-white"><?= $msg; ?></h4>
        </div>  
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 mt-1  p-2 bg-dark rounded">
      <a href="products.php" class="btn btn-primary btn-block btn-lg">Go to Products page
      </a>
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