<!DOCTYPE html>
<html><head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<link rel="stylesheet" href="<?php echo base_url();?>css/font.css">
		<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">-->
        <link href="<?php echo base_url();?>css/bayanno.css" media="screen" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
        <script src="http://joyonto.net/projects/hms/template/js/html5shiv.js" type="text/javascript"></script>
        <script src="http://joyonto.net/projects/hms/template/js/excanvas.js" type="text/javascript"></script>
        <![endif]-->
        <script src="<?php echo base_url();?>js/analytics.js" async></script>
		<script src="<?php echo base_url();?>js/bayanno.js" type="text/javascript"></script>
        
        
                <title><?=$title?></title>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
	<body>
		        <div class="navbar navbar-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="#">Jarida Information Management System</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="span4 offset4">
                <div class="padded">
                    <center>
                        <img src="<?php echo base_url();?>images/logo.png" style="height:200px;">
                    </center>
                    <div class="login box" style="margin-top: 10px;">
                        <div class="box-header">
                            <span class="title">login</span>
                        </div>
                        <div class="box-content padded">
                        <i class="m-icon-swapright m-icon-white"></i>
                        <?php 
                            $attributes = array('class' => 'separate-sections');
                            echo form_open('jarida/doLogin', $attributes);
                            ?>
                        	<div class="">
    
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-lock"></i>
                                    </span>
                                    <input name="username" placeholder="username" type="text" required>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on" href="#">
                                    <i class="icon-key"></i>
                                    </span>
                                    <input name="password" placeholder="password" type="password" required>
                                </div>
                                
                                <div>
                                    <button type="submit" class="btn btn-blue btn-block">login</button>
                                </div>
                            </form>
                            <div>
                                <a data-toggle="modal" href="#modal-simple">forgot password?</a>
                            </div>
                        </div>
                        <p style="margin-left:17px;" class="key_info"><?php
                        if (isset($error_info)) {
                            echo $error_info;
                        }
                        ?></p>
                    </div>
                        <div style="clear:both;color:#aaa; padding:20px;">
    	<hr><center>© 2014 <?php echo anchor_popup('http://www.lexaitsolutions.com', 'Jarida Information Management System');?></center>
    </div>                </div>
            </div>
        </div>
        
        
        <!-- password reset form -->
        <div id="modal-simple" class="modal hide fade">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h6 id="modal-tablesLabel">reset password</h6>
          </div>
          <div class="modal-body">
            <?php 
                $attributes = array('class' => 'separate-sections');
                echo form_open('jarida/resetPassword', $attributes);
                ?>
                <input name="email" placeholder="enter e-mail address" style="margin-bottom: 0px !important;" type="email">
                <input value="reset" class="btn btn-blue btn-medium" type="submit">
            </form>
        </div>
          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <?php
        if ($this->session->userdata('reset') && $this->session->userdata('reset') == 'y') {
            $msg = 'success! your password has been reset.';
            echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
            $this->session->unset_userdata('reset');
          } else if ($this->session->userdata('reset') && $this->session->userdata('reset') == 'n') {
            $msg = 'sorry! your password could not be reset.';
            echo '<script type="text/javascript">alert("'.$msg.'"); </script>';
            $this->session->unset_userdata('reset');
          }
        ?>
        <!-- password reset form -->
        
        
	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46775677-1', 'joyonto.net');
  ga('send', 'pageview');

</script><div class="ex-tooltip"></div><div style="display: none;" id="galleryOverlay"><div id="gallerySlider"></div><a id="prevArrow"><i class="icon-angle-left icon-4x"></i></a><a id="nextArrow"><i class="icon-angle-right icon-4x"></i></a></div></body></html>