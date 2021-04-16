<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="<?php echo base_url() ?>files/assets/image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title><?php  echo "Thank you"; ?></title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />


		<!-- Bootstrap core CSS     -->
		<link href="<?php echo base_url() ?>files/assets/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Animation library for notifications   -->
		<link href="<?php echo base_url() ?>files/assets/css/animate.min.css" rel="stylesheet"/>

		<!--  Light Bootstrap Table core CSS    -->
		<link href="<?php echo base_url() ?>files/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


		<!--  CSS for Demo Purpose, don't include it in your project     -->
		<link href="<?php echo base_url() ?>files/assets/css/demo.css" rel="stylesheet" />


		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		<link href="<?php echo base_url() ?>files/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

	</head>
	<body>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card"><br> <?php if($this->session->flashdata('SuccessMessage')){ ?><span class="alert alert-success col-lg-12"><button type="button" class="close" data-dismiss="alert">x</button><?php echo $this->session->flashdata('SuccessMessage'); ?></span><?php }  ?><div class="header"><h3 class="title">Voting is completed.</h3><hr></div>
							
						<div class="content">
							<h3>
							Thank you !!!
							</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	 <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>files/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    
	
	<script src="<?php echo base_url(); ?>files/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo base_url(); ?>files/assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>files/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>files/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>files/assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url() ?>files/assets/js/demo.js"></script>

</html>