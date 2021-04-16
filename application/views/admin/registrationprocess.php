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
                                <h4 class="title">Registration Process</h4>
                                
                               
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getPostingData">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Registration</th>
										<th>Status</th>
                                    	
                                    </thead>
									<?php if($registrationStatus->status == '1') { $status = "Active"; $buttonClass="add-success btn btn-success btn-xs"; }else{ $status = "Deactive"; $buttonClass="add-danger btn btn-danger btn-xs"; } ?>
                                        <tr>
                                        	<td>1</td>
                                        	<td>Registration</td>
                                        	<td><a href="<?php echo base_url('admin/registrationprocess?statusID='.$registrationStatus->status) ?>" class="<?php echo $buttonClass; ?>"><?php echo $status; ?></a></td>
										</tr>	
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			</div>
