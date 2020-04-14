<!DOCTYPE html>
<html lang="en">
<head>
<title>Yatri | Home </title>
<link rel="shortcut icon" href="images/Y.jpg" />
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
			<div id="logo">
				<h1> <a href="index.php"><section id="putlogo"><img id="log" alt="log" src="images/logo.jpg">   
										</section></a></h1>
			</div>
			<label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
			<input type="checkbox" id="drop" />
			<ul class="menu ml-auto mt-1">
				<li class="active"><a href="index.php">Home</a></li>
				<li class=""><a href="#about">About Us</a></li>
				<li class=""><a href="#checkpriced">CheckPrice</a></li>
				<li class=""><a href="#ticketprice">Ticket Price</a></li>
				<li class=""><a href="#ourservice">Our Sevice</a></li>
				<li class=""><a href="#team">Team</a></li>
				<li class=""><a href="#contact">Contact us</a></li>
				<li class=""><a href="login.php"><span class="fa fa-user-circle " aria-hidden="true"></a></li>
			</ul>
		</nav>
		<!-- //nav -->
	</div>
</header>
<!-- //header -->

<!-- banner -->
<div class="banner" id="home">
	<div class="layer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 banner-text-w3ls">
					<!-- banner slider-->
					<div class="csslider infinity" id="slider1">
						<input type="radio" name="slides" checked="checked" id="slides_1" />
						<input type="radio" name="slides" id="slides_2" />
						<input type="radio" name="slides" id="slides_3" />
						<ul class="banner_slide_bg">
							<li>
								<div class="container-fluid">
									<div class="w3ls_banner_txt">
										<h3 class="b-w3ltxt text-capitalize mt-md-4">Janakpur </h3>
										<h4><span class="fa fa-hand-o-right" aria-hidden="true"></span>Kathmandu</h4>
									<p><span class="fa fa-nrp" style="color:#f4b200;">Rs</span> 800<p>
									</div>
								</div>
							</li>
							<li>
								<div class="container-fluid">
									<div class="w3ls_banner_txt">
										<h3 class="b-w3ltxt text-capitalize mt-md-4">Kathmandu</h3>
										<h4><span class="fa fa-hand-o-right" aria-hidden="true"></span>Birgunj</h4>
									<p><span class="fa fa-nrp" style="color:#f4b200;">Rs</span> 700<p>
										
									</div>
								</div>
							</li>
							<li>
								<div class="container-fluid">
									<div class="w3ls_banner_txt">
										<div class="w3ls_banner_txt">
										<h3 class="b-w3ltxt text-capitalize mt-md-4">Pokhara</h3>
										<h4><span class="fa fa-hand-o-right" aria-hidden="true"></span>Kathmandu</h4>
									<p><span class="fa fa-nrp" style="color:#f4b200;">Rs</span> 500<p>
									</div>
								</div>
							</li>
						</ul>
						<div class="navigation">
							<div>
								<label for="slides_1"></label>
								<label for="slides_2"></label>
								<label for="slides_3"></label>
							</div>
						</div>
					</div>
					<!-- //banner slider-->
				</div>
				<div class="col-md-6 px-lg-3 px-0">
					<div class="banner-form-w3 ml-lg-5">
						<div class="padding">
							<form action="index_search_bus.php" method="post">
								<h5 class="mb-3">Search Your Bus</h5>
								<div class="form-style-yatri">
									<label class="menu ml-auto mt-1" style="color:white;">From</label>
										<select id="inputState" class="form-control" name="bus-from">
										<option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
										</select>
									<label class="menu ml-auto mt-1" style="color:white;">To</label>
										<select id="inputState" class="form-control" name="bus-to">
										<option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
										</select>
									<label class="menu ml-auto mt-1" style="color:white;">Date</label>
										<div style="width:410px;">  
											<input type="date" name="bus-date" class="form-control" value="date" >  
										</div> 
										<label class="menu ml-auto mt-1"><a href=""></a></label>
									<button Class="btn" name="bus_search"> Search</button>
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->

 <!--/checkprice -->
    <section class="checkprice py-5" id="checkpriced">
        <div class="container py-md-5">
                <h3 class="heading heading1 text-center mb-3 mb-sm-5"> Check Price</h3>
            <div class="row">
                <div class="col-lg-4 col-sm-6 test-info text-left mb-4">
                    <form action="#" method="post">
								<div class="form-style-yatri">
									<label class="menu ml-auto mt-1" style="color:white;">From</label>
										<select id="inputState" class="form-control" name="buspfrom">
										<option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
										</select>
									<label class="menu ml-auto mt-1" style="color:white;">To</label>
										<select id="inputState" class="form-control" name="buspto">
										<option >Kathmandu</option>
                      <option >Janakpur</option>
                      <option >Biratnagar</option>
                      <option >Birgunj</option>
                      <option >Gaur</option>
										</select>
									
									<button Class="btn1" name="bus_price"> Show Price</button>
									
								</div>
							</form>
                   

                   
                </div>
                <div class="col-lg-4 col-sm-6 test-info text-left mb-4">
                   
                    <div class="test-img text-right mb-3">
                        
					</div>
                   
                </div>
				<?php
				$cser=mysqli_connect("localhost","root","","yatri_db");
				 if(isset($_POST["bus_price"]))
	{?>
                <div class="col-lg-4 col-sm-6 test-info text-left gap1 mb-4">
                    <center><table class="table table-dark">
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
                         <center>   Price </center>
                          </th>
                        </tr>
                      </thead>  <?php 

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
                       <center> <?php echo "Rs"?>&nbsp<?php echo $row2['bus_price'];?> </center>
                          </td>
						</tr>
                      </tbody><?php
		$Sno++;  }}?>
                    </table></center>
                </div>
            </div>
        </div>
    </section>
    <!--//checkprice -->
	
	<!-- destinations -->
