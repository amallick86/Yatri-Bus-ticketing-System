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
					$query4 = "SELECT * from admin_account"; 
					$result4 = mysqli_query($cser, $query4) or die ( mysqli_error());
					$row4 = mysqli_fetch_assoc($result4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $row["user_fname"];?> - Search</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link href="../../../css layout/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="../../../css layout/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="../../../css layout/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <link href="../../../css layout/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
   
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/yatrilogo.jpg" />
    <link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
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
                    <span class="nav-profile-name"><?php echo $row["user_fname"];?></span>
                    <span class="online-status"></span>
                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item" href="../../pages/forms/user_setting.php">
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
                  <h4 class="card-title">Search Bus</h4>
                   <form action="#" method="post">
                  <div class="form-group">
                    <label>From</label>
                    <select class="js-example-basic-single w-100" name="bus-from">
                      <option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>To</label>
                    <select class="js-example-basic-single w-100" name="bus-to">
                      <option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
                    </select>
                  </div>
				  <div class="form-group">
                    <label>Date</label>
					<div id="js-example-basic-single w-100">
						<input style="width:670px; border-color:gray; height:30px;" class="typeahead" type="date"  name="bus-date" >
					</div>
                  </div>
				  <button type="submit" name="bus_search" class="btn btn-primary mb-2">Search</button>
				  </form>
                </div>
              </div>
            </div>
             <div class="col-md-6 grid-margin grid-margin-md-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Search Price</h4>
                  <form action="##" method="post">
                  <div class="form-group">
                    <label>From</label>
                    <select class="js-example-basic-single w-100" name="buspfrom">
					  <option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>To</label>
                    <select class="js-example-basic-single w-100" name="buspto">
                      <option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
                    </select>
                  </div>
				  <button type="submit" class="btn btn-primary mb-2" name="bus_price">Search</button>
				</form>
                </div>
              </div>
            </div>
          </div>
	
		
<?php			
//Retrieve Date
if(isset($_POST["bus_search"]))
	{?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

		  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><center>Available Bus</center></h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
				<i class='fa fa-square ' style='color:green;' aria-hidden='true'> Seats Available</i><br>
				  <i class='fa fa-square ' style='color:red;' aria-hidden='true'> No seats Available</i>
                      <thead>
                        <tr>
                          <th>
                          <center>  #</center>
                          </th>
						  <th>
                          <center>   Date</center>
                          </th>
						  <th>
                          <center>   Time</center>
                          </th>
                          <th>
                          <center>   Bus Number</center>
                          </th>
                          <th>
                          <center>   From</center>
                          </th>
                          <th>
                          <center>   To</center>
                          </th>
						  <th>
                           <center>  Price</center>
                          </th>
						  <th>
                          <center>  Available</center>
                          </th>
                        </tr>
                      </thead>
<?php
	$busfrom=$_POST["bus-from"];
	$busto=$_POST["bus-to"];
	$busdate=$_POST["bus-date"];
	$currentd=date("Y-m-d");
	if($busdate < $currentd ){
	echo'<script language="javascript">';
	echo 'alert("No Bus Available")';
	echo '</script>';}
		else{
    $sql="select * from bus_detail where bus_from='$busfrom' and bus_to='$busto' and bus_date='$busdate' ";
	
	$bus = mysqli_query($cser, $sql) ;
	$Sno=1;
        while ($row1 = mysqli_fetch_assoc($bus)) {?>
		
                      <tbody>
                        <tr>
                          <td>
                         <center><?php echo $Sno;?> </center>
                          </td>
                          <td>
                          <center> <?php echo $row1['bus_date'];?> </center>
                          </td>
                          <td>
                          <center> <?php echo date('h:i a', strtotime($row1['bus_time'] ));?> </center>
                          </td>
                          <td>
                         <center> 
						 <?php 
						 $busnum=$row1['bus_num'];
						  $busd=$row1['bus_date'];
						  $querys = "SELECT COUNT(*) AS `count`from bus_seats where bus_num ='$busnum' and seat_date='$busd' and status='1'"; 
					$results = mysqli_query($cser, $querys) or die ( mysqli_error());
					$rows = mysqli_fetch_assoc($results);
					$count=$rows['count'];
					
					if($count==36)
						{echo "<a  style='color:red;' aria-hidden='true'>$busnum</a>";}
					else
						{echo "<a  href='../../../user_seat.php?busnumber=$busnum & dateofbus=$busd'
									style='color:#90ee90;' aria-hidden='true'>$busnum </a>";}?>
                       
					 </center>
                          </td>
						  <td>
                         <center> <?php  echo $row1['bus_from'];?></center>
                          </td>
						  <td>
                        <center>  <?php  echo $row1['bus_to'];?> </center>
                          </td>
						  <td>
                       <center> <?php echo "Rs"?>&nbsp<?php echo $row1['bus_price'];?> </center>
                          </td>
						  <td>
						<center>  <?php $busnum=$row1['bus_num'];
						  $busd=$row1['bus_date'];
						  $querys = "SELECT COUNT(*) AS `count`from bus_seats where bus_num ='$busnum' and seat_date='$busd' and status='1'"; 
					$results = mysqli_query($cser, $querys) or die ( mysqli_error());
					$rows = mysqli_fetch_assoc($results);
					$count=$rows['count'];
					
					if($count==36)
						{echo "<i class='fa fa-square fa-2x' style='color:red;' aria-hidden='true'></i>";}
					else
						{echo "<i class='fa fa-square fa-2x' style='color:green;' aria-hidden='true'></i>";}?>
                        </center>
                          </td>
						</tr>
                      </tbody><?php
	$Sno++;  }}}?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
		</div>
	</div>
</div>
</div>
	

<?php		
	   if(isset($_POST["bus_price"]))
	{?>
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
		  
			 <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><center>Price Table</center></h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>
                         <center>   # </center>
                          </th>
						  <th>
                         <center>   Bus Name </center>
                          </th>
                          <th>
                          <center>  Bus Number </center>
                          </th>
                          <th>
                         <center>   From </center>
                          </th>
                          <th>
                         <center>   To </center>
                          </th>
						  <th>
                         <center>   Price </center>
                          </th>
                        </tr>
                      </thead>
					  <?php 

	$buspfrom=$_POST["buspfrom"];
	$buspto=$_POST["buspto"];
    $sql="select * from bus_detail where bus_from='$buspfrom' and bus_to='$buspto' ";
	$price = mysqli_query($cser, $sql) or die ( mysqli_error($cser));
	$Sno=1;
        while ($row2 = mysqli_fetch_assoc($price)) {?>
		
                      <tbody>
                        <tr>
                          <td>
                        <center> <?php echo $Sno;?> </center>
                          </td>
                          <td>
                         <center>  <?php echo $row2['cmp_name'];?> </center>
                          </td>
                          <td>
                       <center>    <?php echo $row2['bus_num'];?> </center>
                          </td>
						  <td>
                         <center> <?php  echo $row2['bus_from'];?> </center>
                          </td>
						  <td>
                        <center>  <?php  echo $row2['bus_to'];?> </center>
                          </td>
						  <td>
                       <center> <?php echo "Rs"?>&nbsp<?php echo $row2['bus_price'];?> </center>
                          </td>
						</tr>
                      </tbody><?php
		$Sno++;  }}?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	</div>
</div>
		<?php?>
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
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
