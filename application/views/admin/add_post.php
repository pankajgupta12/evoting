<style>
 .error{
  color:red;
 }
</style>
<?php  
 if(isset($_GET['position_id'])){
  $position_id = $_GET['position_id'];
  $url = "admin/add_post?position_id=".$position_id;
 }else{
  $url = "admin/add_post";
 }

?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Position</h4>
                            </div>
			<?php if( $this->session->flashdata('message') ){ ?>
				<div class="alert alert-success">
				  <strong>Successful!</strong> <?php echo $this->session->flashdata('message'); ?>
				</div>
			<?php  }?> 			
                            <div class="content">
                                <form method="post" action="<?php echo base_url($url); ?>">
                                    <div class="row">
                            <?php // print_r($positiondata); ?>            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Position Name</label>
                                                <input type="text" name="position_name" class="form-control" placeholder="Position name" value="<?php  if(set_value('position_name')){echo set_value('position_name');  }  elseif(isset($positiondata->position_name)) { echo trim($positiondata->position_name); }?>">
												 <span class="error"><?php  echo   form_error('position_name'); ?></span>	
                                            </div>
                                        </div>
                                     </div>
									 
                     <input type="hidden" class="form-control"  name="position_id" id="position_id" value="<?php if(isset($positiondata->position_id)) {echo $positiondata->position_id;} ?>">		
								
                                    <input  type="submit" name="submit" id="submit" class="btn btn-info btn-fill pull-left" value="submit">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>