<section class="destinations py-5" id="ticketprice">
	<div class="container py-md-5">
		  <h3 class="heading text-center mb-3 mb-sm-5">Ticket Prices</h3>
		<div class="row inner-sec-yatris-w3pvt-lauinfo">
			<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
				<h4 class="destination mb-3">pokhara</h4>
				<div class="image-position position-relative">
					<img src="images/p1.jpg" class="img-fluid" alt="">
					<div class="rating">
						<ul>
							<li><span class="fa fa-nrp" style="color:white;">Rs</span>500</li>
				
						</ul>
					</div>
				</div>
				<div class="destinations-info">
					<div class="caption mb-lg-3">
						<h4>Pokhara</h4>
						<a href="login.php">Book Now</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
				<h4 class="destination mb-3">Janakpur</h4>
				<div class="image-position position-relative">
					<img src="images/p2.jpg" class="img-fluid" alt="">
					<div class="rating">
						<ul>
							<li><span class="fa fa-nrp" style="color:white;">Rs</span>800</li>
						</ul>
					</div>
				</div>
				<div class="destinations-info">
					<div class="caption mb-lg-3">
						<h4>Janakpur</h4>
						<a href="login.php">Book Now</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
				<h4 class="destination mb-3">Birgunj</h4>
				<div class="image-position position-relative">
					<img src="images/p3.jpg" class="img-fluid" alt="">
					<div class="rating">
						<ul>
							<li><span class="fa fa-nrp" style="color:white;">Rs</span>700</li>
						</ul>
					</div>
				</div>
				<div class="destinations-info">
					<div class="caption mb-lg-3">
						<h4>Birgunj</h4>
						<a href="login.php">Book Now</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center mb-4">
				<h4 class="destination mb-3">Lumbani</h4>
				<div class="image-position position-relative">
					<img src="images/p4.jpg" class="img-fluid" alt="">
					<div class="rating">
						<ul>
							<li><span class="fa fa-nrp" style="color:white;">Rs</span>750</li>
						</ul>
					</div>
				</div>
				<div class="destinations-info">
					<div class="caption mb-lg-3">
						<h4>Lumbani</h4>
						<a href="login.php">Book Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- destinations -->

	<!-- services -->
