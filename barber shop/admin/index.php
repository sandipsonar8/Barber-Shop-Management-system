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
    <title>Admin-Login</title>
   <link rel="shortcut icon" type="image/png" href="images/logo.png">
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="row mt-5 justify-content-center">
         <div class="col-md-6">
          <div class="text-center p-2">
            <h2 class="text-white">Ashirvad Hair Salon/Spa</h2>
          </div>
          <div id="message"></div>
            <form action="" method="post" class="form-submit"> 
            <span class="text-white ml-1"> <h6> Admin Login</h6></span>
            <div class="form-group mt-2">
            <input type="text" name="user" class="form-control  user" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
            <input type="password" name="pass" class="form-control  pass" placeholder="Enter Password" id="pass" required>
            </div>  
            <div class="form-group">
            <input type="submit" name="login"  value="Login" class="btn btn-primary btn-block login" id="login">
            </div>
        </form>
      </div>
  </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
<style>
body{
  background-image: url('image/_1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".login").click(function(e){
          e.preventDefault();
          var $form = $(this).closest(".form-submit");
          var user = $form.find(".user").val();
          var pass = $form.find(".pass").val();
          //console.log(user,pass,name,email,mobile,aadhar,address);
          $.ajax({
            url:"check1.php",
            method:"post",
            data:{user:user,pass:pass},
            success:function(response){
              $("#message").html(response);
              window.scrollTo(0,0);
            }
          });          
        });
       });
    </script>
  </body>
</html>