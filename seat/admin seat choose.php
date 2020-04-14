<?php 
session_start();
    include_once 'creatdb.php';
    $user = new User();

    $user_id = $_SESSION['user_id'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['logout'])){
        $user->user_logout();
        header("location:login.php");
    }
	$cser=mysqli_connect("localhost","root","","yatri_db");
					$query = "SELECT * from user_account where user_id='".$user_id."'"; 
					$result = mysqli_query($cser, $query) or die ( mysqli_error());
					$row = mysqli_fetch_assoc($result);
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> <?php echo $row["user_fname"];?> - Seat </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="seat/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="seat/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="seat/css/style.css" rel="stylesheet">
  
</head>

<body>

<div class="seat seat-pos">

    <form action="#" method="post">
	<h2 class="title"><lable>Choose Your Seat</lable></h2>
    <!-- Medium input -->
<div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="<?php echo $row["user_fname"];?>">
  <label for="inputMDEx">Name</label>
</div>
    <div class="md-form">
  <input type="text" id="inputMDEx" class="form-control">
  <label for="inputMDEx">Bus No.</label>
</div>

<select class="browser-default custom-select">
  <option selected>Select a Seat</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
<div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="count">
  <label for="inputMDEx">Seat price</label>
</div>
<div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="count">
  <label for="inputMDEx">Total Price</label>
</div>



   <button class="btn aqua-gradient btn-round">Next</button>

</form>
</div>  <!--end of lower form -->











  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="seat/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="seat/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="seat/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="seat/js/mdb.min.js"></script>
</body>

</html>
