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
					
					
					
					$bus_num = $_GET['busnumber']; 
					$bus_date = $_GET['dateofbus'];
					$query1 ="SELECT * from bus_detail where bus_num ='$bus_num' and bus_date='$bus_date'  ";
					$result1= mysqli_query($cser, $query1) or die (mysqli_error());
					$row1 = mysqli_fetch_assoc($result1);
					$bus_price = $row1['bus_price'];  
					$bus_time=$row1['bus_time'];
					
					
		if(isset($_POST['submit_seat']))  
	{  
		$name     = $_POST['name'];
		$seats    = $_POST['seats'];
		$total    = $_POST['total'];
		$username = 0;
		$cmp_name = $row1['cmp_name'];
		$phone	  = $_POST['phone'];
		$status   = 1;
		$seatno   = 1;
	$result2 = mysqli_query($cser, "update bus_seats SET phone='$phone', seat_uname='$name',username='$username', total_price='$total', status='$status', seat_num='$seatno' where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='$seats'");   
	$result3 = mysqli_query($cser, "UPDATE `bus_seats` SET timestamp=now() where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='$seats'");
	if ($result3) {
	        // Registration Success
	       header("location:admin_conform_ticket.php?date=$bus_date & seat=$seats & busnum=$bus_num");
	    } else {
	        // Registration Failed
	        echo 'choose your seat';
	    }
	}  
	
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php echo $row["cmp_name"];?> - Dashboard </title>
    <!-- base:css -->
    <link rel="stylesheet" href="admin_dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_dashboard/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
	<!-- css files -->
	 <link href="seat/css/table.css" rel="stylesheet">
    <link href="css layout/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css layout/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="css layout/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <link href="css layout/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->
	  <link href="seat/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="seat/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="seat/css/style.css" rel="stylesheet">
  <link href="seat/css/style.min.css" rel="stylesheet">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="admin_dashboard/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="admin_dashboard/images/yatrilogo.jpg" />
  </head>
  <body>
    <div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.php -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
              <li class="nav-item ml-0 mr-5 d-lg-flex d-none">
                <a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
              </li>
              <li class="nav-item nav-search d-none d-lg-block ml-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="search" >
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <input  type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="search">
                </div>
              </li>	
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="admin_dash.php">
				<label class="logotext" >Yatri</label><a>   <style>.logotext{
																font-family:Colonna MT;
																font-weight:bold; 
																font-size:70px; 
																color:#1d19bd;
																position: relative;
																-webkit-animation: myfirst 5s linear 2s infinite alternate; /* Safari 4.0 - 8.0 */
																animation: myfirst 5s linear 2s infinite alternate;
																			}
																	/* Safari 4.0 - 8.0 */
																@-webkit-keyframes myfirst {
																  0%   { left:0px; top:0px;}
																  25%  { left:200px; top:0px;}
																  100% { left:0px; top:0px;}
																}

																/* Standard syntax */
																@keyframes myfirst {
																  0%   { left:0px; top:0px;}
																  25%  { left:200px; top:0px;}
																  100% { left:0px; top:0px;}
																}
															</style>
            </div>
            <ul class="navbar-nav navbar-nav-right">
			
                <li class="nav-item dropdown d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='admin_dashboard/pages/forms/admin_setting.php'">Settings<i class="fa fa-cog fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span></button>
                </li>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"><?php echo $row["cmp_name"];?></span>
                    <span class="online-status"></span>
                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item" href="admin_dashboard/pages/tables/admin_today_ticket.php">
                        <i class="fa fa-ticket fa-1x" style="color:blue;" aria-hidden="true"></i><span class="sr-only">Loading...</span>
                        Ticket(<?php $currentDateTime = date("Y-m-d");
						echo $currentDateTime;?>)
                      </a>
					  <a class="dropdown-item" href="admin_dashboard/pages/tables/admin_today_bus.php">
                        <i class="fa fa-bus fa-1x" style="color:blue;" aria-hidden="true"></i><span class="sr-only">Loading...</span>
                        Bus(<?php $currentDateTime = date("Y-m-d");
						echo $currentDateTime;?>)
                      </a>
					  <a class="dropdown-item" href="admin_dashboard/pages/forms/admin_setting.php">
                        <i class="fa fa-cog fa-spin fa-1x fa-fw" style="color:blue;"></i><span class="sr-only">Loading...</span>
                        Settings
                      </a>
                      <a class="dropdown-item" href="logout.php">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="admin_dash.php">
                  <i class="fa fa-file-text " aria-hidden="true"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="admin_dashboard/pages/forms/admin_search.php" class="nav-link">
                    <i class="fa fa-search " aria-hidden="true"></i>
                    <span class="menu-title">Search</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                   <a href="admin_dashboard/pages/tables/ticket detail.php" class="nav-link">
                    <i class="fa fa-table " aria-hidden="true"></i>
                    <span class="menu-title">Ticket Detail</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
            </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card">
              <div class="card">
                <div class="card-body">

    <form action="#" method="post">
	<h2 class="title"><lable>Choose Your Seat</lable></h2>
    <!-- Medium input -->
	<div class="md-form">
  <input type="text" id="inputMDEx" class="form-control"  name="phone" required="" >
  <label for="inputMDEx" style="color:red;">Phone</label>
