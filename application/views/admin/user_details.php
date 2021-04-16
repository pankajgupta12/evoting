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
                                <h4 class="title">Mobile Number List<a style="float:right;" class="add-question btn btn-primary btn-xs" href="<?php echo base_url('admin/send_link'); ?>">Add Mobile No</a></h4>
						<span id="deletemsgshow"  style="display:none;color:red;">One Row Delete Successfully</span>		
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getusermobileList">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Mobile Number</th>
                                    	<th>Action</th>
                                    	
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
									foreach($mobilelist as $mobiledata){
                                   $mobileid = base64_encode($mobiledata->mobile_id);
									?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $mobiledata->mobile_number; ?></td>
                                        	<td><a href="<?php echo base_url('admin/edit_send_link?mobile_id='.$mobileid); ?>" style="cursor: pointer;">Edit</a>  | <a Onclick="return deletelesendLink('<?php echo $mobiledata->mobile_id; ?>','<?php echo $mobiledata->mobile_number; ?>');" style="cursor: pointer;">  Delete</a></td>
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
  function deletelesendLink(mobileID,mobileNumber){

			if(confirm("Are you sure do you want delete Mobile  "+mobileNumber)){
				   var formData = "mobileID="+mobileID;
				//   alert(formData);
					 $.ajax({
								type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
								url         : '<?php echo base_url('admin/deletelesendLink'); ?>', 
								data        : formData, // our data object
								dataType    : 'html', // what type of data do we expect back from the server
								
								success: function(data)
							   {
								   
								 //  alert(data); // show response from the php script.
								//   $('#claas_name').val('');
								   $('#getusermobileList').html(data);
								    $('#deletemsgshow').show();
								   $('#deletemsgshow').fadeOut(1500);  
							   }	
						});
				}else{
					  return false;
				}
		}
</script>