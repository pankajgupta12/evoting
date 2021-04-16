<style>
 .error{
  color:red;
 }
</style>
<?php  
 if(isset($_GET['candidate_id'])){
  $candidate_id = $_GET['candidate_id'];
  $url = "admin/add_candidate?candidate_id=".$candidate_id;
 }else{
  $url = "admin/add_candidate";
 }

?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Candidate</h4>
                            </div>
                            <div class="content">
                                <form action="<?php  echo base_url($url); ?>" id="add_candidate" method="post" class="middle-forms">
                                    <div class="row">
                                      
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Candidate Name</label>
                                                <input type="text" class="form-control" Placeholder="Candidate name" name="candidate_name" id="candidate_name" value="<?php  if(set_value('candidate_name')){echo set_value('candidate_name');  }  elseif(isset($CandidateData->candidate_name)) { echo trim($CandidateData->candidate_name); }?>">
												<span class="error"><?php  echo   form_error('candidate_name'); ?></span>	
                                            </div>
                                        </div>
						 <input type="hidden" class="form-control"  name="candidate_id" id="candidate_id" value="<?php if(isset($CandidateData->candidate_id)) {echo $CandidateData->candidate_id;} ?>">				
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Position Name</label>
                                                <select name="position_id" id="position_id" class="form-control">
													<?php   foreach($positionlist as $positiondata) { ?>
													<option value="<?php echo $positiondata->position_id; ?>"<?php if(set_select('position_id')){echo set_select('position_id');  }  elseif(isset($CandidateData->position_id) == $positiondata->position_id) { echo  "selected"; } ?>><?php echo $positiondata->position_name ?></option>
													<?php } ?>
												</select>
												<span class="error"><?php  echo   form_error('position_id'); ?></span>	
												
                                            </div>
                                        </div>
                                     </div>
                                <?php if(isset($CandidateData->position_id) != '') { ?>
                                    <button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
									<?php  } else{?>
                                    <button type="submit" class="btn btn-info btn-fill pull-left">Submit</button>
                                <?php  } ?>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>