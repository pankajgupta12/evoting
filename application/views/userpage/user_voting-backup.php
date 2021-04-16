
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="<?php echo base_url() ?>files/assets/image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title><?php  echo $title; ?></title>

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
						<div class="card">
							<div class="header">
								<h3 class="title">Voting</h3><hr>
							</div>
							<?php // print_r($postlist->position_name); ?>
							<div class="content">
								<form action="<?php echo base_url('user/user_voting'); ?>" id="user_voting" method="post">                                
									<div class="col-md-12">
										<div class="col-md-6 form-group">
											<h4>Post</h4>
										</div>
										<div class="col-md-6 form-group">
											<h4>Select Candidate</h4>
										</div><br>
										
										<?php 
											$i=0;
										foreach($postlist as $postlist){
											
											$candidtelist=$this->db->select('*')->from('tbl_candidate')->where(array('position_id'=>$postlist->position_id))->get()->result();
										?>
										<div class="row" >
											<div class="col-md-6">
												<span><h5><?php echo $i+1;?>. <?php echo $postlist->position_name; ?></h5></span>
											</div>
								<?php // print_r($postlist);  ?>			
									<input type="hidden" name="position_id[]" value="<?php echo $postlist->position_id; ?>">		
											<div class="col-md-6 form-group">
												 <select name="candidate_id1[<?php echo $i;?>]" id="candidate_id<?php echo $i;?>" class="form-control" style="width:70%">
														<option value="" style="width:70%">Select Candidate</option>
														<?php foreach($candidtelist as $candidtelist){ ?>
														<option value="<?php echo $candidtelist->candidate_id; ?>" style="width:70%"><?php echo $candidtelist->candidate_name; ?></option>
														<?php } ?>
												</select>
													<span class="error"><?php echo form_error('candidate_id1'.$i); ?></span>
											</div>
										</div>
										
										<?php $i++; } ?>
									</div>
								
									<div class="row col-md-12" align="center">
										<button type="submit" class="btn btn-info btn-fill">Save</button>
										<button type="button" class="btn btn-info btn-fill">Cancel</button>
									</div>
									<div class="clearfix"></div>
								</form>
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