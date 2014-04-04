<?php 
    
    if ($this->session->userdata('user_id')) {
        $surname = $this->session->userdata('surname');
        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('user_id');
    } else {
        redirect('jarida/login');
    }
    
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
        <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">-->
        <link href="<?php echo base_url();?>css/bayanno.css" media="screen" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>css/othercss.css" media="screen" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
        <script src="http://joyonto.net/projects/hms/template/js/html5shiv.js" type="text/javascript"></script>
        <script src="http://joyonto.net/projects/hms/template/js/excanvas.js" type="text/javascript"></script>
        <![endif]-->
        <script src="<?php echo base_url();?>js/analytics.js" async></script>
        <script src="<?php echo base_url();?>js/bayanno.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/functions.js" type="text/javascript"></script>
        
        
        
                <title><?=$title?></title>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
</head>
<body>
    <div class="navbar navbar-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
            <a class="brand" href="#">jarida | information management system</a>
            <!-- the new toggle buttons -->
            <ul class="nav pull-right">
                <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>
                <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>
            </ul>
            <div class="nav-collapse nav-collapse-top collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">account <b class="caret"></b></a>
                    <!-- Account Selector -->
                    <ul class="dropdown-menu">
                        <li class="with-image">
                            <span><?php echo $username;?></span>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>index.php/jarida/myProfile">
                                <i class="icon-user"></i><span>profile</span></a></li>
                        <li><a href="<?php echo base_url();?>index.php/jarida/doLogout">
                                <i class="icon-off"></i><span>logout</span></a></li>
                    </ul>
                    <!-- Account Selector -->
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown">
                    <a href="<?php echo base_url();?>index.php/jarida/dashboard"><i class="icon-user"></i>my panel </a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">
	<!-- Main nav -->
    <br>
    <div style="text-align:center;">
    	<a href="#">
        	<img src="<?php echo base_url();?>images/logo2.png" style="max-height:100px; max-width:100px;">
        </a>
    </div>
   	<br>
	<ul class="nav nav-collapse collapse nav-collapse-primary">
    
    <?php $this->load->view('includes/fl_menus');?>
		
	</ul>
	
</div>    

</div>

<div class="main-content">
                <div class="container-fluid">
            <?php $this->load->view('includes/flash_message');?>
        </div>
        
        <!-- FLASH MESSAGES -->
        
        
                        <div class="container-fluid padded">
                          <div class="box">
                            <div class="box-header">
                              <!-- CONTROL TABS START -->
                              <ul class="nav nav-tabs nav-tabs-left">
                                <li class="active"> <a href="#update" data-toggle="tab"><i class="icon-edit"></i> update my profile </a></li>
                                <li> <a href="#profile" data-toggle="tab"><i class="icon-align-justify"></i> my profile </a></li>
                              </ul>
                              <!-- CONTROL TABS END -->
                            </div>
                            <div class="box-content padded">
                              <div class="tab-content">
                                <!-- EDITING FORM STARTS -->
                                <div class="tab-pane box active" id="update" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <?php 
                                    $attributes = array('class' => 'form-horizontal validatable', 'id' => 'update_password', 'onSubmit' => 'return checkPassword();');
                                    echo form_open('update/firstLoginUpdate', $attributes);?>
                                      <div style="" class="padded">
                                        <div class="control-group">
                                          <label class="control-label">current password</label>
                                          <div class="controls">
                                            <input class="validate[required]" name="password" type="password" placeholder = "current password" required  />
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">new password</label>
                                          <div class="controls">
                                            <input class="validate[required]" id="new_password" name="new_password" type="password" placeholder = "new password" required  />
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label">confirm new password</label>
                                          <div class="controls">
                                            <input class="validate[required]" id="confirm_password" name="confirm_password" type="password" placeholder = "confirm new password" required  />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-blue">update profile</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- EDITING FORM ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <div class="tab-pane box" id="profile" style="padding: 5px;">
                                  <div style="" class="box-content">
                                    <form class="form-horizontal validatable">
                                      <div style="" class="padded">
                                        <?php
                                        if (!is_null($my_details)) {
                                          ?>
                                            <fieldset>
                                            <legend>personal information</legend>
                                              <div class="control-group">
                                              <label class="control-label">name</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->surname;?>" name="surname" type="text" placeholder="surname" readonly/>
                                                <input class="validate[required]" value="<?php echo $my_details->other_names;?>" name="other_names" type="text" placeholder="other names" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">phone number</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->phone_number;?>" name="phone_number" type="text" placeholder="phone number" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">email address</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->email;?>" name="email" type="text" placeholder="email address" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">gender</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->sex;?>" name="gender" type="text" placeholder="gender" readonly/>
                                              </div>
                                            </div>
                                          </fieldset>
                                          <fieldset>
                                            <legend>residential information</legend>
                                            <div class="control-group">
                                              <label class="control-label">nationality</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->nationality;?>" name="nationality" type="text" placeholder="nationality" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">city</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->city;?>" name="city" type="text" placeholder="city" readonly/>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label">residence</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->residence;?>" name="residence" type="text" placeholder="residence" readonly/>
                                              </div>
                                            </div>
                                          </fieldset>
                                          
                                          <fieldset>
                                              <legend>login information</legend>
                                              <div class="control-group">
                                              <label class="control-label">username</label>
                                              <div class="controls">
                                                <input class="validate[required]" value="<?php echo $my_details->username;?>" name="username" type="text" placeholder="username" readonly/>
                                              </div>
                                            </div>
                                          </fieldset>
                                          <?php
                                        }
                                        ?>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- CREATION FORM ENDS -->
                                <!-- CREATION FORM STARTS -->
                                <!-- CREATION FORM ENDS -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php $this->load->view('includes/footer');?>
                        <?php
                            if ($this->session->userdata('change_p')) {
                              if ($this->session->userdata('change_p') == 'y') {
                                $msg = 'success! your password has been changed.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else if($this->session->userdata('change_p') == 't'){
                                $msg = 'sorry! incorrect details.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not change your password. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('change_p');
                            }

                            if ($this->session->userdata('fl')) {
                              if ($this->session->userdata('fl') == 'y') {
                                $msg = 'success! your password has been changed.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else if($this->session->userdata('fl') == 't'){
                                $msg = 'sorry! incorrect details.';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              } else {
                                $msg = 'sorry! could not change your password. please try again later';
                                echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
                              }
                              $this->session->unset_userdata('fl');
                            }
                              ?>
        </div>
    

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46775677-1', 'joyonto.net');
  ga('send', 'pageview');

</script><div class="ex-tooltip"></div><div id="galleryOverlay" style="display: none;"><div id="gallerySlider"></div><a id="prevArrow"><i class="icon-angle-left icon-4x"></i></a><a id="nextArrow"><i class="icon-angle-right icon-4x"></i></a></div></body></html>