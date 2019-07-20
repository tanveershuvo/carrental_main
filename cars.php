	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Car Rentals</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			<?php include_once("include/navbar.php"); ?>
			<?php
			include_once 'dbCon.php';
			$conn= connect();
			if (isset($_POST['book'])){
			  function generateRandomString()  {
				 $characters = '0123456789';
				 $length = 6;
				 $charactersLength = strlen($characters);
				 $randomString = '';
				 for ($i = 0; $i < $length; $i++) {
					 $randomString .= $characters[rand(0, $charactersLength - 1)];
				 }
				 return $randomString;
												 }
			  $booking_id = generateRandomString();
			  $zone = $_POST['zone'];
			  $pick_date = $_POST['pick_date'];
			  $return_date = $_POST['return_date'];
			  $class = $_POST['class'];
			  $car_id = $_POST['car_id'];
			  $price = $_POST['price'];
			  $cus_id = $_SESSION['cus_id'];
			  $booking_date = date('m/d/Y');
			  $days = (strtotime($return_date) - strtotime($pick_date)) / (60 * 60 * 24);
			  $diff = ($days + 1);
			  $total = ($diff * $price);
			  $sql = "INSERT INTO `booking_details`(`booking_id`, `car_id`, `pick_date`, `return_date`,
					  `total_day`, `total_bill`, `price`, `pickup_location`, `booking_date`, `cus_id`)
					  VALUES ('$booking_id','$car_id','$pick_date','$return_date',
						'$diff','$total','$price','$zone','$booking_date','$cus_id')";
			  if($conn->query($sql)){
				echo '<script>window.open("mail.php?id='."$booking_id".'");</script>';
			  }

			}
			?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Cars			
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="cars.html"> Cars</a></p>
						</div>											
					</div>
						
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start model Area -->
			<section class="model-area section-gap" id="cars">
				<div class="container">
			

					<div class="row d-flex justify-content-center pb-40">
						<div class="col-md-8 pb-40 header-text">
							<h1 class="text-center pb-10">Choose your Desired Car Model</h1>
							<p class="text-center">
								Who are in extremely love with eco friendly system.
							</p>
						</div>
					</div>		
				
				<?php
                           
                            $conn= connect();
                            if(isset($_POST['search'])){
                              $zone = $_POST['zone'];
                              $pick_date = $_POST['pick_date'];
                              $return_date = $_POST['return_date'];
                              $ssql = "SELECT car_id FROM booking_details  WHERE
                                      pick_date  BETWEEN '$pick_date' AND '$return_date'
                                      AND return_date BETWEEN '$pick_date' AND '$return_date' GROUP BY car_id";
                                      // echo $ssql;

                                $result = $conn->query($ssql);
                                $data = '00';
                                foreach( $result as $row ){
                                  $data .=  $row['car_id'].',';
                                }
                                $data = rtrim($data,',');
                                  $sql = "SELECT * FROM `car_details` WHERE `car_id` NOT IN ($data)";
                                  // echo $sql;
                                $resultData=$conn->query($sql);
                                if($resultData->num_rows > 0){
                                foreach($resultData as $view){
                ?>		<form method="POST" >
						<div class="row align-items-center single-model item">
						 
                                    <input type="hidden" name="car_id" value="<?=$view['car_id']?>" >
                                    <input type="hidden" name="zone" value="<?=$_POST['zone']?>" >
                                    <input type="hidden" name="pick_date" value="<?=$_POST['pick_date']?>" >
                                    <input type="hidden" name="return_date" value="<?=$_POST['return_date']?>" >
                                    <input type="hidden" name="class" value="<?=$_POST['class']?>" >
                                    <input type="hidden" name="price" value="<?=$view['price']?>" >
							<div class="col-lg-6 model-left">
								<div class="title justify-content-between d-flex">
									<h4 class="mt-20"><?=$view['car_name']?></h4>
									<h2>$<?=$view['price']?><span>/day</span></h2>
								</div>
								<p>
									<?=$view['car_details']?></p>
								<p>
									Class         : <?=$view['class']?> <br>
									Fuel            : <?=$view['fuel']?><br>
									Door    : <?=$view['door']?> <br>
									Gearbox     : <?=$view['gearbox']?>
								</p>
								<input type="submit" name="book" value="Book This Car Now" class="text-uppercase primary-btn">
								
							</div>
							<div class="col-lg-6 model-right">
								<img class="img-fluid" src="admin/images/<?=$view['img1']?>" alt="">
							</div>
						
						</div>
						</form><hr>
						<?php
							}
						}else{
                        ?>
                        <div class="col-lg-12 col-md-12">
                          <H3>No Car Is available in that day!! Sorry, Try Again With another date!!</H3>
                        </div>
                        <?php
                      }
                       }
                          if(!isset($_POST['search'])){
                            $sql = "select * from car_details";
                            $resultData=$conn->query($sql);
                            foreach($resultData as $view){
                            ?>
						<div class="row align-items-center single-model item">
						
							<div class="col-lg-6 model-left">
								<div class="title justify-content-between d-flex">
									<h4 class="mt-20"><?=$view['car_name']?></h4>
									<h2>$<?=$view['price']?><span>/day</span></h2>
								</div>
								<p>
									<?=$view['car_details']?></p>
								<p>
									Class         : <?=$view['class']?> <br>
									Fuel            : <?=$view['fuel']?><br>
									Door    : <?=$view['door']?> <br>
									Gearbox     : <?=$view['gearbox']?>
								</p>
								
							</div>
							<div class="col-lg-6 model-right">
								<img class="img-fluid" src="admin/images/<?=$view['img1']?>" alt="">
							</div>
						
						</div><hr>


						<?php
                                }
                              }
                           ?>
				</div>	
			</section>
			<!-- End model Area -->			

			<!-- Start callaction Area -->
			<section class="callaction-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<h1 class="text-white">Experience Great Support</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
							</p>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End callaction Area -->

				<?php include_once ('include/footer.php'); ?> 			

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>
