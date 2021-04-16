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
                                <h4 class="title">Edit Send Link</h4>
                            </div>
                            <div class="content">
                               <form action="<?php  echo base_url('admin/edit_send_link?mobile_id='.$_GET['mobile_id']); ?>" id="addmobilenumberdata" method="post" class="middle-forms">   
								    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
											   <label>Mobile Number</label>
                                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" Oninput="this.value=this.value.replace(/[^0-9.]/g,'');this.value=this.value.replace(/(\..*)\./g,'$1');setCustomValidity('');" placeholder="Enter mobile number" value="<?php  if(set_value('mobile')){echo set_value('mobile');  }  elseif(isset($mobileadata->mobile_number)) { echo trim($mobileadata->mobile_number); }?>">
												 <span class="error"><?php  echo   form_error('mobile_number'); ?>
                                            </div>
                                        </div>
							 <input type="hidden" class="form-control"  name="mobile_id" id="mobile_id" value="<?php if(isset($mobileadata->mobile_id)) {echo $mobileadata->mobile_id;} ?>">					
                                    </div>
                                   <button  id="studentbtn" class="submit-btn"  style="float: left;">Update</button>
									
                                </form>    
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
