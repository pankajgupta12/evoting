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
								<h3 class="title">Qusetions</h3><hr>
							</div>
							<div class="content">
						<?php 
						/*  $candidtelist=$this->db->select('*')->from('tbl_users_answer')->where(array('user_id'=>$this->session->userdata('user_id')))->get()->row(); 
						if(empty($candidtelist)){ */ 
						?>	
								<form method="post" id="userdashboard1" action="<?php echo  base_url('user/userdashboard'); ?>">      
								<?php  
									$i=0;
									foreach($questionlist as $questionlist){
									
									$candidte_questionlist=$this->db->select('*')->from('tbl_manage_user_question')->where(array('user_id'=>$this->session->userdata('user_id'),'question_id'=>$questionlist->question_id))->get()->row();
									if(empty($candidte_questionlist)){									
									$i++;
									?>
									<div class="col-md-12">										
										<div class="col-md-12">
											<p class="question"><?php echo $i; ?>. <?php echo $questionlist->question; ?></p>
										</div>
										<div class="col-md-6 form-group">
											<ul class="">
												<input type="radio" Onclick="gettextbox1('<?php echo $i; ?>');"  name="ans[<?php echo $i; ?>]" id="and_<?php echo $i; ?>" value="<?php echo $questionlist->question_id; ?>_1" ><label for="q1a">Agree</label><br/>
												
												<input type="radio"  Onclick="gettextbox('<?php echo $i; ?>');"  name="ans[<?php echo $i; ?>]" value="<?php echo $questionlist->question_id; ?>_0" id="and_<?php echo $i; ?>"><label for="q1b">Disagree</label><br/>
												
												<input type="radio" Onclick="gettextbox('<?php echo $i; ?>');" name="ans[<?php echo $i; ?>]"   value="<?php echo $questionlist->question_id; ?>_others" id="others_<?php echo $i; ?>"><label for="q1c">Other</label><br/>
												
												<span id="text_<?php echo $i;?>" style="display:none;"><input type="text" class="form-control" name="q1_text[<?php echo $questionlist->question_id; ?>]" value="" id="othersvalue_<?php echo $i; ?>"></span><br/>
												</ul>
										</div>
									</div>
									<?php } }
										if($i==0){
									?>
									<div>
								<h3>Your Participation has already existed....</h3>
								<a href="<?php echo base_url(''); ?>" class="btn btn-info btn-fill">Back</a>
								<a href="<?php echo base_url('user/user_voting'); ?>" class="btn btn-info btn-fill">next</a>
								</div>
								<?php   }else { ?>
									<div class="row col-md-12" align="center">
										<button type="submit"  class="btn btn-info btn-fill" >Save</button>
										
									</div>
									<div class="clearfix"></div>
								<?php   } ?>
							<!--	<div>
								<h3>Your Participation has allready existed....
								</div>	---->				
								<?php // }?>		
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	  function gettextbox(id){
	    //alert(id);
		if($('#others_'+id).is(':checked')){
		   //$('#text_'+id).show();
		}else{
		  //$('#text_'+id).hide();
		  //$('#othersvalue_'+id).val('');
		}
	  }
	  
	 $(function() {
			$('button[id="studentbtn"]').on('click', function() {
				$('button[id="studentbtn"]').addClass('disabled');
				resetErrors();
				var url = $('#userdashboard1').attr('action');
				var formData=$('#userdashboard1').serialize();
				$.ajax({
						dataType: 'json',
						type: 'POST',
						url: url,
						data: formData,
						success: function(resp) {
							//console.log(resp);
							
							if(resp.done==='success'){
								
								$('button[id="studentbtn"]').removeClass('disabled');
								//window.location.href = "<?php echo base_url('administration/teachers'); ?>";
								// if(resp.set_submit=='1')
								// {
									//alert(resp.set_submit);
									// // $("#is_submit").val('1');
									// $('#work_order_form').submit();
									// return true;
								// }				
							}else{
								if (resp === true) {
									//successful validation
									$('button[id="studentbtn"]').removeClass('disabled');
									$('#work_order_form').submit();

								} else {
									$('#pageloaddiv').hide();
									$('button[id="studentbtn"]').removeClass('disabled');
									$.each(resp, function(i, v) {
									console.log(i + " => " + v); // view in console for error messages
									var msg = '<label class="error" for="'+i+'">'+v+'</label>';
									$('input[name="' + i + '"],input[id="' + i + '"],select[id="' + i + '"],div[id="' + i + '"],textarea[id="' + i + '"]').addClass('inputTxtError').after(msg);
									});

									var keys = Object.keys(resp);
									$('[name="'+keys[0]+'"]').focus();
								}
							}

						},
						error: function() {
							console.log('there was a problem checking the fields');
						}
					});
					return false;
				});
		});
		
			function resetErrors() {
				$('form input,#vendor_id_chosen,form textarea,div.chosen-container').removeClass('inputTxtError');
				$('label.error').remove();
			}	
	</script>
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
