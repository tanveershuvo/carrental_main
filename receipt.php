<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php

include_once 'dbCon.php';
$conn= connect();
if (isset($_GET['id'])){
	$booking_id = $_GET['id'];
	$sql = "SELECT * FROM `booking_details` as b , car_details as c , user_details as u
					WHERE b.car_id=c.car_id AND b.cus_id=u.cus_id AND b.booking_id ='$booking_id'";
	$resultData=$conn->query($sql);
	foreach($resultData as $view){
		$name		= $view['name'];
		$email	= $view['email'];
		$phone	= $view['phone'];
		$address	= $view['address'];
		$driver_phone	= $view['driver_phone'];
		$driver_name	= $view['driver_name'];
		$car_name	= $view['car_name'];
		$price	= $view['price'];
		$booking_date	= $view['booking_date'];
		$pickup_location	= $view['pickup_location'];
		$total_bill	= $view['total_bill'];
		$total_day	= $view['total_day'];
		$pick_date	= $view['pick_date'];
		$return_date	= $view['return_date'];
		$date	= $view['booking_date'];
	}
}
?>
<div class="container">
	<div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">

					<div class="col-xs-12 col-sm-12 col-md-12 text-left">
						<div class="receipt-right">
							<h1>Receipt</h1>
						</div>

					</div>

				</div>
            </div>
						<hr>

			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5><?=$name?></h5>
							<p><b>Phone :</b> <?=$phone?> </p>
							<p><b>Email :</b> <?=$email?></p>
							<p><b>Address :</b> <?=$address?></p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h2><b>Carrental</b></h2>
						</div>
					</div>
				</div>
            </div>
									<div>
										<table class="table table-bordered">

																	<td class="text-left">
																	<p>
																			<strong> Pick Up date :  <?=$pick_date?> </strong>
																	</p>
																	<p>
																			<strong>Return date :  <?=$return_date?> </strong>
																	</p>
																	<p>
																			<strong>Pick Up location : <?=$pickup_location?> </strong>
																	</p>
																	<p>
																			<strong>Car Name : <?=$car_name?></strong>
																	</p>
																	<p>
																			<strong>Driver name : <?=$driver_name?></strong>
																	</p>
																	<p>
																			<strong>Driver Phone : <?=$driver_phone?></strong>
																	</p>
										</td>
															</tr>
													</tbody>
											</table>
									</div>

									<div>
              <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>Description</th>
                                  <th>Amount</th>
                              </tr>
                          </thead>
                            <td class="text-right">
                            <p>
                                <strong> Price: </strong>
                            </p>
                            <p>
                                <strong>Total Day: </strong>
                            </p>
													</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?=$price?>/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i><?=$total_day?></strong>
                            </p>
							</td>
                        </tr>
                        <tr>

                            <td class="text-right"><h2><strong>Total Bill : </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i><?=$total_bill?> /-</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>

			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b><?=$date?>  </p>
							<h5 style="color: rgb(140, 140, 140);">Thank you for your booking!</h5>
						</div>
					</div>

				</div>
            </div>

        </div>
	</div>
</div>
<style>
.text-danger strong {
    		color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}

		#container {
			background-color: #dcdcdc;
		}
</style>
