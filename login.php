<?php 
session_start();
include_once 'creatdb.php';
$user = new User();
$admin =new Admin();

if (isset($_POST['user_submit'])) { 
		extract($_POST);   
	    $loginuser = $user->check_loginuser($user_uname, $user_pass);
	    if ($loginuser) {
	        // Registration Success
	       header("location:user_dash.php");
	    } else {
	        // Registration Failed
			echo'<script language="javascript">';
			echo 'alert("Wrong username or password")';
			echo '</script>';
	    }
	}
	else if (isset($_POST['admin_submit'])) { 
		extract($_POST);   
	    $loginadmin = $admin->check_loginadmin($admin_uname, $admin_pass);
	    if ($loginadmin) {
	        // Registration Success
	       header("location:admin_dash.php");
	    } else {
	        // Registration Failed
			echo'<script language="javascript">';
			echo 'alert("Wrong username or password")';
			echo '</script>';
	    }
	}
	?>
<html>
    <head>
        <link rel="stylesheet" href="css layout/login css.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		
		<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Client Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	
	<!-- css files -->
    <link href="css layout/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css layout/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="css layout/css_slider.css" type="text/css" rel="stylesheet" media="all">
    <link href="css layout/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->
	
	
    </head>
    <body>
	<!-- header -->
<header>
	<div class="top-head container">
		<div class="ml-auto text-right right-p">
			<ul>
				<li class="mr-3">
					<span class="fa fa-phone"></span>98********</li>
				
			</ul>
		</div>
	</div>
	<div class="container" style="position:relative;">
		<!-- nav -->
		<nav class="py-3 d-lg-flex">
			<div id="logologin">
				<h1> <a href="index.php"><section id="putlogo1"><img id="log1" alt="log1" src="images/logo.jpg">   
										</section></a></h1>
			</div>
			<label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
			<input type="checkbox" id="drop" />
			<ul class="menu ml-auto mt-1">
				<li class="active" ><a href="index.php" style="color:#1d19bd;">Home</a></li>
				<li class="" ><a href="login.php"><span class="fa fa-user-circle " aria-hidden="true" style="color:#1d19bd;"></a></li>
			</ul>
		</nav>
		<!-- //nav -->
	</div>
</header>
<!-- //header -->

<!--Login Account Division-->
        <div class="divbox" id="login" style="position:relative;">
            <h2 style="color:white;">Login Your Account</h2>
<!--Back Button-->
			<i class="fa fa-arrow-left fa-lg" id="backLogin" aria-hidden="true" onclick="backLogin()"></i>
<!--Close Button-->
            <a href="index.php"><i class="fa fa-times fa-lg" id="closeDiv" aria-hidden="true"></i></a>
<!--Login Admin-->
            <div class="insider" id="loginAdmin" onclick="slideAdmin()">
                <i class="material-icons" style="font-size: 125px;">account_circle</i>
                <br>
                Administrator
            </div>
<!--Login User-->
            <div class="insider" id="loginUser" onclick="slideUser()">
                <i class="material-icons" style="font-size: 125px;">account_circle</i>
                <br>
                User
                </div>
<!--Login Admin Form-->
            <div class = "insider" id= "slideAdminLogin">
                <form action="#" method="post">
					<div class="form-style-yatri">
						<center><input class="form-control"  placeholder="Username" name="admin_uname" type="text" required=""><br>
                        <input class="form-control" id="adminpass" placeholder="Password" name="admin_pass" type="password" required=""></center>
						<input type="checkbox" onclick="passadmin()">Show Password

<script>
function passadmin() {
  var x = document.getElementById("adminpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<br>
                        <button Class="btn2" name="admin_submit"> Login</button>
					</div>
                     </form>
            </div>
<!--Login User Form-->
            <div class = "insider" id= "slideUserLogin">
                <form action="#" method="post">
					<div class="form-style-yatri">
						<center><input class="form-control"  placeholder="Username" name="user_uname" type="text" required=""><br>
                        <input class="form-control" id="userpass" placeholder="Password" name="user_pass" type="password" required=""> </center>
						<input type="checkbox" onclick="passuser()">Show Password

<script>
function passuser() {
  var x = document.getElementById("userpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script><br>

                        <button Class="btn2" name="user_submit"> Login</button>
					</div>
                     </form>
            </div>          


            <a class="footerdiv" id="footerLogin" href="create.php" >Create an account</a>
        </div>
        <script src="css layout/login js.js"></script>
    </body>
</html>