<section class="services py-5" id="ourservice">
	<div class="container py-md-5">
	<h3 class="heading text-center mb-3 mb-sm-5">Our services</h3>
		<div class="row service-grid-grids text-center">
			<div class="col-lg-4 col-md-6 service-grid service-grid1 mb-4">
				<div class="service-icon">
					<span ></span>
				</div>
				<h4 class="mt-3"></h4>
				<p class="mt-3"></p>
			</div>
			<div class="col-lg-4 col-md-6 service-grid service-grid2 mb-4">
				<div class="service-icon">
					<span class="fa fa-bus"></span>
				</div>
				<h4 class="mt-3">Bus Service</h4>
				<p class="mt-3">service ddetail</p>
			</div>
			
			<div class="col-lg-4 col-md-6 service-grid service-grid3 mb-4">
				<div class="service-icon">
					<span ></span>
				</div>
				<h4 class="mt-3"></h4>
				<p class="mt-3"></p>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-6 p-md-0 mb-4">
				<div class="bg-image-left">	
					<h4>Pashupati</h4>
				</div>
			</div>
			<div class="col-md-6 p-md-0 mb-4">
				<div class="bg-image-right">
					<h4>Mount Everest</h4>
				</div>
				<div class="row">
					<div class="col-md-6 pr-md-0">
						<div class="bg-image-bottom1">
							<h4>Mechi Ilam</h4>
						</div>
					</div>
					<div class="col-md-6 pl-md-0">
						<div class="bg-image-bottom2">
							<h4>Mahakali Kanchanpur</h4>
						</div>
					</div>
				</div>	
			</div>	
		</div>		
	</div>		
</section>
<!-- //services -->


	
  <!-- banner-bottom -->
    <section class="some-content py-5" id="about">
        <div class="container py-md-5">
            <div class="row about-vv-top mt-2">
                <div class="col-lg-6 about-info">
                    <h4 class="title-hny  mb-md-5">About Us</h4>
                    <p>Detail</p>
                    <div class="read-more-button mt-4">
                        <a href="index.html" class="read-more btn">Read More </a>
                    </div>

                </div>
                <div class="col-lg-6 about-img mt-md-4 mt-sm-4">
                    <img src="images/ab1.jpg" class="img-fluid" alt="">
                </div>

            </div>
        </div>
    </section>
    <!-- //banner-bottom-->

	<!-- Team  -->
<section class="team py-5" id="team">
    <div class="container py-md-5">
		<h3 class="heading text-center mb-3 mb-sm-5">Team</h3>
        <div class="row">
			<div class="team-grid col-lg-3 col-sm-6 mb-5">
				<img src="images/ravi.jpg" class="" alt="" />
				<div class="team-info text-center">
					<h3 class="e">Ravi Paudel</h3>
					<span class="">BE.Computer</span>
				</div>
			</div>
			<div class="team-grid col-lg-3 col-sm-6  mb-5">
				<img src="images/t2.jpg" class="" alt="" />
				<div class="team-info text-center">
					<h3 class="">Aashish Mallick</h3>
					<span class="">BE.Computer</span>
				</div>
			</div>
			<div class="team-grid col-lg-3 col-sm-6  mb-5">
				<img src="images/bishan.jpg" class="" alt="" />
				<div class="team-info text-center">
					<h3 class="">Bishan Rasaili</h3>
					<span class="">BE.Computer</span>
				</div>
			</div>
			<div class="team-grid col-lg-3 col-sm-6  mb-5">
				<img src="images/sas.jpg" class="" alt="" />
				<div class="team-info text-center">
					<h3 class="">Shashwot Joshi</h3>
					<span class="">BE.Computer</span>
				</div>
			</div>
        </div>
    </div>
</section>
<!-- //Team -->
	
