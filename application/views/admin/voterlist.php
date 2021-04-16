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
                              <?php // print_r($answerlist); ?>  
                               
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="getPostingData">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Mobile No</th>
										<th>Date and Time</th>
                                    	
                                    </thead>
									<?php 
									$i=0;
								foreach($answerlist as $answerdata){ $i++;  
								
							$userdetails =	$this->db->get_where('tbl_user_registration',array('user_id'=>$answerdata->user_id))->row();
								if(!empty($userdetails)) {	
                               ?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $userdetails->mobile_number; ?></td>
                                        	<td><?php echo $answerdata->created_at; ?></td>
										</tr>
									<?php } } ?>										
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			</div>