</div>
<div class="md-form">
  <input type="text" id="inputMDEx" class="form-control"  name="name" required=""  >
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
<?php 
	$query3 = "SELECT * from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date'and status='0'"; 
					$result3 = mysqli_query($cser, $query3) or die ( mysqli_error());
				?>
<select class="browser-default custom-select" name="seats" style="color:blue;width:90%" required="">
  <option selected>Select a Seat *</option>
  <?php while ($row3 = mysqli_fetch_assoc($result3)) {?>
		
  <option><?php  echo $row3['seat_name'];?></option><?php }?>
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
  <!--end of lower form -->
                </div>
              </div>
            </div>
             <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card">
              <div class="card">
                <div class="card-body">
				<div id="Def" style=" position: absolute;
								font-size:20px;
								  left:20px;
								  top:55px;">
				
				<div style ="color:blue;font-size:20px;">C = Cabin<br>
				S = Special<br>
				W = Windows</div>
				<div style ="color:red;font-size:25px;">Red color Booked</div>
				<div style ="color:#026440;font-size:25px;">Green color Available</div>
				</div>
				<div id="out" style=" position: absolute;
				WIDTH:61%;
				height:85%;
										   top: 20px;
										  left: 250px;
										  border: 2px solid red;
										  border-radius: 5px;
										 ">
                 <div id="text" style=" position: absolute;
  right:565px;
  top:-5px;">
			<button class="btn aqua-gradient btn-round" name="submit_seat" style="width:361%;font-size:150%;" > Front of the bus</button>
			</div>
			<div id="C1" style=" position: absolute;
								
								  left:25px;
								  top: 65px;">
				<?php $queryC1 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='C1'"; 
					$resultC1 = mysqli_query($cser, $queryC1) or die ( mysqli_error());
					$rowC1 = mysqli_fetch_assoc($resultC1);
					$STATUSC1 = $rowC1['status'];
					
					if($STATUSC1 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>C1</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>C1</p>";}?>
					
				</div>
				<div id="Driver" style=" position: absolute;
				font-size:40px;
								  left:280px;
								  top: 55px;
								  color:red;">
				Driver
				</div>
				<div id="C2" style=" position: absolute;
								  left:25px;
								  top: 115px;">
				<?php $queryC2 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='C2'"; 
					$resultC2 = mysqli_query($cser, $queryC2) or die ( mysqli_error());
					$rowC2 = mysqli_fetch_assoc($resultC2);
					$STATUSC2 = $rowC2['status'];
					
					if($STATUSC2 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>C2</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>C2</p>";}?>
					
				</div>
				<div id="C3" style=" position: absolute;
								  left:25px;
								  top: 165px;">
				<?php $queryC3 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='C3'"; 
					$resultC3 = mysqli_query($cser, $queryC3) or die ( mysqli_error());
					$rowC3 = mysqli_fetch_assoc($resultC3);
					$STATUSC3 = $rowC3['status'];
					
					if($STATUSC3 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>C3</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>C3</p>";}?>
					
				</div>
				<div id="C4" style=" position: absolute;
								 left:265px;
								  top: 165px;">
				<?php $queryC4 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='C4'"; 
					$resultC4 = mysqli_query($cser, $queryC4) or die ( mysqli_error());
					$rowC4 = mysqli_fetch_assoc($resultC4);
					$STATUSC4 = $rowC4['status'];
					
					if($STATUSC4 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>C4</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>C4</p>";}?>
					
				</div>
				<div id="C5" style=" position: absolute;
								 left:335px;
								  top: 165px;">
				<?php $queryC5 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='C5'"; 
					$resultC5 = mysqli_query($cser, $queryC5) or die ( mysqli_error());
					$rowC5 = mysqli_fetch_assoc($resultC5);
					$STATUSC5 = $rowC5['status'];
					
					if($STATUSC5 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>C5</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>C5</p>";}?>
					
				</div>
				<hr style="border: 1.5px solid red; border-radius: 5px; width:40%; position: absolute;
								 left:0px;
								  top: 185px;" />
				<hr style="border: 1.5px solid red; border-radius: 5px; width:43%; position: absolute;
								 left:250px;
								  top: 185px;" />
			 <hr style="border: 1.5px solid white; border-radius: 5px; height:6%; position: absolute;
								 left:-1.5px;
								  top: 196px;" />
								  
				<div id="S1" style=" position: absolute;
								 left:265px;
								  top: 215px;">
				<?php $queryS1 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='S1'"; 
					$resultS1 = mysqli_query($cser, $queryS1) or die ( mysqli_error());
					$rowS1 = mysqli_fetch_assoc($resultS1);
					$STATUSS1 = $rowS1['status'];
					
					if($STATUSS1 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>S1</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>S1</p>";}?>
					
				</div>
				
				<div id="S2" style=" position: absolute;
								  left:335px;
								  top: 215px;">
								  
				<?php $queryS2 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='S2'"; 
					$resultS2 = mysqli_query($cser, $queryS2) or die ( mysqli_error());
					$rowS2 = mysqli_fetch_assoc($resultS2);
					$STATUSS2 = $rowS2['status'];
					
					if($STATUSS2 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>S2</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>S2</p>";}?>
					
				</div>
				<div id="Door" style=" position: absolute;
				font-size:40px;
								  left:0px;
								  top: 205px;
								  color:red;">
				<i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp&nbsp <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				&nbsp&nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp&nbsp  <i class="fa fa-share fa-rotate-90" style="position: absolute;
				top: 25px;"aria-hidden="true"></i>
				</div>
				<div id="A1W" style="position: absolute;
								  left:25px;
								  top: 265px;
								">
				<?php $queryA1W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A1W'"; 
					$resultA1W = mysqli_query($cser, $queryA1W) or die ( mysqli_error());
					$rowA1W = mysqli_fetch_assoc($resultA1W);
					$STATUSA1W = $rowA1W['status'];
					
					if($STATUSA1W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A1W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A1W</p>";}?>
					
				</div>
				<div id="A2" style="position: absolute;
											left:125px;
								  top: 265px;">
				<?php $queryA2 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A2'"; 
					$resultA2 = mysqli_query($cser, $queryA2) or die ( mysqli_error());
					$rowA2 = mysqli_fetch_assoc($resultA2);
					$STATUSA2 = $rowA2['status'];
					
					if($STATUSA2 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A2</p>";}
					else
					{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A2</p>";}?>
					
				</div>
				<div id="B1" style=" position: absolute;
								  left:265px;
								  top: 265px;">
				<?php $queryB1 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B1'"; 
					$resultB1 = mysqli_query($cser, $queryB1) or die ( mysqli_error());
					$rowB1 = mysqli_fetch_assoc($resultB1);
					$STATUSB1 = $rowB1['status'];
					
					if($STATUSB1 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B1</p>";}
					else
					{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B1</p>";}?>
				</div>
				<div id="B2W" style=" position: absolute;
								  left:335px;
								  top: 265px;">
				<?php $queryB2W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B2W'"; 
					$resultB2W = mysqli_query($cser, $queryB2W) or die ( mysqli_error());
					$rowB2W = mysqli_fetch_assoc($resultB2W);
					$STATUSB2W = $rowB2W['status'];
					
					if($STATUSB2W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B2W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B2W</p>";}?>
					
				</div>
				<div id="A3W" style=" position: absolute;
								  left:25px;
								  top: 315px;">
				<?php $queryA3W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A3W'"; 
					$resultA3W = mysqli_query($cser, $queryA3W) or die ( mysqli_error());
					$rowA3W = mysqli_fetch_assoc($resultA3W);
					$STATUSA3W = $rowA3W['status'];
					
					if($STATUSA3W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A3W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A3W</p>";}?>
					
				</div>
				<div id="A4" style=" position: absolute;
								  left:125px;
								  top: 315px;">
				<?php $queryA4 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A4'"; 
					$resultA4 = mysqli_query($cser, $queryA4) or die ( mysqli_error());
					$rowA4 = mysqli_fetch_assoc($resultA4);
					$STATUSA4 = $rowA4['status'];
					
					if($STATUSA4 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A4</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A4</p>";}?>
					
				</div>
				<div id="B3" style=" position: absolute;
								  left:265px;
								  top: 315px;">
				<?php $queryB3 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B3'"; 
					$resultB3 = mysqli_query($cser, $queryB3) or die ( mysqli_error());
					$rowB3 = mysqli_fetch_assoc($resultB3);
					$STATUSB3 = $rowB3['status'];
					
					if($STATUSB3 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B3</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B3</p>";}?>
					
				</div>
				<div id="B4W" style=" position: absolute;
								  left:335px;
								  top: 315px;">
				<?php $queryB4W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B4W'"; 
					$resultB4W = mysqli_query($cser, $queryB4W) or die ( mysqli_error());
					$rowB4W = mysqli_fetch_assoc($resultB4W);
					$STATUSB4W = $rowB4W['status'];
					
					if($STATUSB4W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B4W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B4W</p>";}?>
					
				</div>
				<div id="A5W" style=" position: absolute;
								  left:25px;
								  top: 365px;">
				<?php $queryA5W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A5W'"; 
					$resultA5W = mysqli_query($cser, $queryA5W) or die ( mysqli_error());
					$rowA5W = mysqli_fetch_assoc($resultA5W);
					$STATUSA5W = $rowA5W['status'];
					
					if($STATUSA5W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A5W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A5W</p>";}?>
					
				</div>
				<div id="A6" style=" position: absolute;
								 left:125px;
								  top: 365px;">
				<?php $queryA6 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A6'"; 
					$resultA6 = mysqli_query($cser, $queryA6) or die ( mysqli_error());
					$rowA6 = mysqli_fetch_assoc($resultA6);
					$STATUSA6 = $rowA6['status'];
					
					if($STATUSA6 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A6</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A6</p>";}?>
					
				</div>
				<div id="B5" style=" position: absolute;
								left:265px;
								  top: 365px;">
				<?php $queryB5 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B5'"; 
					$resultB5 = mysqli_query($cser, $queryB5) or die ( mysqli_error());
					$rowB5 = mysqli_fetch_assoc($resultB5);
					$STATUSB5 = $rowB5['status'];
					
					if($STATUSB5 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B5</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B5</p>";}?>
					
				</div>
				<div id="B6W" style=" position: absolute;
								 left:335px;
								  top: 365px;">
				<?php $queryB6W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B6W'"; 
					$resultB6W = mysqli_query($cser, $queryB6W) or die ( mysqli_error());
					$rowB6W = mysqli_fetch_assoc($resultB6W);
					$STATUSB6W = $rowB6W['status'];
					
					if($STATUSB6W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B6W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B6W</p>";}?>
					
				</div>
				<div id="A7W" style=" position: absolute;
								 left:25px;
								  top: 415px;">
				<?php $queryA7W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A7W'"; 
					$resultA7W = mysqli_query($cser, $queryA7W) or die ( mysqli_error());
					$rowA7W = mysqli_fetch_assoc($resultA7W);
					$STATUSA7W = $rowA7W['status'];
					
					if($STATUSA7W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A7W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A7W</p>";}?>
					
				</div><div id="A8" style=" position: absolute;
								 left:125px;
								  top: 415px;">
				<?php $queryA8 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A8'"; 
					$resultA8 = mysqli_query($cser, $queryA8) or die ( mysqli_error());
					$rowA8 = mysqli_fetch_assoc($resultA8);
					$STATUSA8 = $rowA8['status'];
					
					if($STATUSA8 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A8</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A8</p>";}?>
					
				</div>
				<div id="B7" style=" position: absolute;
								  left:265px;
								  top: 415px;">
				<?php $queryB7 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B7'"; 
					$resultB7 = mysqli_query($cser, $queryB7) or die ( mysqli_error());
					$rowB7 = mysqli_fetch_assoc($resultB7);
					$STATUSB7 = $rowB7['status'];
					
					if($STATUSB7 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B7</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B7</p>";}?>
					
				</div>
				<div id="B8W" style=" position: absolute;
								  left:335px;
								  top: 415px;">
				<?php $queryB8W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B8W'"; 
					$resultB8W = mysqli_query($cser, $queryB8W) or die ( mysqli_error());
					$rowB8W = mysqli_fetch_assoc($resultB8W);
					$STATUSB8W = $rowB8W['status'];
					
					if($STATUSB8W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B8W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B8W</p>";}?>
					
				</div>
				<div id="A9W" style=" position: absolute;
								  left:25px;
								  top: 465px;">
				<?php $queryA9W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A9W'"; 
					$resultA9W = mysqli_query($cser, $queryA9W) or die ( mysqli_error());
					$rowA9W = mysqli_fetch_assoc($resultA9W);
					$STATUSA9W = $rowA9W['status'];
					
					if($STATUSA9W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A9W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A9W</p>";}?>
					
				</div>
				<div id="A10" style=" position: absolute;
								  left:125px;
								  top: 465px;">
				<?php $queryA10 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A10'"; 
					$resultA10 = mysqli_query($cser, $queryA10) or die ( mysqli_error());
					$rowA10 = mysqli_fetch_assoc($resultA10);
					$STATUSA10 = $rowA10['status'];
					
					if($STATUSA10 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A10</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A10</p>";}?>
					
				</div>
				<div id="B9" style=" position: absolute;
								left:265px;
								  top: 465px;">
				<?php $queryB9 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B9'"; 
					$resultB9 = mysqli_query($cser, $queryB9) or die ( mysqli_error());
					$rowB9 = mysqli_fetch_assoc($resultB9);
					$STATUSB9 = $rowB9['status'];
					
					if($STATUSB9 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B9</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B9</p>";}?>
					
				</div>
				<div id="B10W" style=" position: absolute;
								  left:335px;
								  top: 465px;">
				<?php $queryB10W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B10W'"; 
					$resultB10W = mysqli_query($cser, $queryB10W) or die ( mysqli_error());
					$rowB10W = mysqli_fetch_assoc($resultB10W);
					$STATUSB10W = $rowB10W['status'];
					
					if($STATUSB10W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B10W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B10W</p>";}?>
					
				</div>
				<div id="A11W" style=" position: absolute;
								  left:25px;
								  top: 515px;">
				<?php $queryA11W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A11W'"; 
					$resultA11W = mysqli_query($cser, $queryA11W) or die ( mysqli_error());
					$rowA11W = mysqli_fetch_assoc($resultA11W);
					$STATUSA11W = $rowA11W['status'];
					
					if($STATUSA11W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A11W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A11W</p>";}?>
					
				</div>
				<div id="A12" style=" position: absolute;
								  left:125px;
								  top: 515px;">
				<?php $queryA12 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A12'"; 
					$resultA12 = mysqli_query($cser, $queryA12) or die ( mysqli_error());
					$rowA12 = mysqli_fetch_assoc($resultA12);
					$STATUSA12 = $rowA12['status'];
					
					if($STATUSA12 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A12</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A12</p>";}?>
					
				</div>
				<div id="B11" style=" position: absolute;
								  left:265px;
								  top: 515px;">
				<?php $queryB11 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B11'"; 
					$resultB11 = mysqli_query($cser, $queryB11) or die ( mysqli_error());
					$rowB11 = mysqli_fetch_assoc($resultB11);
					$STATUSB11 = $rowB11['status'];
					
					if($STATUSB11 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B11</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B11</p>";}?>
					
				</div>
				<div id="B12W" style=" position: absolute;
								 left:335px;
								  top: 515px;">
				<?php $queryB12W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B12W'"; 
					$resultB12W = mysqli_query($cser, $queryB12W) or die ( mysqli_error());
					$rowB12W = mysqli_fetch_assoc($resultB12W);
					$STATUSB12W = $rowB12W['status'];
					
					if($STATUSB12W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B12W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B12W</p>";}?>
					
				</div>
				<div id="A13W" style=" position: absolute;
								  left:25px;
								  top: 565px;">
				<?php $queryA13W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A13W'"; 
					$resultA13W = mysqli_query($cser, $queryA13W) or die ( mysqli_error());
					$rowA13W = mysqli_fetch_assoc($resultA13W);
					$STATUSA13W = $rowA13W['status'];
					
					if($STATUSA13W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A13W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A13W</p>";}?>
					
				</div>
				<div id="A14" style=" position: absolute;
								  left:125px;
								  top: 565px;">
				<?php $queryA14 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A14'"; 
					$resultA14 = mysqli_query($cser, $queryA14) or die ( mysqli_error());
					$rowA14 = mysqli_fetch_assoc($resultA14);
					$STATUSA14 = $rowA14['status'];
					
					if($STATUSA14 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A14</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A14</p>";}?>
					
				</div>
				
				<div id="A15" style=" position: absolute;
								 left:195px;
								  top: 565px;">
				<?php $queryA15 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='A15'"; 
					$resultA15 = mysqli_query($cser, $queryA15) or die ( mysqli_error());
					$rowA15 = mysqli_fetch_assoc($resultA15);
					$STATUSA15 = $rowA15['status'];
					
					if($STATUSA15 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>A15</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>A15</p>";}?>
					
				</div>
				<div id="B13" style=" position: absolute;
								  left:265px;
								  top: 565px;">
				<?php $queryB13 = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B13'"; 
					$resultB13 = mysqli_query($cser, $queryB13) or die ( mysqli_error());
					$rowB13 = mysqli_fetch_assoc($resultB13);
					$STATUSB13 = $rowB13['status'];
					
					if($STATUSB13 == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B13</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B13</p>";}?>
					
				</div>
				<div id="B14W" style=" position: absolute;
								  left:335px;
								  top: 565px;">
				<?php $queryB14W = "SELECT status from bus_seats where bus_num ='$bus_num' and seat_date='$bus_date' and seat_name='B14W'"; 
					$resultB14W = mysqli_query($cser, $queryB14W) or die ( mysqli_error());
					$rowB14W = mysqli_fetch_assoc($resultB14W);
					$STATUSB14W = $rowB14W['status'];
					
					if($STATUSB14W == 1)
						{echo "<p style='color:red;font-weight:bold;font-size:30px;'>B14W</p>";}
					else
						{echo "<p style='color:#026440;font-weight:bold;font-size:30px;'>B14W</p>";}?>
					
				</div>
				
				</div>
                </div>
              </div>
            </div>
          </div>
		</div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.php -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
    <script type="text/javascript" src="seat/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="seat/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="seat/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="seat/js/mdb.min.js"></script>
</body>

</html>
