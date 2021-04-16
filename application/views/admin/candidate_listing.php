<style>
.add-question{
background-color: #3F3FF8;
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
                                <h4 class="title">Candidate List<span ><a class="add-question btn btn-primary btn-xs" style="float:right;" href="<?php echo base_url('admin/add_candidate'); ?>">Add Candidate</a></span></h4>
                                
                                 <span id="deletemsgshow"  style="display:none;color:red;">One Row Delete Successfully</span>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getcandidateData">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Candidate Name</th>
                                    	<th>Post</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
									foreach($candidatelist as $candidate){
                                    $candidate_id =   base64_encode($candidate->candidate_id);
									//SELECT * FROM `tbl_position` where position_id = '1'
							$getpositionNmae = $this->db->get_where('tbl_position',array('position_id'=>$candidate->position_id))->row();		
									?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $candidate->candidate_name; ?></td>
                                        	<td><?php echo $getpositionNmae->position_name; ?></td>
                                        	<td><a href="<?php echo base_url('admin/add_candidate?candidate_id='.$candidate_id); ?>" style="cursor: pointer;">Edit</a>  | <a Onclick="return deleteleCandidate('<?php echo $candidate->candidate_id; ?>','<?php echo $candidate->candidate_name; ?>');" style="cursor: pointer;">  Delete</a></td>
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
  function deleteleCandidate(candidateid,candidatename){

			if(confirm("Are you sure do you want delete candidate  "+candidatename)){
				   var formData = "candidateid="+candidateid;
				//   alert(formData);
					 $.ajax({
								type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
								url         : '<?php echo base_url('admin/deleteleCandidate'); ?>', 
								data        : formData, // our data object
								dataType    : 'html', // what type of data do we expect back from the server
								
								success: function(data)
							   {
								   
								 //  alert(data); // show response from the php script.
								//   $('#claas_name').val('');
								   $('#getcandidateData').html(data);
								    $('#deletemsgshow').show();
								   $('#deletemsgshow').fadeOut(1500);  
							   }	
						});
				}else{
					  return false;
				}
		}
</script>