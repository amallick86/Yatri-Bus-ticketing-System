<?php 
include_once 'creatdb.php';
$user = new User();
$admin =new Admin();
 if (isset($_POST['admin_reg'])){
        extract($_POST);
        $admin_register = $admin->reg_admin($cmp_name, $cmp_add, $cmp_num, $cmp_pan, $admin_uname, $admin_pass, $admin_cpass);
        if ($admin_register) {
            // Registration Success
            echo "<div style='text-align:center'>Registration successful <a href='login.php'>Click here</a> to login</div>";
        } else {
            // Registration Failed
            echo "<div style='text-align:center'>Registration failed. Email or Username already exits please try again.</div>";
        }
    }
	
if (isset($_POST['user_reg'])){
        extract($_POST);
        $user_register = $user->reg_user($user_fname, $user_lname, $user_add, $user_phn, $user_dob, $user_uname, $user_pass, $user_cpass);
        if ($user_register) {
            // Registration Success
           
            echo "<div style='text-align:center'>Registration successful <a href='login.php'>Click here</a> to login</div>";
        } else {
            // Registration Failed
            echo "<div style='text-align:center'>Registration failed. Email or Username already exits please try again.</div>";
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
	<div class="container">
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

<!--Create Account Division-->
        <div class="divbox" id="createAcc" style="position:relative;">
            <h2 style="color:white;">Create Your Account</h2>
<!--Back Button-->
            <i class="fa fa-arrow-left fa-lg" id="backLogin" aria-hidden="true" onclick="backCreate()"></i>
<!--Close Button-->
           <a href="index.php"><i class="fa fa-times fa-lg" id="closeDiv" aria-hidden="true"></i></a>
<!--Create Admin Account-->
                <div class="insider" id="createAdmin" onclick="slideAdminForm()">
                    <i class="material-icons" style="font-size: 125px;">account_circle</i>
                    <br>
                    Create an Administrator account
                </div>
<!--Create User Account-->
                <div class="insider" id="createUser" onclick="slideUserForm()">
                <i class="material-icons" style="font-size: 125px;">account_circle</i>
                <br>
                Create a User acoount
                </div>
<!--Create Admin Form-->
            <div id= "slideAdminCreate">
                <form action="#" method="post">
					<div class="form-style-yatri">
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Company Name
                            </div>
                            <div class="tableColumn2">
                                <input placeholder="Company Name" class="form-control" name="cmp_name" type="text" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Address
                            </div>
                            <div class="tableColumn2">
								<input placeholder="CompanyAddress" class="form-control" name="cmp_add" type="text" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Phone Number
                            </div>
                            <div class="tableColumn2">
							<input placeholder="Phone No." class="form-control" name="cmp_num" type="tel" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Pan Number
                            </div>
                            <div class="tableColumn2">
							<input placeholder="PanNumber" class="form-control" name="cmp_pan" type="number" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Username
                            </div>
                            <div class="tableColumn2">
							<input placeholder="username" class="form-control" name="admin_uname" type="text" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Password
                            </div>
                            <div class="tableColumn2">
							<input placeholder="Company Password" class="form-control" name="admin_pass" type="password" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Confirm Password
                            </div>
                            <div class="tableColumn2">
                                <input placeholder="Conform Password" class="form-control" name="admin_cpass" type="password" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                            </div>
                            <div class="tableColumn2">
                            <button Class="btn2" style="width:300%" name="admin_reg" >SignUp</button>
                            </div>
                        </div>
						</div>
                    </form>
            </div>
<!--Create User Form-->
            <div class = "insider" id= "slideUserCreate">
                <form action="#" method="post">
					<div class="form-style-yatri">
                        <div class="tableRow">
                            <div class="tableColumn1">
                                First Name
                            </div>
                            <div class="tableColumn2">
							<input placeholder="FirstName" class="form-control" name="user_fname" type="text" required="">
                            </div>
                        </div>
						 <div class="tableRow">
                            <div class="tableColumn1">
                                Last Name
                            </div>
                            <div class="tableColumn2">
                             <input placeholder="LastName" class="form-control" name="user_lname" type="text" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Address
                            </div>
                            <div class="tableColumn2">
                                <input id="UserAddress" class="form-control" name="user_add" type="text" placeholder="Address"required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Phone Number
                            </div>
                            <div class="tableColumn2">
                                <input id="UserPhoneNo" class="form-control" type="tel" name="user_phn" placeholder="Phone No." required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Date of Birth
                            </div>
                            <div class="tableColumn2">
                                <input id="DOB" type="date" class="form-control" name="user_dob" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Username
                            </div>
                            <div class="tableColumn2">
                                <input id="CompanyUsername" class="form-control" type="text" name="user_uname" placeholder="Username" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Password
                            </div>
                            <div class="tableColumn2">
                                <input id="CompanyPassword" class="form-control" type="password" name="user_pass" placeholder="Password" required=""> 
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                                Confirm Password
                            </div>
                            <div class="tableColumn2">
                                <input id="ConfirmPassword" class="form-control" type="password" name="user_cpass" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="tableRow">
                            <div class="tableColumn1">
                            </div>
                            <div class="tableColumn2">
                                <button Class="btn2" style="width:300%" name="user_reg" onclick="return(submituserreg());">SignUp</button>
                            </div>
                        </div>
					</div>
                </form>
            </div> 
<script>
      function submituserreg() {
        var form = document.userreg;
        if (form.user_fname.value == "") {
          alert("Enter First Name.");
          return false;
        } else if (form.user_lname.value == "") {
          alert("Enter Last Name.");
          return false;
        } else if (form.user_add.value == "") {
          alert("Enter Address.");
          return false;
        } else if (form.user_phn.value == "") {
          alert("Enter Phone.");
          return false;
        }else if (form.user_dob.value == "") {
          alert("Enter Date of Birth.");
          return false;
        }else if (form.user_uname.value == "") {
          alert("Enter User Name.");
          return false;
        }else if (form.user_pass.value == "") {
          alert("Enter Password.");
          return false;
        }else if (form.user_cpass.value == "") {
          alert("Enter Conform Password.");
          return false;
        }else if (form.user_phn.value != form.user_cpass.value) {
          alert("Password Doesn't match.");
          return false;
        }
      }
    </script>			

            <a class="footerdiv" id="footerCreate" href="login.php"" >Already have an account?</a>
        </div>
         <script src="css layout/login js.js"></script>
    </body>
</html>