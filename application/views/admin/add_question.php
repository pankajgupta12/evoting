<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Question</h4>
                            </div>
                            <div class="content">
                               <form action="<?php  echo base_url('admin/addquestiondata'); ?>" id="addquestiondata" method="post" class="middle-forms">   
								    <div class="row">
                                        
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Question</label>
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
                                                <input type="text" class="form-control" id="question0" name="question[]" placeholder="question" value="">
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
										     <button type="button"  id="add_new" class="submit-btn" onclick="return addnewquestion();"  >Add Question</button>
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

		  function addnewquestion()
		{

			$('.add_new_document').removeClass('hide');
			$('.alert-success').hide();	
			var divSize = $(".add_new_document > div").size()+1;
			//alert(divSize);
		
		  var divid = divSize - 1;
		 var questionid = $('#question'+divid).val();		
		  if(questionid == ""){
			alert ('Please fill all fields');
					// $('#documentlist_'+divid).show();
					 return false;
		 } 
			$.ajax({
						url: '<?php echo base_url(); ?>admin/addnewquestion',
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
				var url = $('#addquestiondata').attr('action');
				var formData=$('#addquestiondata').serialize();
				$.ajax({
						dataType: 'json',
						type: 'POST',
						url: url,
						data: formData,
						success: function(resp) {
							//console.log(resp);
							
							if(resp.done==='success'){
							       window.location.href = "<?php echo base_url('admin/questionlist'); ?>"; 
							}else{
									$.each(resp, function(i, v) {
									console.log(i + " => " + v); // view in console for error messages
									var msg = '<p class="error" style="margin-left: 15px;left: 0px; position: absolute;color:red" for="'+i+'">'+v+'</p>';
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
	function removeQuestion(id){
	 $('#questionid_'+id).remove();
	
	}	

			 
		
		</script>