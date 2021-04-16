<style>
.add-question{
background-color: #3F3FF8;
color: #fff;
}
.add-success{
background-color: #25B50E;
color: #fff;
}
.add-danger{
background-color: #F72A37;
color: #fff;
}
</style>
 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
			<?php if($this->session->flashdata('SuccessMessage')){ ?>
				<span class="alert alert-success col-lg-12">
				 <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php echo $this->session->flashdata('SuccessMessage'); ?>
                </span>
			<?php } ?>	
							<?php if( $this->session->flashdata('error') ){ ?>
							<div class="alert alert-danger">
							<strong>Warning!</strong> <?php echo $this->session->flashdata('error'); ?>
							</div>
							<?php  }?> 	
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Question List<a style="float:right;" class="add-question btn btn-primary btn-xs" href="<?php echo base_url('admin/add_question'); ?>">Add Question</a></h4>
                                
                                <span id="deletemsgshow"  style="display:none;color:red;">Question Deleted Successfully</span>		
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getQuestionData">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Question</th>
                                    	<th>Status</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
									foreach($questionlist as $questiondata){ 
								  $question_id = base64_encode($questiondata->question_id);
								  if($questiondata->show_hide == '1') { $status = "Active"; $buttonClass="add-success btn btn-success btn-xs"; $status_url=base_url('admin/status?qid='.$question_id.'&st=2'); }else{ $status = "Deactive"; $buttonClass="add-danger btn btn-danger btn-xs"; $status_url=base_url('admin/status?qid='.$question_id.'&st=1');}
									?>
                            <tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $questiondata->question; ?></td>
								<td><a href="<?php echo $status_url; ?>" class='<?php echo $buttonClass; ?>' ><?php echo $status; ?></a></td>
                                <td><a href="<?php echo base_url('admin/edit_question?question_id='.$question_id); ?>"  style="cursor: pointer;">Edit</a>  | <a Onclick="return deleteleAddQuestion11('<?php echo $questiondata->question_id; ?>');" style="cursor: pointer;">  Delete</a></td>
                            </tr>
									<?php $i++; } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			</div>
<script>
  function deleteleAddQuestion11(questionID){

			if(confirm("Are you sure do you want delete this question")){
				   var formData = "questionID="+questionID;
				//   alert(formData);
					 $.ajax({
								type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
								url         : '<?php echo base_url('admin/deleteleAddQuestion'); ?>', 
								data        : formData, // our data object
								dataType    : 'html', // what type of data do we expect back from the server
								
								success: function(data)
							   {
								   
								 //  alert(data); // show response from the php script.
								//   $('#claas_name').val('');
								   $('#getQuestionData').html(data);
								    $('#deletemsgshow').show();
								   $('#deletemsgshow').fadeOut(1500);  
							   }	
						});
				}else{
					  return false;
				}
		}
</script>