<!-- Contact -->
<section class="contact py-5" id="contact">
	<div class="container py-md-5">
			  <h3 class="heading text-center mb-3 mb-sm-5"> Get In Touch with us</h3>
			<ul class="list-unstyled row text-center mt-lg-5 mt-4 px-lg-5">
                <li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
                    <div class=" adress-icon">
                        <span class="fa fa-map-marker"></span>
                    </div>

                    <h6>Location</h6>
                    <p>Yatri
                        <br>Talchhikhel,Lalitpur,Nepal</p>
                </li>

                <li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
                    <div class="adress-icon">
                        <span class="fa fa-envelope-open-o"></span>
                    </div>
                    <h6>Phone & Email</h6>
                    <p>+97798********</p>
                    <a href="mailto:info@example.com" class="mail">yatri@gmail.com</a>
                </li>
				 <li class="col-md-4 col-sm-6 adress-w3pvt-info mb-4">
                    <div class="adress-icon">
                        <span class="fa fa-building"></span>
                    </div>
                    <h6>our branches</h6>
                    <p>Nepal</p>
					 <p></p>
                   
                </li>
            </ul>
			
			<div class="contact-grids mt-5">
				<div class="row">
					<div class="col-lg-6 col-md-6 contact-left-form">
						<form action="#" method="post">
							<div class=" form-group contact-forms">
							  <input type="text" class="form-control" placeholder="Name" required="">
							</div>
							<div class="form-group contact-forms">
							  <input type="email" class="form-control" placeholder="Email" required="">
							</div>
							<div class="form-group contact-forms">
							  <input type="text" class="form-control" placeholder="Phone" required=""> 
							</div>
							<div class="form-group contact-forms">
							  <textarea class="form-control" placeholder="Message" rows="3" required=""></textarea>
							</div>
							<button class="btn btn-block sent-butnn">Send</button>
						</form>
					</div>
					<div class="col-lg-6 col-md-6 contact-right pl-lg-5">
						 <img src="images/c1.jpg" class="img-fluid" alt="user-image">
						
					</div>
				</div>
			</div>
	</div>
</section>
<!-- //Contact -->
   <!-- map -->	
<div class="map p-2">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d883.4979193584907!2d85.3207503!3d27.6557292!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf3d0d1e37134dfb7!2sCosmos+College+of+Management+and+Technology!5e0!3m2!1sen!2snp!4v1564827848290!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!-- //map -->

<!-- //contact us -->


 <!-- footer -->
    <footer class="footer-content py-3">
        <div class="container py-md-3">
            <div class="footer-top text-center">
                <h2>
                    <a class="navbar-brand pt-3 mb-3" href="index.php">
                        <section id="putlogo"><img id="log" alt="log" src="images/logo.jpg">   
										</section>
                    </a>
                </h2>
            </div>
            <div class="row footer-top-inner-vv">
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                    <div class="footer-lavi">
                        <h3 class="mb-3 lavi_title">Links</h3>
                        <hr>
                        <ul class="list-info-lavi">
                            <li>
                                <a href="#about"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Our Mission
                                </a>
                            </li>
                            <li>
                                <a href="#gallery"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Latest Tours
                                </a>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Explore
                                </a>
                            </li>
                            <li>
                                <a href="#contact"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Find us
                                </a>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Privacy Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                    <div class="footer-lavi">
                        <h3 class="mb-3 lavi_title">Navigation</h3>
                        <hr>
                        <ul class="list-info-lavi">
                            <li>
                                <a href="index.php"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#about"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="#services"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                   More services
                                </a>
                            </li>
                            <li>
                                <a href="#team"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Team
                                </a>
                            </li>
                            <li>
                                <a href="#contact"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                    <div class="footer-lavi">
                        <h3 class="mb-3 lavi_title">Customer Care</h3>
                        <hr>
                        <ul class="list-info-lavi">
                            <li>
                                <a href="#about"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Our Mission
                                </a>
                            </li>
                            <li>
                                <a href="#gallery"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Latest Tours
                                </a>
                            </li>
                            <li><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                <a href="#services">
                                    Explore
                                </a>
                            </li>
                            <li>
                                <a href="#contact"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Find us
                                </a>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Privacy Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
                    <div class="footer-lavi">
                        <h3 class="mb-3 lavi_title">Contact Us</h3>
                        <hr>
                        <div class="last-vv-contact">
                            <p>
                                <a href="mailto:yatri@gmail.com">yatri@gmail.com</a>
                            </p>
                        </div>
                        <div class="last-vv-contact my-2">
                            <p>98********</p>
                        </div>
                        <div class="last-vv-contact">
                            <p>Talchhikhel,Lalitpur
                                <br>Nepal</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- //footer bottom -->
    </footer>
    <!-- //footer -->
	
	
<!-- move top -->
<div class="move-top text-right">
	<a href="#home" class="move-top"> 
		<span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
	</a>
</div>
<!-- move top -->



</body>
</html>
