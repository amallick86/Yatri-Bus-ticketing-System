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
					$company=$row['cmp_name'];
					
					$query4="SELECT COUNT(*) AS `count` FROM bus_seats WHERE cmp_name='$company' and status='1'";
					$result4 = mysqli_query($cser, $query4) or die ( mysqli_error());
					$row4 = mysqli_fetch_assoc($result4);
					$count=$row4['count'];
					
					$query5="SELECT COUNT(*) AS `count` FROM user_transection_details WHERE cmp_name='$company' ";
					$result5 = mysqli_query($cser, $query5) or die ( mysqli_error());
					$row5 = mysqli_fetch_assoc($result5);
					$countt=$row5['count'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php echo $row["cmp_name"];?>- Dashboard </title><?php ?>
    <!-- base:css -->
    <link rel="shortcut icon" href="images/Y.jpg" />
    <link rel="stylesheet" href="admin_dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_dashboard/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
	<!-- css files -->
	 <link rel="stylesheet" href="admin_dashboard/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="admin_dashboard/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link href="css layout/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css layout/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="css layout/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <link href="css layout/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="admin_dashboard/css/style.css">
    <!-- endinject -->
    
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
                    <span class="menu-title"> Detail</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
            </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->
	<?php
//Insert Data
if (isset($_POST['add_submit'])){
    $busNUM = $_POST['busNumber'];
    $companyName = $_POST['companyName'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $ticketPrice = $_POST['ticketPrice'];

    $sql = "INSERT INTO bus_detail(bus_num,cmp_name, bus_from, bus_to, bus_date, bus_time,bus_price) VALUES ('$busNUM','$companyName', '$address1', '$address2', '$date', '$time','$ticketPrice');";
    mysqli_query($cser,$sql);
	$resultC1  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='C1', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultC2  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='C2', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultC3  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='C3', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultC4  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='C4', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultC5  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='C5', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");  
	$resultS1  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='S1', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultS2  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='S2', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");  
	$resultA1W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A1W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultA2  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A2', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultB1  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B1', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultB2W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B2W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");  
	$resultA3W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A3W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultA4  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A4', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultB3  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B3', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultB4W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B4W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");  
	$resultA5W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A5W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA6  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A6', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB5  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B5', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");   
	$resultB6W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B6W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA7W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A7W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA8  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A8', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB7  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B7', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB8W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B8W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA9W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A9W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA10 = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A10', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB9  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B9', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB10W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B10W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA11W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A11W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA12  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A12', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB11  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B11', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB12W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B12W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA13W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A13W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA14  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A14', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultA15  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='A15', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB13  = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B13', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	$resultB14W = mysqli_query($cser, "insert into bus_seats SET seat_date='$date', bus_num='$busNUM', cmp_name='$companyName', bus_from='$address1', bus_to='$address2', seat_name='B14W', seat_uname='0',username='0', total_price='0', bus_time='$time', status='0', seat_num='0'");
	
}
    ?>
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row mt-4">
						<div class="col-lg-8 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="row">
									  <form action="#" method="POST" id="busForm" class="forms-sample">

	<h4 class="card-title">Add Bus</h4>
    <div class="form-group">
      <label >Bus Number</label>
      <input class="form-control form-control-sm" type="text" name="busNumber" placeholder="Bus Number">
    </div>

    <div class="form-group">
      <label>Company Name </label>
      <input class="form-control form-control-sm" type="text" value="<?php echo $row["cmp_name"];?>" name="companyName" placeholder="Company Name" readonly>
    </div>

    <div class="form-group">
                    <label>From</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="address1">
					  <option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
                    </select>
                  </div>

    <div class="form-group">
                    <label>To</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="address2">
                    <option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
                    </select>
                  </div>

    <div class="form-group">
                    <label>Date</label>
					
						<input style="width:670px; " class="form-control form-control-sm" type="date"  name="date" >
					
                  </div>

    <div class="form-group">
      <label >Time</label>
      <input class="form-control form-control-sm" type="time" name="time" placeholder="Format:HH:MM:SS">
    </div>

    <div class="form-group">
      <label>Ticket Price</label>
      <input class="form-control form-control-sm" type="number" name="ticketPrice" placeholder="Price in Rs."">
    </div>

    <button class="btn btn-primary mb-2" type="submit" name="add_submit">Submit</button>

  </form>
  
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 mb-3 mb-lg-0">
							<div class="card congratulation-bg text-center">
								<div class="card-body pb-0">
									<i class="fa fa-user fa-3x" aria-hidden="true"></i>
									<h2 class="mt-3 text-white mb-3 font-weight-bold"><?php echo $row["cmp_name"];?><br>Welcome to the Yatri
									</h2>
									<p>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 flex-column d-flex stretch-card">
							<div class="row flex-grow">
								<div class="col-sm-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
										<label style="font-weight:bold;">DETAIL</label>
											<div style="color:#1d19bd;">
												Company Name:&nbsp&nbsp&nbsp<?php echo $row['cmp_name'];?><br>
												User Name:&nbsp <?php echo $row['admin_uname']; ?><br>
										        Address:&nbsp&nbsp&nbsp<?php echo $row['cmp_add'];?><br>
												Phone No.:&nbsp&nbsp&nbsp<?php echo $row['cmp_num'];?><br>
												Amount: &nbsp&nbsp&nbsp<?php echo $row['cmp_amount'];?>
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-info font-weight-bold"><?php echo $count ;?></h2>
										<i class="mdi mdi-file-document-outline mdi-18px text-dark"></i>
									</div>
								</div>
								<canvas id="invoices"></canvas>
								<div class="line-chart-row-title" style=" color:#000066;" >Total ticket</div>
							</div>
						</div>
						
						
						<div class="col-lg-2 grid-margin stretch-card">
							<div class="card">
								<div class="card-body pb-0">
									<div class="d-flex align-items-center justify-content-between">
										<h2 class="text-dark font-weight-bold"><?php echo $countt ;?></h2>
										<i class="mdi mdi-cash text-dark mdi-18px"></i>
									</div>
								</div>
								<canvas id="transactions"></canvas>
								<div class="line-chart-row-title" style=" color:#000066;">TRANSACTIONS</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.php -->
				<footer class="footer">
          <div class="footer-wrap">
              <div class="w-100 clearfix">
                <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="user_dash.php" target="_blank">Yatri</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart-outline"></i></span>
              </div>
          </div>
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="admin_dashboard/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="admin_dashboard/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="admin_dashboard/vendors/chart.js/Chart.min.js"></script>
    <script src="admin_dashboard/vendors/progressbar.js/progressbar.min.js"></script>
		<script src="admin_dashboard/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="admin_dashboard/vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="admin_dashboard/vendors/justgage/justgage.js"></script>
    <!-- Custom js for this page-->
	  <script src="admin_dashboard/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="admin_dashboard/vendors/select2/select2.min.js"></script>
    <script src="admin_dashboard/js/dashboard.js"></script>
	<script src="admin_dashboard/js/file-upload.js"></script>
  <script src="admin_dashboard/js/typeahead.js"></script>
  <script src="admin_dashboard/js/select2.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>