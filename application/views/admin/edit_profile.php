<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form  action="<?php echo base_url('admin/edit_profile');  ?>" method="post">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" value=""  name="name" placeholder="Username" value="">
												<span class="error"><?php  echo   form_error('name'); ?>
                                            </div>
                                        </div>
                                       <!--- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>  ---->
                                    </div>
                                    <div class="row">
                                     
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password"  name="old_password" class="form-control" placeholder="Current Password" value="">
												<span class="error"><?php  echo   form_error('old_password'); ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <!---- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="password" class="form-control" placeholder="Mobile Number" value="">
                                            </div>
                                        </div> ---->
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Password" value="">
												<span class="error"><?php  echo   form_error('password'); ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<style>
		 .error{
		   color:red;
		 }
		</style>