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
			<?php if( $this->session->flashdata('message') ){ ?>
				<div class="alert alert-success">
				  <strong>Successful!</strong> <?php echo $this->session->flashdata('message'); ?>
				</div>
			<?php  }?> 		
							<?php if( $this->session->flashdata('error') ){ ?>
							<div class="alert alert-danger">
							<strong>Warning!</strong> <?php echo $this->session->flashdata('error'); ?>
							</div>
							<?php  }?> 	
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Position List<a style="float:right;" class="add-question btn btn-primary btn-xs" href="<?php echo base_url('admin/add_post'); ?>">Add Position</a></h4>
                                
                                <span id="deletemsgshow"  style="display:none;color:red;">One Row Delete Successfully</span>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getPostingData">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Position</th>
										<th>Status</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
									foreach($positionlist as $positiondata){ 
									$position_id = base64_encode($positiondata->position_id);
									
									if($positiondata->status == '1') { $status = "Active"; $buttonClass="add-success btn btn-success btn-xs"; $status_url=base_url('admin/vstatus?pid='.$position_id.'&st=2'); }else{ $status = "Deactive"; $buttonClass="add-danger btn btn-danger btn-xs"; $status_url=base_url('admin/vstatus?pid='.$position_id.'&st=1');}
									?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $positiondata->position_name	; ?></td>
                                        	<td><a href="<?php echo $status_url; ?>" class='<?php echo $buttonClass; ?>' ><?php echo $status; ?></a></td>
                                        	<td><a href="<?php echo base_url('admin/add_post?position_id='.$position_id); ?>" style="cursor: pointer;">Edit</a>  | <a Onclick="return deletelePostListing('<?php echo $positiondata->position_id; ?>','<?php echo $positiondata->position_name; ?>');" style="cursor: pointer;">  Delete</a></td>
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
  function deletelePostListing(positionid,positionname){

			if(confirm("Are you sure do you want delete Position  "+positionname)){
				   var formData = "positionid="+positionid;
				//   alert(formData);
					 $.ajax({
								type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
								url         : '<?php echo base_url('admin/deletelePostListing'); ?>', 
								data        : formData, // our data object
								dataType    : 'html', // what type of data do we expect back from the server
								
								success: function(data)
							   {
								 if(data == 'error'){
								   alert('This Position is Used In Candidate List');
								 }else{
									$('#getPostingData').html(data);
									$('#deletemsgshow').show();
									$('#deletemsgshow').fadeOut(1500);  
								   }
							   }	
						});
				}else{
					  return false;
				}
		}
</script>