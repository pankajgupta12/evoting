<style>
 .error{
   color:red;
 }
</style>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Mobile No</h4>
                            </div>
                            <div class="content">
                               <form action="<?php  echo base_url('admin/addmobilenumberdata'); ?>" id="addmobilenumberdata" method="post" class="middle-forms">   
								    <div class="row">
                                        
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                            </div>
                                        </div>
										<!--<div class="col-md-1">
                                            <div class="form-group">
                                                <label>Status</label>
                                            </div>
                                        </div>-->
										
                                    </div>
								
                                    <div class="row">
                                        
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="mobile0" name="mobile[]" placeholder="Enter mobile number" value="">
                                            </div>
                                        </div>
										<!--<div class="col-md-1">
                                            <div class="form-group">
                                                <input type="checkbox" id="show_hide0" class="form-control" name="show_hide[0]" value="1" checked>
                                            </div>
                                        </div>-->
									
										
										<div class="add_new_document hide"></div>
										
										<div class="col-md-2">
                                            <div class="form-group">
										     <button type="button"  id="add_new" class="submit-btn" onclick="return addmobilenumber();"  >Add mobile</button>
										 </div>
                                        </div>  
                                       
                                    </div>
                                   <button  id="studentbtn" class="submit-btn"  style="float: left;">submit</button>
									
                                </form>    
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			
			function mobiledigit(id){	
			
			var divSize = $(".add_new_document > div").size()+1;
		    var divid = divSize - 1;
			  var mobile = $('#mobile'+divid).val();	
				//if the letter is not digit then display error and don't type anything
				if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				  alert('Please Enter digit Only');
				//display error message
				//$("#errmsg").html("Digits Only").show().fadeOut("slow");
				return false;
				}
			}
		  function addmobilenumber()
		{

			$('.add_new_document').removeClass('hide');
			$('.alert-success').hide();	
			var divSize = $(".add_new_document > div").size()+1;
			//alert(divSize);
		
		  var divid = divSize - 1;
		 var mobile = $('#mobile'+divid).val();		
		  if(mobile == ""){
			alert ('Please enter mobile number');
					// $('#documentlist_'+divid).show();
					 return false;
		 } else{
			if(isNaN(mobile)){
				alert("Mobile should be numeric.");
				$('#mobile'+divid).val('');	
				return false;
			}
		}
			$.ajax({
						url: '<?php echo base_url(); ?>admin/addmobilenumber',
						type: 'POST',
						data: {divSize:divSize},
						success: function(res)
						{
							//alert(res);
							if(divSize=='0'){
								$('.add_new_document').html(res);
							}
							else{
								$('.add_new_document').append(res);
							}
							
						}
				}); 
		}
    	     var data = {};
			$(document).ready(function() {
		//	alert('dcdb');
			$('button[id="studentbtn"]').on('click', function() {
			
				//$('button[id="studentbtn"]').addClass('disabled');
				resetErrors();
				var url = $('#addmobilenumberdata').attr('action');
				var formData=$('#addmobilenumberdata').serialize();
				$.ajax({
						dataType: 'json',
						type: 'POST',
						url: url,
						data: formData,
						success: function(resp) {
							//console.log(resp);
							
							if(resp.done==='success'){
							       window.location.href = "<?php echo base_url('admin/user_details'); ?>"; 
							}else{
									$.each(resp, function(i, v) {
									console.log(i + " => " + v); // view in console for error messages
									var msg = '<label class="error" style="color:red"  for="'+i+'">'+v+'</label>';
									$('input[name="' + i + '"],input[id="' + i + '"],select[id="' + i + '"],div[id="' + i + '"],textarea[id="' + i + '"]').addClass('inputTxtError').after(msg);
									});

									var keys = Object.keys(resp);
									$('[name="'+keys[0]+'"]').focus();
								
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
	function removeMobileDive(id){
	 $('#questionid_'+id).remove();
	
	}	

			 
		
		</script>