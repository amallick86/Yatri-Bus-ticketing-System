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
					
					
					
					$bus_num = $_GET['bus_num']; 
					$bus_date = $_GET['bus_date'];
					$query1 ="SELECT * from bus_detail where bus_num ='$bus_num' and bus_date='$bus_date'  ";
					$result1= mysqli_query($cser, $query1) or die (mysqli_error());
					$row1 = mysqli_fetch_assoc($result1);
					$bus_price = $row1['bus_price'];  
					$bus_time=$row1['bus_time'];
					
					
		if(isset($_POST['submit_seat']))  
	{  
		$name     = $_POST['name'];  
		$busnum   = $_POST['bnum']; 
		$bus_date = $_POST['date'];
		$bus_seat = $_POST['seats'];
		$bus_from = $_POST['bus_from'];
		$bus_to   = $_POST['bus_to'];
		$seats    = $_POST['seats'];
		$total    = $_POST['total'];
		$username = $row['user_uname'];
		$cmp_name = $row1['cmp_name'];
		$status   = 1;
		$seatno   = 1;
	$result2 = mysqli_query($cser, "insert into bus_seats SET seat_date='$bus_date', bus_num='$busnum', cmp_name='$cmp_name', bus_from='$bus_from', bus_to='$bus_to', seat_name='$bus_seat', seat_uname='$name',username='$username', total_price='$total', bus_time='$bus_time', status='$status', seat_num='$seatno'");   
	
	$user_amount = $row['user_amount'];
	settype($user_amount, "float");
	settype($total, "float");
	$user_amount = $user_amount-$total;
	$result3 = mysqli_query($cser,"update user_account set user_amount='".$user_amount."' where user_id='".$user_id."'");
	
	$query2 = "SELECT * from admin_account where cmp_name='".$cmp_name."'"; 
					$result4 = mysqli_query($cser, $query2) or die ( mysqli_error());
					$row4 = mysqli_fetch_assoc($result4); 
		$cmp_amount = $row4['cmp_amount'];
		settype($cmp_amount, "float");
		settype($total, "float");
		$cmp_amount = $cmp_amount+$total;
		$result5 = mysqli_query($cser,"update admin_account set cmp_amount='".$cmp_amount."' where cmp_name='".$cmp_name."'");
		 if ($result5) {
	        // Registration Success
	       header("location:user_conform_ticket.php?date=$bus_date & seat=$seats");
	    } else {
	        // Registration Failed
	        echo 'choose your seat';
	    }
	}  
	
	?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> <?php echo $row["user_fname"];?> - Seat </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="user_dashboard/css/style.css">
  <link href="seat/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="seat/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="seat/css/style.css" type="text/css" rel="stylesheet">
  <link href="seat/css/style.min.css" rel="stylesheet">
  
</head>

<body>
<div class="row">
<div class="seat seat-pos">

    <form action="#" method="post">
	<h2 class="title"><lable>Choose Your Seat</lable></h2>
    <!-- Medium input -->
<div class="md-form">
  <input type="text" id="inputMDEx" class="form-control"  name="name" value="<?php echo $row["user_fname"];echo " ";echo$row["user_lname"];?>" READONLY>
  <label for="inputMDEx" style="color:red;">Name</label>
</div>
    <div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="bnum" value="<?php echo $bus_num;?>" readonly>
  <label for="inputMDEx" style="color:red;">Bus No.</label>
</div>
    <div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="date" value="<?php echo $bus_date;?>" readonly>
  <label for="inputMDEx"style="color:red;">Date</label>
</div>
    <div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="time" value="<?php echo date('h:i a', strtotime($bus_time ));?>" readonly>
  <label for="inputMDEx"style="color:red;">Time</label>
</div>

<select class="browser-default custom-select" name="seats" style="color:blue;">
  <option selected>Select a Seat *</option>
  <option>A1W</option>
  <option>A2</option>
  <option>B1</option>
  <option>B2W</option>
  <option>A3W</option>
  <option>A4</option>
  <option>B3</option>
  <option>B4W</option>
  <option>A5W</option>
  <option>A6</option>
  <option>B5</option>
  <option>B6W</option>
  <option>A7W</option>
  <option>A8</option>
  <option>B7</option>
  <option>B8W</option>
  <option>A9W</option>
  <option>A10</option>
  <option>B9</option>
  <option>B10W</option>
  <option>A11W</option>
  <option>A12</option>
  <option>B11</option>
  <option>B12W</option>
  <option>A13W</option>
  <option>A14</option>
  <option>B13</option>
  <option>B14W</option>
  <option>A15</option>
   
