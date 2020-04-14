<?php 
session_start();
    include_once 'creatdb.php';
    $user = new User();

    $user_id = $_SESSION['user_id'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['q'])){
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
					$bus_price = $row1['bus_price'];?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $row["user_fname"];?> -Book Ticket </title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Bus Ticket Reservation Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->

<link rel="stylesheet" type="text/css" href="seat book/css/jquery.seat-charts.css">
<link href="seat book/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="seat book/js/jquery-1.11.0.min.js"></script>
<script src="seat book/js/jquery.seat-charts.js"></script>

   <!-- base:css -->
    <link rel="stylesheet" href="user_dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="user_dashboard/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
	<!-- css files -->
   
  

    <link href="css layout/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	
 
</head>
<body>
<div class="content">
	<center><div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="user_dash.php">
				<label class="logotext" >Yatri</label><a>   <style>.logotext{
																font-family:Colonna MT;
																font-weight:bold; 
																font-size:70px; 
																color:white;
																position: relative;
																}
															</style>
            </div>
			</center>
			
	<div class="main">
	<!--Back Button-->
			<a href="user_dashboard/pages/forms/user_search.php" onclick="history.back();"><i class="fa fa-arrow-left fa-lg"  aria-hidden="true"  ></i></a>

		<h2>Book Your Seat Now?</h2>
		
		<div class="wrapper">
			<div id="seat-map">
				<div class="front-indicator"><h3>Front</h3></div>
			</div>
			<div class="booking-details">
						<div id="legend"></div>
						<h3> Selected Seats (<span id="counter">0</span>):</h3>
						<ul id="selected-seats" class="scrollbar scrollbar1"></ul>
						
						Total: <b>Rs<span id="total">0</span></b>
						
						
						<button class="checkout-button">Pay Now</button>
						<?php echo $row['user_fname']?> <?php echo $row['user_lname']?><br>
						<?php echo $row1['bus_num']?><br>
						<?php echo $row1['bus_date']?><br>
						<?php echo $row1['bus_time']?><br>
						<?php echo $row1['bus_from']?><br>
						<?php echo $row1['bus_to']?><br>
						<ul id="selected-seats" class="scrollbar scrollbar1"></ul>
						
						
			</div>
			<div class="clear"></div>
		</div>
		<script>
				var firstSeatLabel = 1;
			
				$(document).ready(function() {
					var $cart = $('#selected-seats'),
						$counter = $('#counter'),
						$total = $('#total'),
						
						sc = $('#seat-map').seatCharts({
				  map: [
							'e___e',
							'e__ee',
							'___ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'ee_ee',
							'eeeee',
						],
					seats: {
							
							e: { price: <?php echo $row1['bus_price']?>,
								classes : 'economy-class', //your custom CSS class
								category: 'Economy Class'
								}					
						
							},
						naming : {
							top : false,
							getLabel : function (character, row, column) {
								return firstSeatLabel++;
							},
						},
						legend : {
							node : $('#legend'),
							items : [
								[ 'e', 'available',   'Economy Class'],
								[ 'f', 'unavailable', 'Already Booked']
							]					
						},
						click: function () {
							if (this.status() == 'available') {
								//let's create a new <li> which we'll add to the cart items
								$('<li> Seat no '+this.settings.label+': <b>Rs'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
									.attr('id', 'cart-item-'+this.settings.id)
									.data('seatId', this.settings.id)
									.appendTo($cart);
								
								/*
								 * Lets update the counter and total
								 *
								 * .find function will not find the current seat, because it will change its stauts only after return
								 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
								 */
								$counter.text(sc.find('selected').length+1);
								$total.text(recalculateTotal(sc)+this.data().price);
								
								return 'selected';
							} 
							else if (this.status() == 'selected') {
								//update the counter
								$counter.text(sc.find('selected').length-1);
								//and total
								$total.text(recalculateTotal(sc)-this.data().price);
							
								//remove the item from our cart
								$('#cart-item-'+this.settings.id).remove();
							
								//seat has been vacated
								return 'available';
							} else if (this.status() == 'unavailable') {
								//seat has been already booked
								return 'unavailable';
							} else {
								return this.style();
							}
						}
					});

					//this will handle "[cancel]" link clicks
					$('#selected-seats').on('click', '.cancel-cart-item', function () {
						//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
						sc.get(Rs(this).parents('li:first').data('seatId')).click();
					});

					//let's pretend some seats have already been booked
					sc.get(['1_5', ]).status('unavailable');
			
			});

			function recalculateTotal(sc) {
				var total = 0;
			
				//basically find every selected seat and sum its price
				sc.find('selected').each(function () {
					total += this.data().price;
				});
				
				return total;
			}
		</script>
	</div>
	<p class="copy_rights">&copy; 2019 Yatri. All Rights Reserved | Design by  <a href="" target="_blank"> Yatri</a></p>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
