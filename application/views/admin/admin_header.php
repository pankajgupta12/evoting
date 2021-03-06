<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="<?php echo base_url() ?>files/assets/image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php  echo $title; ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>files/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() ?>files/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url() ?>files/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url() ?>files/assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>files/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php //echo base_url() ?>files/assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    E-Voting
                </a>
            </div>

            <ul class="nav">
                <li <?php if($this->uri->segment(2) == 'dashboard'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/dashboard'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
				 <li <?php if($this->uri->segment(2) == 'registrationprocess'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/registrationprocess'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Registration Process</p>
                    </a>
                </li>
				
				<!--<li <?php if($this->uri->segment(2) == 'voterlist'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/voterlist'); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Voter List</p>
                    </a>
                </li>-->
                
                <li <?php if($this->uri->segment(2) == 'user_details'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/user_details'); ?>">
                        <i class="pe-7s-user"></i>
                        <p>User Management</p>
                    </a>
                </li>
				<li <?php if($this->uri->segment(2) == 'questionlist'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/questionlist'); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Question Management</p>
                    </a>
                </li>
				<li <?php if($this->uri->segment(2) == 'post_listing'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/post_listing'); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Position For</p>
                    </a>
                </li>
				<li <?php if($this->uri->segment(2) == 'candidate_listing'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/candidate_listing'); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Candidate Managment</p>
                    </a>
                </li>
				<li <?php if($this->uri->segment(2) == 'edit_profile'){ ?>class="active" <?php  } ?>>
                    <a href="<?php echo base_url('admin/edit_profile'); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
               
            </ul>
    	</div>
    </div>
 <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><?php echo $title;  ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <!--<li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>-->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!--<li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>-->
                        <!--<li>
                            <a href="<?php echo base_url('admin/edit_profile'); ?>">
                               Edit Profile
                            </a>
                        </li>
						<li>
                            <a href="#">
                               Change Password
                            </a>
                        </li>-->
						<li>
                            <a href="<?php echo base_url('admin/logout'); ?>">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
