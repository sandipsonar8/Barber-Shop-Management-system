<?php
require 'config.php';
session_start();
$uid=$_SESSION['user'];
if($uid!=""){

}
else{
  header('location:../index.php');
}
$pid=$_GET['pid'];
$q="SELECT * FROM PRODUCT WHERE pid='$pid'";
$d=mysqli_query($conn,$q);
$row=mysqli_fetch_assoc($d);
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
	  <li class="nav-item ">
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
  <div class="row justify-content-center">
    <div class="col-md-6 bg-dark mt-2 rounded">
    <h2 class="text-center text-white p-1">Add Booking</h2>
      <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
      <div class="form-group">
            <div class="form-check">
                <div class="row">
                       <div class="col-md-4 pt-5 text-white">
                        Image :-
                        </div>
                      <div class="col-md-8 text-white">
                        <img src="<?= $row['pimage'] ?>" height="150px" width="235px" alt=""> 
                        </div>
                </div>
            </div>  
           </div>
      <div class="form-group">
            <div class="form-check">
                <div class="row">
                       <div class="col-md-4 text-white">
                        Name :-
                        </div>
                      <div class="col-md-8 text-white">
                        <?= $row['pname'] ?>
                        </div>
                </div>
            </div>  
           </div>

           <div class="form-group">
            <div class="form-check">
                <div class="row">
                       <div class="col-md-4 text-white">
                        Rate :-
                        </div>
                      <div class="col-md-8 text-white">
                        Rs. <?= $row['price'] ?>/-
                        </div>
                </div>
            </div>  
           </div>


        
        <div class="form-group">
            <div class="form-check">
                <div class="row">
                       <div class="col-md-4 text-white">
                        Gender :-
                        </div>
                      <div class="col-md-8 text-white">
                        <?= strtoupper($row['gender']) ?>
                        </div>
                </div>
            </div>  
           </div>
        <input type="hidden" name="pid" value="<?= $row['pid'] ?>">
        <input type="hidden" name="uid" value="<?= $uid ?>">

        <div class="form-group">
        <div class="row mt-5">
          <div class="col-md-4 col-4">
            <span class="text-white pb-1 pl-1">Date:</span>
            <input type="date" id="doa" required>
          </div>
          <div class="col-md-4  col-4 pt-1">
          <span class="text-white pb-1 pl-1"> Hour:</span>
          <select name="hour" class="form-control" required>
            <option value="" selected>--- Select ---</option> 
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
        </div>
        <div class="col-md-4 col-4">
          <span class="text-white pb-1 pl-1"> Minute:</span>
          <select name="min" class="form-control" required>
               <option value="" selected>--- Select ---</option>
               <option value="00">00</option>
               <option value="01">01</option>
               <option value="02">02</option>
               <option value="03">03</option>
               <option value="04">04</option>
               <option value="05">05</option>
               <option value="06">06</option>
               <option value="07">07</option>
               <option value="08">08</option>
               <option value="09">09</option>
               <option value="10">10</option>
               <option value="11">11</option>
               <option value="12">12</option>
               <option value="13">13</option>
               <option value="14">14</option>
               <option value="15">15</option>
               <option value="16">16</option>
               <option value="17">17</option>
               <option value="18">18</option>
               <option value="19">19</option>
               <option value="20">20</option>
               <option value="21">21</option>
               <option value="22">22</option>
               <option value="23">23</option>
               <option value="24">24</option>
               <option value="25">25</option>
               <option value="26">26</option>
               <option value="27">27</option>
               <option value="28">28</option>
               <option value="29">29</option>
               <option value="30">30</option>
               <option value="31">31</option>
               <option value="32">32</option>
               <option value="33">33</option>
               <option value="34">34</option>
               <option value="35">35</option>
               <option value="36">36</option>
               <option value="37">37</option>
               <option value="38">38</option>
               <option value="39">39</option>
               <option value="40">40</option>
               <option value="41">41</option>
               <option value="42">42</option>
               <option value="43">43</option>
               <option value="44">44</option>
               <option value="45">45</option>
               <option value="46">46</option>
               <option value="47">47</option>
               <option value="48">48</option>
               <option value="49">49</option>
               <option value="50">50</option>
               <option value="51">51</option>
               <option value="52">52</option>
               <option value="53">53</option>
               <option value="54">54</option>
               <option value="55">55</option>
               <option value="56">56</option>
               <option value="57">57</option>
               <option value="58">58</option>
               <option value="59">59</option>
               <option value="60">60</option>
               </select>
              </div>
              <div class="col-md-4 col-4">
              <span class="text-white pb-1 pl-1"> AM/PM</span>
               <select name="ampm" class="form-control" required>
               <option value="" selected>--- Select ---</option>
               <option value="AM">AM</option>
               <option value="PM">PM</option>
               </select>
              </div>
              </div>
              </div>
              
              

        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add Booking">
        </div>  
        
      </form>
    </div>
  </div>

</div>


<?php
  if(isset($_POST['submit'])){
    $uid=$_POST['uid'];
    $pid=$_POST['pid'];
   // $doa=date('Y-m-d',strtotime($_POST['doa']));
    $hour=$_POST['hour'];
    $min=$_POST['min'];
    $ampm=$_POST['ampm'];
    $status="pending";

    // Check if the selected date and time are already allocated
    $q = "SELECT * FROM booking WHERE hour='$hour' AND ampm='$ampm'";
    $result = $conn->query($q);
    if ($result->num_rows > 0) {
    // The selected date and time are already allocated
      echo "<center><h3>Sorry, that time slot is already taken.</h3></center>";
    }
    else{
    $q="INSERT INTO booking (uid,pid,doa,hour,min,ampm,status) VALUES ('$uid','$pid','$doa','$hour','$min','$ampm','$status')";
    $d=mysqli_query($conn,$q);
    if($d){
?>
      <script>
      alert("Booking Sucessfully Added");
      window.location.href = "bookings.php";
      </script>
<?php
    }
    else{
      $msg="Error !";     
    }
  }
}

?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
	<style type="text/css">
    body{
        background-image: url('../admin/image/_2.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
      }
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