</select>
<!--<div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="price" value="<?php  $bus_price;?>  " readonly>
  <label for="inputMDEx">Seat price</label>
</div>-->
    <div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="bus_from"value="<?php echo $row1['bus_from'];?>" readonly>
  <label for="inputMDEx" style="color:red;">From</label>
</div>
    <div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="bus_to"value="<?php echo $row1['bus_to'];?>" readonly>
  <label for="inputMDEx" style="color:red;">To</label>
</div>
<div class="md-form">
  <input type="text" id="inputMDEx" class="form-control" name="total" value="<?php echo $bus_price;?>  " readonly>
  <label for="inputMDEx" style="color:red;">Total Price(Rs)</label>
</div>
   <button class="btn aqua-gradient btn-round" name="submit_seat" >Buy a seat</button>

</form>
</div>  <!--end of lower form -->

<div class="container">
<div id="bus">


<div  id="heading">Choose seat</div>




<div id="total-cabin">

<div id="cabin-A">
<!--  cabin portion-->
    
    <form  action="includes/insert.php" method="POST" >


    <input type="checkbox" name="seats" value="A1" >A1<br><br>
    <input type="checkbox"  name ="seats"  value="A2">A2<br><br>
    <input type="checkbox" name ="seats" value="A3">A3<br>
</div>



<div id="cabin-B">
<!--  cabin portion -->
    

    <input type="checkbox" name="seats" value="B1">B1 &nbsp; &nbsp;&nbsp;
    <input type="checkbox"  name ="seats"  value="B2">B2


</div>


</div>


<div id="total-trunk">

<!-- trunk seats LEFT A: -->

<div id="trunk-A">

    
    <input type="checkbox" name ="seats" value="A4">A4 &nbsp; &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="A5">A5 <br><br>


    <input type="checkbox" name ="seats" value="A6">A6 &nbsp; &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="A7">A7  <br><br>


    <input type="checkbox" name ="seats" value="A8">A8 &nbsp; &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="A9">A9 <br><br>

    <input type="checkbox" name ="seats" value="A10">A10 &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="A11">A11 <br><br> 


    <input type="checkbox" name ="seats" value="A12">A12 &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="A13">A13 <br><br> 


    <input type="checkbox" name ="seats" value="A14">A14 &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="A12">A15 <br><br> 

    <input type="checkbox" name ="seats" value="A16">A16 &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="A17">A17 <br><br>


</div>
    




<!-- trunk seats RIGHT B: -->



<div id="trunk-B">

<input type="checkbox" name ="seats" value="B4">B4 &nbsp; &nbsp; &nbsp; 
    <input type="checkbox" name ="seats" value="B5">B5 <br><br> 


    <input type="checkbox" name ="seats" value="B6">B6 &nbsp; &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="B7">B7 <br><br>  


    <input type="checkbox" name ="seats" value="B8">B8 &nbsp; &nbsp;&nbsp;&nbsp;
    <input type="checkbox" name ="seats" value="B9">B9 <br><br>  

    <input type="checkbox" name ="seats" value="B10">B10 &nbsp; &nbsp; 
    <input type="checkbox" name ="seats" value="B11">B11 <br><br>  


    <input type="checkbox" name ="seats" value="B12">B12 &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="B13">B13 <br><br>  


    <input type="checkbox" name ="seats" value="B14">B14 &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="B12">A15 <br><br>  

    <input type="checkbox" name ="seats" value="B16">B16 &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="B17">B17 <br><br>  

    
    <input type="checkbox" name ="seats" value="B18">B18 &nbsp; &nbsp;
    <input type="checkbox" name ="seats" value="B19">B19 <br><br> 

</div>    <!--div of trunk-B --> 





</div>

</div> 
</div>
</div>







<script src="seat/css/selectbus.js"></script>
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
