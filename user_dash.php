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
					$uname=$row["user_uname"];
					
					
					$query1="SELECT * FROM bus_seats WHERE username='$uname' and status='1' and timestamp = (SELECT MAX(timestamp)FROM bus_seats where username='$uname' ) LIMIT 1";
					$result1 = mysqli_query($cser, $query1) or die ( mysqli_error($cser));
					$row1 = mysqli_fetch_assoc($result1);
					$cmp=$row1["cmp_name"];
					$time = $row1["bus_time"];
					
					$query4="SELECT COUNT(*) AS `count` FROM bus_seats WHERE username='$uname' and status='1'";
					$result4 = mysqli_query($cser, $query4) or die ( mysqli_error());
					$row4 = mysqli_fetch_assoc($result4);
					$count=$row4['count'];
					
					$query5="SELECT COUNT(*) AS `count` FROM user_transection_details WHERE username='$uname' ";
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
    <title> <?php echo $row["user_fname"];?> - Dashboard </title>
    <!-- base:css -->
    <link rel="stylesheet" href="user_dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="user_dashboard/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
	<!-- css files -->
	 <link href="seat/css/table.css" rel="stylesheet">
    <link href="css layout/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css layout/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="css layout/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <link href="css layout/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="user_dashboard/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="user_dashboard/images/yatrilogo.jpg" />
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
                <a class="navbar-brand brand-logo" href="user_dash.php">
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
			<?php if ($count==0){
				echo '<li class="nav-item dropdown d-lg-flex d-none">';	
					echo '<button type="button" class="btn btn-inverse-primary btn-sm" >No Ticket <i class="fa fa-file-text fa-spin" aria-hidden="true"></i><span class="sr-only">Loading...</span></button>';
						echo'</li>';}	
						else{?>
			<li class="nav-item dropdown d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='lpdf.php'">PDF <i class="fa fa-file-text fa-spin" aria-hidden="true"></i><span class="sr-only">Loading...</span></button>
						</li><?php }?>
                <li class="nav-item dropdown d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='user_dashboard/pages/forms/user_setting.php'">Settings<i class="fa fa-cog fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span></button>
                </li>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"><?php echo $row["user_fname"];?></span>
                    <span class="online-status"></span>
                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item" href="user_dashboard/pages/forms/user_setting.php">
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
                <a class="nav-link" href="user_dash.php">
                  <i class="fa fa-file-text " aria-hidden="true"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="user_dashboard/pages/forms/user_search.php" class="nav-link">
                    <i class="fa fa-search " aria-hidden="true"></i>
                    <span class="menu-title">Search</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                   <a href="user_dashboard/pages/tables/ticket detail.php" class="nav-link">
                    <i class="fa fa-table " aria-hidden="true"></i>
                    <span class="menu-title">Ticket Detail</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
            </ul>
        </div>
      </nav>
    </div>
	<?php
					?>
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row mt-4">
						<div class="col-lg-8 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="row">
									<?php if ($count == 0){
										echo '<form>';
										echo '<div id="Yatri" style="color:red;font-size:30px;">';
										echo 'You havent bought any ticket Please buy a ticket';
										echo '</div>';
									echo '</form>';}
									else{?>
										
									<form>
				
			<div id="yatri">
			 <b>Yatri</b> 
			</div>
			<div id="cmp">
			<b><?php echo $row1["cmp_name"];?></b>
			</div>
			<div id="date-text">
			  Date
			<input type="text" name="Date" id="date" value="<?php echo $row1["seat_date"]?>" readonly>
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
					<td><input type="text"  name="" id="no_of_seat" value="<?php echo $row1["seat_name"]?>" readonly></td>
					<td style="padding: 10px;">No. of seat </td>
					<td><input type="text" name="" id="seat_no" value="<?php echo $row1["seat_num"];?>"  readonly></td>
				</tr>

				<tr>
					<td>Total Price</td>
					<td><input type="text" name="" id="total_price" value="Rs <?php echo $row1["total_price"];?>" readonly></td>
					<td style="padding: 10px;">Time</td>
					<td><input type="text" name="" id="time" value="<?php echo date('h:i a', strtotime($time));?>" readonly></td>
				</tr>
			</table>
		</form>
									<?php }?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 mb-3 mb-lg-0">
							<div class="card congratulation-bg text-center">
								<div class="card-body pb-0">
									<i class="fa fa-user fa-3x" aria-hidden="true"></i>
									<h2 class="mt-3 text-white mb-3 font-weight-bold"><?php echo $row["user_fname"];?><br>Welcome to the Yatri
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
												Name:&nbsp&nbsp&nbsp<?php echo $row['user_fname'];?>&nbsp&nbsp<?php echo $row['user_lname'];  ?><br>
												User Name:&nbsp <?php echo $row['user_uname']; ?><br>
										        Address:&nbsp&nbsp&nbsp<?php echo $row['user_add'];?><br>
												Phone No.:&nbsp&nbsp&nbsp<?php echo $row['user_phn'];?><br>
												Amount: &nbsp&nbsp&nbsp<?php echo $row['user_amount'];?>
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
								<div class="line-chart-row-title">Total ticket</div>
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
								<div class="line-chart-row-title">TRANSACTIONS</div>
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
    <script src="user_dashboard/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="user_dashboard/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="user_dashboard/vendors/chart.js/Chart.min.js"></script>
    <script src="user_dashboard/vendors/progressbar.js/progressbar.min.js"></script>
		<script src="user_dashboard/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="user_dashboard/vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="user_dashboard/vendors/justgage/justgage.js"></script>
    <!-- Custom js for this page-->
    <script src="user_dashboard/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>