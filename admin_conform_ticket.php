<?php 
session_start();
    include_once 'creatdb.php';
    $admin = new Admin();

    $admin_id = $_SESSION['admin_id'];

    if (!$admin->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['logout'])){
        $admin->admin_logout();
        header("location:login.php");
    }
	$cser=mysqli_connect("localhost","root","","yatri_db");
					$query = "SELECT * from admin_account where admin_id='".$admin_id."'"; 
					$result = mysqli_query($cser, $query) or die ( mysqli_error());
					$row = mysqli_fetch_assoc($result);
					
					$bus_date = $_GET['date']; 
					$seat = $_GET['seat'];
					$bus_num =$_GET['busnum'];
					$query1="SELECT * FROM bus_seats where seat_date='$bus_date' and seat_name='$seat' and bus_num='$bus_num'";
					$result1 = mysqli_query($cser, $query1) or die ( mysqli_error());
					$row1 = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html>
<head>
	

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> <?php echo $row["cmp_name"];?> - Ticket </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="admin_dashboard/css/style.css">
    <link rel="stylesheet" href="admin_dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_dashboard/vendors/base/vendor.bundle.base.css">
   <link href="css layout/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="css layout/css_slider.css" type="text/css" rel="stylesheet" media="all">
      <link href="css layout/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
  <link href="seat/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="seat/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="seat/css/style.css" rel="stylesheet">
  <link href="seat/css/table.css" rel="stylesheet">
</head>
<body>
	<div class="ticket">
		<form>
				
			<div id="yatri">
			 <b>Yatri</b> 
			</div>
			<div id="cmp">
			<b><?php echo $row1["cmp_name"];?></b>
			</div>
			<div id="date-text">
			  Date
			<input type="text" name="Date" id="date" value="<?php echo $bus_date?>" readonly>
			</div>
			
			<div id="bus-text">
			  Bus No.
			<input type="text" name="Bus_No." id="bus_no"  value="<?php echo $row1["bus_num"];?>" readonly>
		    </div>
		
		    <div id="ticket-no">
		      Ticket No.
		    <input type="text" name="ticket-no" id="Ticket_no" value="<?php echo $row1["seat_id"];?>" readonly>
		    </div>
			
			<table id="table">
				<tr>
					<td>Phone</td>
					<td><input type="text"  name="" id="phone" value="<?php echo $row1["phone"];?>" readonly></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text"  name="" id="name" value="<?php echo $row1["seat_uname"];?>" readonly></td>
				</tr>


				<tr>
					<td>From</td>
					<td><input type="text"  name="" id="from" value="<?php echo $row1["bus_from"];?>" readonly></td>
					
					<td style="padding: 10px;">To</td>
					<td><input type="text"   name="" id="to" value="<?php echo $row1["bus_to"];?>" readonly></td>
				</tr>

				<tr>
					<td>Seat No.</td>
					<td><input type="text"  name="" id="no_of_seat" value="<?php echo $seat?>" readonly></td>
					<td style="padding: 10px;">No. of seat </td>
					<td><input type="text" name="" id="seat_no" value="<?php echo $row1["seat_num"];?>"  readonly></td>
				</tr>

				<tr>
					<td>Total Price</td>
					<td><input type="text" name="" id="total_price" value="Rs <?php echo $row1["total_price"];?>" readonly></td>
					<td style="padding: 10px;">Time</td>
					<td><input type="text" name="" id="time" value="<?php echo date('h:i a', strtotime($row1["bus_time"]));?>" readonly></td>
				</tr>
			</table>
			<li class="nav-item dropdown d-lg-flex d-none" >
                  <button id="home" type="button" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='admin_dash.php'">HOME</button>
                </li>
				<li class="nav-item dropdown d-lg-flex d-none" >
                  <button id="pdf"type="button" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='admin_pdf.php?date=<?php echo $bus_date?> & seat=<?php echo $seat?>'">PRINT <i class="fa fa-file-text fa-spin" aria-hidden="true"></i><span class="sr-only">Loading...</span></button>
                </li>
		</form>
	</div>


    
	  <script type="text/javascript" src="seat/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="seat/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="seat/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="seat/js/mdb.min.js"></script>
</body>
</html>