<?php 
session_start();
    include_once '../../../creatdb.php';
    $user = new User();

    $user_id = $_SESSION['user_id'];

    if (!$user->get_session()){
       header("location:../../../login.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:../../../login.php");
    }
	$cser=mysqli_connect("localhost","root","","yatri_db");
					$query = "SELECT * from user_account where user_id='".$user_id."'"; 
					$result = mysqli_query($cser, $query) or die ( mysqli_error());
					$row = mysqli_fetch_assoc($result);
					$uname = $row["user_uname"];
					
					$query1 = "SELECT * from bus_seats where username='$uname' ORDER BY seat_id desc"; 
					$result1 = mysqli_query($cser, $query1) or die ( mysqli_error());
				
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $row["user_fname"];?> - Ticket Details</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
      <link href="../../../css layout/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="../../../css layout/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="../../../css layout/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <link href="../../../css layout/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">

  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/yatrilogo.jpg" />
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
                <li class="nav-item dropdown d-lg-flex d-none">
                  <button type="button" class="btn btn-inverse-primary btn-sm" onclick="window.location.href='../../pages/forms/user_setting.php'">Settings<i class="fa fa-cog fa-spin fa-1x fa-fw"></i><span class="sr-only">Loading...</span></button>
                </li>
				<li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"><?php  echo $row["user_fname"];?></span>
                    <span class="online-status"></span>
                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item"href="../../pages/forms/user_setting.php">
                        <i class="fa fa-cog fa-spin fa-1x fa-fw" style="color:blue;"></i><span class="sr-only">Loading...</span>
                        Settings
                      </a>
                      <a class="dropdown-item" href="../../../logout.php">
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
                <a class="nav-link" href="../../../user_dash.php">
                  <i class="fa fa-file-text " aria-hidden="true"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="../../pages/forms/user_search.php" class="nav-link">
                    <i class="fa fa-search " aria-hidden="true"></i>
					<span class="menu-title">Search</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="../../pages/tables/ticket detail.php" class="nav-link">
                    <i class="fa fa-table " aria-hidden="true"></i>
                    <span class="menu-title">Ticket Details</span>
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
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ticket Details</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                          <center>  #</center>
                          </th>
                          <th>
                         <center>   Date</center>
                          </th>
						  <th>
                          <center>  Bus Name</center>
                          </th>
						  <th>
                         <center>   Bus No.</center>
                          </th>
						  <th>
                          <center>  Ticket No.</center>
                          </th>
                          <th>
                          <center>  No. Of Seats</center>
                          </th>
                          <th>
                           <center> Seat</center>
                          </th>
						   <th>
                           <center> From</center>
                          </th>
						  <th>
                           <center> To</center>
                          </th>
                          <th>
                          <center>  Status</center>
                          </th>
						  <th>
                          <center>  Price</center>
                          </th>
						  <th>
                          <center>  Print</center>
                          </th>
                        </tr>
                      </thead>
					   <?php $Sno=1;
        while ($row1 = mysqli_fetch_assoc($result1)) {?>
                      <tbody>
                        <tr class="table-info">
                          <td>
                        <center>    <?php echo $Sno;?> </center>
                          </td>
                          <td>
                         <center>  <?php echo $row1["seat_date"];?></center>
                          </td>
						  <td>
                         <center>  <?php echo $row1["cmp_name"];?> </center>
                          </td>
                          <td>
                         <center>   <?php echo $row1["bus_num"];?> </center>
                          </td>
                          <td>
                          <center>  <?php echo $row1["seat_id"];?> </center>
                          </td>
                          <td>
                         <center>   <?php echo $row1["seat_num"];?> </center>
                          </td>
						  <td>
                          <center> <?php echo $row1["seat_name"];?> </center>
                          </td>
						  <td>
                          <center>  <?php echo $row1["bus_from"];?> </center>
                          </td>
						  <td>
                          <center>  <?php echo $row1["bus_to"];?> </center>
                          </td>
						  <td>
						 <center> 
                            <?php 
							
							$currentDate = date("Y-m-d");
							$sdate=$row1["seat_date"];
							$status=$row1["status"];
							if($currentDate > $sdate ){
							echo "Checked";}
							elseif($currentDate == $sdate ){
							echo "Today";}
							else{
							echo "UpComing";}?></center>
                          </td>
						  <td>
						<center>  Rs <?php echo $row1["total_price"]; ?></center>
						  </td>
						  <td>
						  <center><a href="../../../pdf.php?date=<?php echo $row1["seat_date"];?> & seat=<?php echo $row1["seat_name"];?>"><i class="fa fa-download fa-lg" aria-hidden="true"></i></a>
						 </center> </td>
                        </tr>
                       
                      </tbody>
					  <?php
					$Sno++;  }?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.php -->
        <footer class="footer">
          <div class="footer-wrap">
              <div class="w-100 clearfix">
                <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="index.php" target="_blank">Yatri</a>. All rights reserved.</span>
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
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
