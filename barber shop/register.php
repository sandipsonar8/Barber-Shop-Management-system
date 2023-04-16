<?php
	error_reporting(0);
	require 'config.php';

if(isset($_POST['register'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $mobile = $_POST['mobile'];
  $pass = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM user WHERE mobile=?");
		$stmt->bind_param("i",$mobile);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['mobile'];

   
  	

    if(!$code){


        $q="INSERT INTO USER VALUES('','$fname','$lname','$mobile','$pass')";
			$data=mysqli_query($conn,$q);

      if($data){
        echo '<div class="alert alert-success alert-dismissible mt-2">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Registration Sucessfull !!!</strong>
          </div>';
          ?>
          <script>
          alert("Registration Successfull");
          window.location.href = "index.php";
          </script>
          <?php
      }
    

    }
    else{

			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>User already Registered With This Mobile </strong>
					</div>';	
			}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet"  href="fontawesome-free-5.13.1-web/css/all.css">
    <title>Ashirvad Hair Salon/Spa</title>
    <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
    <style>
      body {
        background-image: url('registrasion_inside.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;   
      }
</style>
  </head>
  <body class="bg-dark">

    <div class="container">
      <div class="row mt-1 justify-content-center">
         <div class="col-md-5">
          <div class="text-center p-2">
            <h1 class="text-white">User Register</h1>
          </div>
          <div id="message"></div>
            <form action="" method="post" class="form-submit"> 
            <span class="text-white ml-1">SIGN UP</span>
            
              <div class="row  mt-2">
                <div class="col-md-6">
                 <div class="form-group"> 
                 <span class="text-white">First Name</span>
                <input type="text" name="fname" class="form-control fname" id="fname" placeholder="*Firstname" required>
                </div>
                </div>

                <div class="col-md-6">
                 <div class="form-group"> 
                 <span class="text-white">Last Name</span>
                <input type="text" name="lname" class="form-control lname" id="lname" placeholder="*Lastname" required>
                </div>
                </div>
              </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group"> 
                <span class="text-white">Mobile Number</span>
                <input type="text" name="mobile"class="form-control lname" id="mobile" placeholder="mobile number" pattern="[0-9]+" maxlength="10" required> <Span> <br>
                </div>
              </div>             
              </div>

              <div class="row">
              <div class="col-md-12">
                <div class="form-group"> 
                <span class="text-white">Password</span>
                <input type="password" name="password" class="form-control password" placeholder="*Password" id="password" required>
                </div>
              </div>
              </div>
            <div class="form-group">
            <input type="submit" name="register"  value="Register" class="btn btn-primary btn-block register" id="register">
            </div>
        </form>
      </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4 ml-5">
      <span class="text-muted">Have an Account?</span> <a href="index.php" class="text-white"> Sign In</a> <br>    
    </div>
  </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<!--
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript">
      
      $(document).ready(function(){
      /*  
        $("#user").blur(function(){
          document.getElementById('available').innerHTML='<h6>hello</h6>';
        });
  */      

        $(".register").click(function(e){
          e.preventDefault();

          var $form = $(this).closest(".form-submit");
          var fname = $form.find(".fname").val();
          var lname = $form.find(".lname").val();
          var mobile = $form.find(".mobile").val();
          var email = $form.find(".email").val();
          var password = $form.find(".password").val();
      
          //console.log(fname,lname,uname,email,password);
          $.ajax({
            url:"ucheck.php",
            method:"post",
            data:{fname:fname,lname:lname,mobile:mobile,email:email,password:password},
            success:function(response){
              $("#message").html(response);
              window.scrollTo(0,0);
            }
          });
        });
       });        
    </script> -->
  </body>
</html>